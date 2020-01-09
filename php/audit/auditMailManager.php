<?php
require_once __DIR__.'/../common/dbOperations.php';
// require __DIR__.'/../../assets/PHPMailer/PHPMailerAutoload.php';
require ("sendgrid-php/sendgrid-php.php");
require ("vendor/autoload.php");
class auditMailManager{
	public function sendKickOffMail($kickoffMailData){
	// $subject = $kickoffMailData->subject;
 //    $bodyContent = $kickoffMailData->content;
 //    $mail = new PHPMailer;
 //    $mail->isSMTP();                                    // Set mailer to use SMTP
 //    $mail->Host = 'smtp.sendgrid.net';                    // Specify main and backup SMTP servers
 //    $mail->SMTPAuth = true;                            // Enable SMTP authentication
 //    $mail->Username = 'azure_7ccdeda452370438d3e0cbab060465e5@azure.com';         // SMTP username
 //    $mail->Password = 'Marketing2017!';                  // SMTP password
 //    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
 //    $mail->Port = 587;                                 // TCP port to connect 
 //    $mail->setFrom("notification@fixnix.co", 'Freshgrc Audit notification');
 //    // $mail->addReplyTo('sales@fixnix.co');
 //    $sendTo = array("akash@fixnix.co");
 //    $addressses=$this->getUsersEmail($kickoffMailData->sendto);
 //    $audit=$this->getAuditDetails($kickoffMailData->auditId);
 //    $clause=$this->getClauseDetails($kickoffMailData->clauseId);
 //    foreach ($addressses as $item) {
 //        $mail->addAddress($item);
 //    }
 //    $mail->isHTML(true);  // Set email format to HTML
 //    $mail->Subject = $kickoffMailData->subject;
 //    $mail->Body = "Checklist under the domain ".$clause." for the audit ". $audit ." has been assigned to you please contact your auditor for further details";
 //    if(!$mail->send()) {
 //      error_log( 'Message could not be sent.');
 //      error_log( 'Mailer Error: ' . $mail->ErrorInfo);
 //    }
 //    else {
 //    error_log('success to user'.print_r($kickoffMailData,true));
 //    return $mail;
 //    }

    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("notification@fixnix.co", "Freshgrc Audit notification");

    $addressses=$this->getUsersEmail($kickoffMailData->sendto);
    $audit=$this->getAuditDetails($kickoffMailData->auditId);
    $clause=$this->getClauseDetails($kickoffMailData->clauseId);
    $bodyContent = $kickoffMailData->content;

    $tos = [ 
        "manish@fixnix.co" => "Manish",
    ];
    
    $email->addTos($tos);
    $subject = $kickoffMailData->subject;

    $email->setSubject($subject);
    $bodyContent = $kickoffMailData->content;
    $email->addContent("text/html", $bodyContent);
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        // print $response->statusCode() . "\n";
        // print_r($response->headers());
        // print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '.  $e->getMessage(). "\n";
    }

	}





	private function getUsersEmail($users){
		error_log("users".print_r($users,true));
		$emailArray=array();
		foreach ($users as $user) {
			$sql="SELECT email FROM user WHERE id=?";
			$dbOperations=new DBOperations();
			$paramArray=array($user);
			$email=$dbOperations->fetchData($sql,'i',$paramArray);
			
			array_push($emailArray,$email[0]['email']);
		}
		return $emailArray;
	}
	private function getAuditDetails($auditId){
		$auditArray=array();
		$sql="SELECT title,auditor,auditee FROM audit WHERE id=?";
		$dbOperations=new DBOperations();
		$paramArray=array($auditId);
		$audit=$dbOperations->fetchData($sql,'i',$paramArray);
		return $audit;
	}
	private function getClauseDetails($clauseId){
		$auditArray=array();
		$sql="SELECT numbering FROM compliance_clause WHERE id=?";
		$dbOperations=new DBOperations();
		$paramArray=array($clauseId);
		$clause=$dbOperations->fetchData($sql,'i',$paramArray);
		return $clause[0]['numbering'];
	}




	public function sendResponseRemainderMail($kickoffMailData){
			// $subject = $kickoffMailData->subject;
		 //    $bodyContent = $kickoffMailData->content;
		 //    $mail = new PHPMailer;
		 //    $mail->isSMTP();                                    // Set mailer to use SMTP
		 //    $mail->Host = 'smtp.sendgrid.net';                    // Specify main and backup SMTP servers
		 //    $mail->SMTPAuth = true;                            // Enable SMTP authentication
		 //    $mail->Username = 'azure_7ccdeda452370438d3e0cbab060465e5@azure.com';         // SMTP username
		 //    $mail->Password = 'Marketing2017!';                  // SMTP password
		 //    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		 //    $mail->Port = 587;                                 // TCP port to connect 
		 //    $mail->setFrom("notification@fixnix.co", 'Freshgrc Audit notification');
		 //    // $mail->addReplyTo('sales@fixnix.co');
		 //    $sendTo = array("akash@fixnix.co");

		 //    //
		 //    $audit=$this->getAuditDetails($kickoffMailData->auditId);
		 //    //$clause=$this->getClauseDetails($kickoffMailData->clauseId);
		 //    $sendtoauditor=explode(",", $audit[0]['auditor']);
		 //    $sendtoauditee=explode(",", $audit[0]['auditee']);
		 //    $sendto=array_merge($sendtoauditor,$sendtoauditee);
		 //    error_log("sendto array".print_r($audit[0]['auditor'],true));
		 //    $addressses=$this->getUsersEmail($sendto);
		 //    foreach ($addressses as $item) {
		 //        $mail->addAddress($item);
		 //    }
		 //    $mail->isHTML(true);  // Set email format to HTML
		 //    $mail->Subject = $kickoffMailData->subject;
		 //    $mail->Body = "Auditee has responded to the checklist please Review his responses within the deadline";
		 //    if(!$mail->send()) {
		 //      error_log( 'Message could not be sent.');
		 //      error_log( 'Mailer Error: ' . $mail->ErrorInfo);
		 //    }
		 //    else {
		 //    error_log('success to user'.print_r($kickoffMailData,true));
		 //    return $mail;
		 //    }
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("notification@fixnix.co", "Freshgrc Audit notification");

            $audit=$this->getAuditDetails($kickoffMailData->auditId);
            //$clause=$this->getClauseDetails($kickoffMailData->clauseId);
            $sendtoauditor=explode(",", $audit[0]['auditor']);
            $sendtoauditee=explode(",", $audit[0]['auditee']);
            $sendto=array_merge($sendtoauditor,$sendtoauditee);
            error_log("sendto array".print_r($audit[0]['auditor'],true));
            $addressses=$this->getUsersEmail($sendto);
    $subject = $kickoffMailData->subject;
    $tos = [ 
        "manish@fixnix.co" => "Manish",
    ];
    
    $email->addTos($tos);
    $email->setSubject($subject);
    $bodyContent = $kickoffMailData->content;
    $email->addContent("text/html", $bodyContent);
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        // print $response->statusCode() . "\n";
        // print_r($response->headers());
        // print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '.  $e->getMessage(). "\n";
    }	
	}




	public function sendReviewRemainderMail(){

	}
	public function sendReturnMail(){

	}
	


}