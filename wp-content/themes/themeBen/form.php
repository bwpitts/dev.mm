<?php
	    $email;$comment;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['comment'])){
          $email=$_POST['comment'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LcDGkYUAAAAABXWyXaaEA5bZc6fv5PnDvL-xtPJ";
        $ip = $_SERVER['REMOTE_ADDR'];
		
		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha . "&remoteip=" . $ip);

        $responseKeys = json_decode($response,true);

		if(intval($responseKeys["success"]) !== 1){
			echo '<h2>reCAPTCHA failed</h2>';
		} else {
			echo '<h2>reCAPTCHA success</h2>';
		}
?>