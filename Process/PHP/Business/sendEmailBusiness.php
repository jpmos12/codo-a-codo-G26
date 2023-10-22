<?php

ini_set('max_execution_time', 0);
require(dirname(__FILE__) . '/../Data/sendEmailData.php');

class sendEmailBusiness {

    //variables
    private $sendEmailData;

    //constructor
    function __construct() {
        $this->sendEmailData = new sendEmailData();
    }//end constructor    
    
    //Método para enviar el pdf al cliente
    function sendEmail($name, $lastName, $email, $area) {
        $list = $this->sendEmailData->sendEmail($name, $lastName, $email, $area);
        return $list;
    }//end selectAllComandas 
    
}//end class

$sendEmailBusiness = new sendEmailBusiness();

if ($_REQUEST['accion'] == 'sendEmail') {
    //echo "Llegando aquí";exit();
    $sendEmailBusiness->sendEmail($_REQUEST['name'], $_REQUEST['lastName'], $_REQUEST['email'], $_REQUEST['area']);
}