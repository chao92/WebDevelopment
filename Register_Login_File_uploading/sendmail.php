<?php
/*
const DOMAIN_NAME = "localhost";
const MAILER_NAME = "noreply@localhost";
const MAILER_REPLYTO = "noreply@localhost";
$from = MAILER_NAME;
$replyto = MAILER_REPLYTO;
$domain_name = DOMAIN_NAME;
$subject = DOMAIN_NAME . " registration";
$body = <<<EOT
	Hi,

	this is an automated message to let you know that someone signed up at $domain_name with the user name "$username", using this email address as mailing address.

	Because of the way our user registration works, we have no idea which password was used to register this account (it gets one-way hashed by the browser before it is sent to our user registration system, so that we don't know your password either), so if you registered this account, hopefully you wrote your password down somewhere.

	However, if you ever forget your password, you can click the "I forgot my password" link in the log-in section for $domain_name and you will be sent an email containing a new, ridiculously long and complicated password that you can use to log in. You can change your password after logging in, but that's up to you. No one's going to guess it, or brute force it, but if other people can read your emails, it's generally a good idea to change passwords.

	If you were not the one to register this account, you can either contact us the normal way or —much easier— you can ask the system to reset the password for the account, after which you can simply log in with the temporary password and delete the account. That'll teach whoever pretended to be you not to mess with you!

	Of course, if you did register it yourself, welcome to $domain_name!

	- the $domain_name team
EOT;
$headers = "From: $from\r\n";
$headers .= "Reply-To: $replyto\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();
$email = 'jiangchao19920119@gmail.com';

mail($email, $subject, $body, $headers);
*/
/*
$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: Genome Upload <noreply@upload.ucsd-dbmi.org>";
$headers[] = "Bcc: Chao jiang <jiangchao19920119@gmail.com>";
$headers[] = "Reply-To: Recipient Name <noreply@upload.ucsd-dbmi.org>";
$headers[] = "Subject: {$subject}";
$headers[] = "X-Mailer: PHP/".phpversion();
$to = "chao@ou.edu";
$subject = "register sucess";
$email = "hello, congrautea";
mail($to, $subject, $email, implode("\r\n", $headers));
*/

// 		$username = "chao";
// 		$email = "chao@ou.edu";
// 		$fileversion = "3";
// 		$from = "noreply@upload.ucsd-dbmi.org";
// 		$replyto = "noreply@upload.ucsd-dbmi.org";
// 		$domain_name = "upload.ucsd-dbmi.org";
// 		$subject = "Submission received";
// 		$body = <<<EOT
// Hi "$username",

// This is a confirmation that we have received your submission $fileversion.

// The iDASH genome privacy protection committee.
// EOT;
// 		$headers = "From: $from\r\n";
// 		$headers .="CC: cjiang@ucsd.edu,jiangchao19920119@gmail.com\r\n";
// 		$headers .= "Reply-To: $replyto\r\n";
// 		$headers .= "X-Mailer: PHP/" . phpversion();
// 		mail($email, $subject, $body, $headers);
//mail ($tocc, $subject, $body, $header);

$to      = 'jiangchao19920119@gmail.com'; // Send email to our user
				$subject = 'Signup | Verification'; // Give the email a subject
				$message = '

				Thanks for signing up!
				Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

				------------------------
				Username: 

				------------------------

				Please click this link to activate your account:
				'; // Our message above including the link

				$headers = 'From:noreply@iconcure.ucsd.edu' . "\r\n"; // Set from headers
				mail($to, $subject, $message, $headers); // Send our email

echo "Mail Sent.";

?>