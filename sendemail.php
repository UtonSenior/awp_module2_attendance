<?php
    require 'vendor/autoload.php';    

    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = '2BE4E9C5198D81F7130E05983C61AD01B3FE4EE95C2E4C7DF9DE840B1CBDAC8FC0DF01B52A10FBD68F54B6D55A50DE53';
            $url = 'https://api.elasticemail.com/v2/email/send';

            try {

                $email = array('from' => 'utonblue@yahoo.com',
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