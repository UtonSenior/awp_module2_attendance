<?php
    require 'vendor/autoload.php';    

    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = 'BE48339710469F4598218A7E17D7A699D762C54F73B7095C0C52E3D4E8BFB2491C4F4DDEE9B4837193294315A72D07DB';
            $url = 'https://api.elasticemail.com/v2/email/send';

            // $email = new \SendGrid\Mail\Mail();
            // $email->setFrom("utonseniormbhs@gmail.com", "Uton Senior");
            // $email->setSubject($subject);
            // $email->addTo($to);
            // $email->addContent("text/plain", $content);
            // //$email->addContent("text/html", $content);

            try {
                //$response = $client->EEemail->Send($client);
                //return $response; 

                $email = array('from' => 'utonseniormbhs@gmail.com',
                'fromName' => 'IT Conference',
                'apikey' => $key,
                'subject' => $subject,
                'to' => $to,
                'bodyHtml' => $content,
                'bodyText' => $content,
                'isTransactional' => false);
                
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $email,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));
                
                $result=curl_exec ($ch);
                curl_close ($ch);
                
                //echo $result;

            } catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>