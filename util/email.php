<?php

class email {

    /**
     * 
     */
    public static function registration($name, $pass, $id, $email) {
        $message = '';
        $message .= 'Dear ' . $name;
        $message .= '<br /><br />';
        $message .= '<p>Welcome to ' . NAME . '!<br />
We are pleased to welcome you as a Client of <?php echo . We
are glad to cooperate. Thank you for your choice.Thank you for joining. An account has been made using the information given. Kindly click on the link given below to complete the registration and gain access to your account.</p><br /><br />';
        $message .= '<a href="' . URL . 'login/pass/' . $id . '/' . $pass . '">';
        $message .= URL . 'login/pass/' . $id . '/' . $pass;
        $message .= '</a>';
        $message .= '<br /><br />Thank you for becoming a part of ' . NAME;

        $message .= '<br /><br />';
        $message .= 'Sincerely';
        $message .= $_SERVER['HTTP_HOST'];

        $to = $email;
        $subject = 'Welcome to '.$_SERVER['HTTP_HOST'];
        $body = $message;
        
        $headers = "";
        $headers .= "Reply-To: Support <support@".$_SERVER['HTTP_HOST'] .">\r\n";
        $headers .= "Return-Path: Registration <registration@".$_SERVER['HTTP_HOST'] .">\r\n";
        $headers .= "From: Info <info@".$_SERVER['HTTP_HOST'] .">\r\n";

        $headers .= "Organization: " . NAME . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n;";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";

        if (mail($to, $subject, $body, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    public static function resendLink($name, $pass, $id, $email) {
        $message = '';
        $message .= 'Dear ' . $name;
        $message .= '<br /><br />';
        $message .= '<p>Kindly click on the link below to activate your account.</p><br /><br />';
        $message .= '<a href="' . URL . 'login/pass/' . $id . '/' . $pass . '">';
        $message .= URL . 'login/pass/' . $id . '/' . $pass;
        $message .= '</a>';
        $message .= '<br /><br />Thank you for becoming a part of Just Pocket It';

        $message .= '<br /><br />';
        $message .= 'Sincerely';
        $message .= $_SERVER['HTTP_HOST'];

        $to = $email;
        $subject = 'Welcome';
        $body = $message;
        
        $headers = "";
        $headers .= "Reply-To: Support <support@".$_SERVER['HTTP_HOST'] .">\r\n";
        $headers .= "Return-Path: Registration <registration@".$_SERVER['HTTP_HOST'] .">\r\n";
        $headers .= "From: Info <info@".$_SERVER['HTTP_HOST'] .">\r\n";

        $headers .= "Organization: " . NAME . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n;";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
        if (mail($to, $subject, $body, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    function recovery($email, $link) {
        $message = '<html><body>';
        $message .= '<img src="' . URL . 'public/img/bigLogo.jpp" ><br />';
        $message .= '<h2>Password recovery</h2>';
        $message .= 'Please click <a href="' . $link . '"> here</a> to recovery your password';
        $message .= '<br /><br />Thank you for being a part of ' . NAME;

        $message .= '<br /><br />';
        $message .= 'Sincerely ';
        $message .= $_SERVER['HTTP_HOST'];
        $message .= '</body></html>';

        $to = $email;
        $subject = 'Password Recovery';
        $body = $message;
        
        $headers = "";
        $headers .= "Reply-To: Support <support@".$_SERVER['HTTP_HOST'] .">\r\n";
        $headers .= "Return-Path: Registration <registration@".$_SERVER['HTTP_HOST'] .">\r\n";
        $headers .= "From: Info <info@".$_SERVER['HTTP_HOST'] .">\r\n";

        $headers .= "Organization: " . NAME . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n;";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
        if (mail($to, $subject, $body, $headers)) {
            return true;
        } else {
            return false;
        }
    }

}
