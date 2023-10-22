<?php

echo $_POST['txtName'] . "<hr>";
echo $_POST['txtLastName'] . "<hr>";
echo $_POST['txtEmail'] . "<hr>";
echo $_POST['txtArea'] . "<hr>";
echo "HOLA llegando al sendEmail";
exit();

function sendEmailInvoice($Invoice) {
    $pdo = new dbConfig();
    $mpdf = new \Mpdf\Mpdf();
    $connect = $pdo->connect();
    $attachments = array();
    //leer facturas en estado 0 (Pendientes)
    $stmt = $connect->prepare("Select * from POS_Factura where numeroConsecutivo='" . $Invoice . "'"); //" Group by NumeroFactura");
    $stmt->execute();
    $count = 1;
    //DETAILS array
    $detailsList = array();

    $Factura = $stmt->fetch();

    $IdentificacionReceptor = $Factura['receptorIdentificacion'];
    $NombreReceptor = trim($Factura['receptorNombre']);

    $EmailReceptor = str_replace(' ', '', trim($Factura['receptorEmail']));
    $EmailReceptor = preg_replace('/\s+/', '', $EmailReceptor);

    $NombreReceptor = trim($Factura['receptorNombre']);
    $NumeroTelReceptor = $Factura['receptorTelefono'];
    $CorreoElectronicoReceptor = $EmailReceptor;
    $CondicionVenta = $Factura['condicionVenta'];
    $MedioPago = $Factura['medioPago'];
    $PlazoCredito = $Factura['plazoCredito'];
    $Moneda = $Factura['codigoMoneda'];
    $TipoCambio = $Factura['tipoCambio'];

    if ($Factura['codigoMoneda'] == "CRC") {
        $Simbolo = '&cent;';
    }
    if ($Factura['codigoMoneda'] == "USD") {
        $Simbolo = '$';
    }
    if ($Factura['tipoDoc'] == 1) {
        $TipoDoc = "Factura Electrónica";
    }
    if ($Factura['tipoDoc'] == 2) {
        $TipoDoc = "Nota de Débito";
    }
    if ($Factura['tipoDoc'] == 3) {
        //$TipoDoc="Nota de Crédito";
        $TipoDoc = "Nota de Crédito: " . $Factura['nDocClave'];
    }
    if ($Factura['tipoDoc'] == 4) {
        $TipoDoc = "Tiquete Electrónica";
    }
    if ($Factura['condicionVenta'] == 1) {
        $CondicionVenta = "Contado";
    }
    if ($Factura['condicionVenta'] == 2) {
        $CondicionVenta = "Crédito: " . $Factura['plazoCredito'] . " días.";
    }
    if (trim($Factura['receptorEmail'])) {
        $stmtConfiguracion = $connect->prepare("SELECT emisorIdentificacion,emisorEmail,nombreComercial,emisorTelefono,emisorNombre,emisorOtrasSenas FROM POS_Emisor");
        $stmtConfiguracion->execute();
        $Configuracion = $stmtConfiguracion->fetch();

        $queryXML = $connect->prepare("SELECT signedXML,haciendaXML FROM POS_Respuestas WHERE numeroConsecutivo='" . $Factura['claveHacienda'] . "'");
        $queryXML->execute();
        $XMLData = $queryXML->fetch();

        $Empresa = $Configuracion['emisorIdentificacion'];
        include('../plantillas/index.php');

        // $mpdf->SetWatermarkText('DOCUMENTO EN AMBIENTE DE PRUEBAS');
        // $mpdf->showWatermarkText = true;


        $mpdf->SetFooter($footer);
        $mpdf->WriteHTML($body);
        $content = $mpdf->Output('', 'S');
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {

            $mail->SMTPDebug = 0;                               // Enable verbose debug output
            $mail->isSMTP();                                    // Set mailer to use SMTP
            $mail->Host = 'avancari.dnscostarica.com';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                             // Enable SMTP authentication
            $mail->Username = 'factura@avancari.co.cr';                 // SMTP username
            $mail->Password = 'Apollo0321.';                      // SMTP password
            $mail->SMTPSecure = 'ssl';                          // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                  // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('noreply@avancari.co.cr', $Configuracion['nombreComercial']); //$mail->setFrom('noreply@avancari.co.cr','Factura CACIA');
            $mail->addAddress($Factura['receptorEmail'], $NombreReceptor); // Add a recipient
            $mail->addAddress('creditoycobro@cacia.org', $Configuracion['nombreComercial']); //$mail->addAddress('creditoycobro@cacia.org', 'CACIA(CREDITO Y COBRO)');
            $mail->addReplyTo('creditoycobro@cacia.org', $Configuracion['nombreComercial']);
            //$mail->addAddress('arodriguez@mktechstore.com');
            $mail->addBCC('jramirez@mktechstore.com');
            $mail->addBCC('cuentasporcobrarcacia@gmail.com');

            //Attachments
            $variable = base64_decode(chunk_split($XMLData['signedXML']));
            $mail->AddStringAttachment($variable, "FACTURA-No-" . $Factura['claveHacienda'] . ".xml", 'base64', 'application/xml');
            if ($XMLData['haciendaXML']) {
                $variable = base64_decode(chunk_split($XMLData['haciendaXML']));
                $mail->AddStringAttachment($variable, "RESPUESTA-No-" . $Factura['claveHacienda'] . ".xml", 'base64', 'application/xml');
            }
            $variable = $content;
            $mail->AddStringAttachment($variable, "FT-" . $Factura['claveHacienda'] . ".pdf", 'base64', 'application/pdf');

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $TipoDoc . '-' . $Factura['claveHacienda'];
            $mail->Body = '<p>Estimado Cliente:</p><p>Adjunto a este correo encontrará un Comprobante Electrónico en formato XML y su correspondiente representación en formato PDF. Lo anterior con base en las especificaciones del Ministerior de Hacienda.</p><p><b>** Este mensaje se ha generado automáticamente. ** Por favor no conteste a este mensaje ya que no recibirá ninguna respuesta.</b></p><p> Este correo es informativo, favor no responder a esta dirección de correo, ya que no se encuentra habilitada para recibir mensajes.</p>';
            $mail->AltBody = 'Estimado Cliente: Adjunto a este correo encontrará un Comprobante Electrónico en formato XML y su correspondiente representación en formato PDF. Lo anterior con base en las especificaciones del Ministerior de Hacienda. ** Este mensaje se ha generado automáticamente. Por favor no conteste a este mensaje ya que no recibirá ninguna respuesta. Este correo es informativo, favor no responder a esta dirección de correo, ya que no se encuentra habilitada para recibir mensajes.';

            $exito = $mail->send();

            if ($exito) {

                $queryUpdateSendEmail = "UPDATE POS_Respuestas SET emailSend = 1 WHERE numeroConsecutivo='" . $Factura['claveHacienda'] . "'";
                $SendEmail = $connect->prepare($queryUpdateSendEmail);
                $SendEmail->execute();

                echo json_encode(array('error' => 'success', 'factura' => $Factura['claveHacienda'], 'email' => $CorreoElectronicoReceptor));
            } else {
                
            }
        } catch (Exception $e) {
            return $mail->ErrorInfo;
        }
    }
}//end sendEmailInvoice