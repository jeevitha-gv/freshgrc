<?php
require_once __DIR__.'/../common/constants.php';
require_once __DIR__.'/../common/dbOperations.php';
require_once __DIR__.'/../common/appConfig.php';
require_once __DIR__.'/../common/workflowManager.php';
// require_once __DIR__.'/signupCtrlManager.php';
require 'sendgrid-php/sendgrid-php.php';
require 'vendor/autoload.php';
?>
<?php
class SendMailtoRegisteredUserandCompany {

  public function sendMailtoCompany($signupData)
  {
$userName = $signupData->name;
$emailid=$signupData->email;
$company = $signupData->company;
$subject = "New user registration in freshgrc.com";
$bodyContent = "New user ". $userName ." from company ". $company ." has registered. User email: ". $emailid;
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("notification@fixnix.co", "FixNix");
$email->setSubject($subject);
$email->addTo('sales@fixnix.co', $userName);
$email->addContent(
    "text/html", $bodyContent
);

//-PUT THE SENDGRID API KEY HERE only in the local computer, the key must not reach any github Public repository-
$sendgrid = new \SendGrid("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");


try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
}

public function sendMailtoUser($signupData)
  {
$userName = $signupData->name;
$emailid=$signupData->email;
$company = $signupData->company;
$subject = "Greetings From FixNix";
$bodyContent = nl2br("Hi $userName\n\nThanks for signing up! \n Lots of software companies claim they can do anything and everything. We are not one of them. FIXNIX is not a jack of all trades. We have mastered one thing: GRC. \nWithin five minutes, I can assess if FIXNIX is the best fit for the problem you have, saving you lots of time on evaluation. \n I shall call you in the next 30 minutes to schedule a demo or would you prefer to do this over email?\nclick here to activate <a href='https://freshgrcv6.com/freshgrcv6/login.php'>https://freshgrcv6.com/freshgrcv6/login.php</a> \n\n Regards \n Shan ");
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("shan@fixnix.co", "Chief Nixer");
$email->setSubject($subject);
$email->addTo($emailid, $userName);
$email->addContent(
    "text/html", $bodyContent
);
$sendgrid = new \SendGrid('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');


try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
}
}
?>
