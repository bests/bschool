<?php
include 'autoload.php';
require_once 'swiftmailer/swift_required.php';
use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl') ->setUsername('testpixzla@gmail.com') ->setPassword('moses5000'); $mailer = Swift_Mailer::newInstance($transport); $message = Swift_Message::newInstance('Wonderful Subject') ->setFrom(array('bizworkzonline@gmail.com' => 'John Doe')) ->setTo(array('piwitime@gmail.com')); $message->setBody('
Hi John!


Johanna (johanna82) sent you a message.
Hi John. Amazing picture... login and read the full message

Best regards,
Photos4Lulz '); 
$validator = new Validator();

$validator

	->set_label('name', 'your name')
	->add_filter('name', 'trim')
	->add_rule('name', new Rule\NotEmpty())
	->add_rule('name', new Rule\MinLength(5))
	->add_rule('name', new Rule\MaxLength(10))

	->add_filter('email', 'trim')
	->add_filter('email', 'strtolower')
	->add_rule('email', new Rule\NotEmpty())
	
	->add_rule('email', new Rule\Email())
	

;$what = "";
try {
if (!$mailer->send($message, $errors)) { $what = "1"; }else{$what = "0";}
} catch (Swift_TransportException $e) {
  $what = "3";
} catch (Exception $e) {
 $what = "3";
}

if(isset($_POST['submit'])) {

	if($validator->is_valid($_POST)) {
	if($what == "0") {
		
echo 'true';

	}	
if($what == "3") {
		
echo 'falsex';

	}	

	} else {
		echo 'false';
		
	}
}


$jquery_validator = new HybridLogic\Validation\ClientSide\jQueryValidator($validator);
$jquery = $jquery_validator->generate();
?>