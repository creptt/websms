<?php
// SMS Sender
// March 14, 2016
// Provided "AS IS," without any warranty of any kind.
if( empty($_POST['number']) or empty($_POST['carrier']) )
{
   echo 'The phone number and carrier are required. To send a text message, the from address and message are also required.';
   exit;
}
$addressOnly = (empty($_POST['message']) or strpos($_POST['from'],'@')===false) ? true : false;
$TelephonNumber = preg_replace('/\D/','',$_POST['number']);
if( $addressOnly )
{
   echo "The SMS address is:<pre>$TelephonNumber@{$_POST['carrier']}</pre>";
}
else
{
   mail("$TelephonNumber@{$_POST['carrier']}",'SMS',$_POST['message'],"From: {$_POST['from']}");
   echo "Message sent to $TelephonNumber@{$_POST['carrier']}";
}
?>
