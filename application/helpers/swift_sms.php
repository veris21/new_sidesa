<?php
// using SOAP Module - http://ca3.php.net/soap

class SMSParam {
    public $CellNumber;
    public $AccountKey;
    public $MessageBody;
}

$client = new SoapClient('http://www.smsgateway.ca/sendsms.asmx?WSDL');
$parameters = new SMSParam;

$parameters -> CellNumber = destinationNumber;
$parameters -> AccountKey = accountKey;
$parameters -> MessageBody = "This is a demonstration of SMSGateway.ca using PHP5.";

$Result = $client->SendMessage($parameters);
?>