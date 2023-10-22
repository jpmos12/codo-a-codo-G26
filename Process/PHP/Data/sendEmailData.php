<?php

header('Content-type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Cache-Control, Pragma, Origin, Authorization, Content-Type, X-Requested-With");
header("Access-Control-Allow-Methods: GET, PUT, POST, OPTIONS");
header("Content-Type: text/html;charset=utf-8");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 0);

class sendEmailData {

    function sendEmail($name, $lastName, $email, $area) {
//        echo $name . " --- " . $lastName . " --- " . $email. " --- " . $area;
//        exit();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetFooter("");
        $mpdf->WriteHTML("");
        $content = $mpdf->Output('', 'S');
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {

            $mail->SMTPDebug = 0;                               // Enable verbose debug output
            $mail->isSMTP();                                    // Set mailer to use SMTP
            $mail->Host = 'mail.mktechstore.com';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                             // Enable SMTP authentication
            $mail->Username = 'sparta@mktechstore.com';                 // SMTP username
            $mail->Password = '5p4rtA5t0re2023@';                      // SMTP password
            $mail->SMTPSecure = 'ssl';                          // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                  // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('sparta@mktechstore.com', 'SPARTA STORE');
            $mail->addAddress($email, $name . " " . $lastName); // Add a recipient
            $mail->addBCC('jorman@grupomktech.com');

            //Attachments
            $variable = $content;
            $pathPDF = 'C:\xampp\htdocs\ProyectoPython\PDF\Catalogo.pdf';
            $fichero = file_get_contents($pathPDF);
            $mail->AddStringAttachment($fichero, $pathPDF);

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Cotización SPARTA';
            $mail->Body = '<p>Estimado Cliente:</p> ' . $name . " ". $lastName . '<p>Hemos recibido su solicitud, por tal motivo, adjunto a este correo encontrará un PDF con nuestra última colección ingresada a nuestra tienda, esperamos sea de su agrado.</p><p><b>** Este mensaje se ha generado automáticamente. ** Por favor no conteste a este mensaje ya que no recibirá ninguna respuesta.</b></p><p> Este correo es informativo, favor no responder a esta dirección de correo, ya que no se encuentra habilitada para recibir mensajes.</p>';
            $mail->AltBody = 'Estimado Cliente:</p> ' . $name . " ". $lastName . '<p>Hemos recibido su solicitud, por tal motivo, adjunto a este correo encontrará un PDF con nuestra última colección ingresada a nuestra tienda, esperamos sea de su agrado. ** Este mensaje se ha generado automáticamente. Por favor no conteste a este mensaje ya que no recibirá ninguna respuesta. Este correo es informativo, favor no responder a esta dirección de correo, ya que no se encuentra habilitada para recibir mensajes.';

            $exito = $mail->send();

            if ($exito) {

                echo json_encode(array('Status' => 200,'email' => $email));
                //exit();
            } else {
                echo json_encode(array('Status' => 100, 'email' => $email));
                //exit();
            }//end else
        } catch (Exception $e) {
            return $mail->ErrorInfo;
            //exit();
        }
    }//end sendEmail
}//end class
