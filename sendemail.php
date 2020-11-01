<?php
    require 'vendor/autoload.php';

    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("utonseniormbhs@gmail.com", "Uton Senior");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try {
                $response = $sendgrid->send($email);
                return $response;
            } catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>