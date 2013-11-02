<?php
//If the form is submitted
require_once( dirname(__FILE__) . '/library/recaptchalib.php');
$publickey = "6LcPgswSAAAAAIjsEfLPSJaxQg2MXyOH7wGr8QOu";
$privatekey = "6LcPgswSAAAAAFyHz9yC_rjMkbpdWxnPANKsAha6";

if(isset($_POST['submitted'])) {

$response = recaptcha_check_answer($privatekey,
$_SERVER["REMOTE_ADDR"],
$_POST["recaptcha_challenge_field"],
$_POST["recaptcha_response_field"]);

		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = true; //erro especifico do campo
			$hasError = true; //tem erro no form logo não envia
		} else {
			$name = trim($_POST['contactName']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = true;
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = true;
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure comments were entered
		if(trim($_POST['comments']) === '') {
			$commentError = true;
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//
		if(trim($_POST['assunto']) === '') {
			$assuntoError = true;
			$hasError = true;
		} else {
			$assunto = trim($_POST['assunto']);
		}

        if ($response->is_valid) { //recaptcha ok

		//If there is no error, send the email
		if(!isset($hasError)) {
		    $ip = $_SERVER['REMOTE_ADDR']; //ip
            $user_agent = $_SERVER['HTTP_USER_AGENT']; //user agent
            $data = date('d/m/Y H:i:s'); //data
            $telefone = trim($_POST['telefone']); //campo extra não obrigatório
            $emailTo = 'fabrix@fabrix.net';
			$subject = '[CONTATO] - ' .$assunto;
			$body = "Nome: $name <p>Email: $email </p><p>Telefone: $telefone </p><p>Assunto: $assunto </p><p>Mensagem: $comments </p>-------------------------------------------<br /><small>IP: $ip | $data(gmt) | $user_agent</small>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
            $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email . "\r\n";

            mail($emailTo, $subject, $body, $headers);
    		$emailSent = true;
		}

 } else {
                # set the error code so that we can display it
        $captchaError = true;

        }

}


          $assunto_email = "";
          if(isset($_GET['id'])) {
          $assunto_email = $_GET['id'];
          }
        ?>
<?php get_header('popup'); ?>
<title>[CONTATO] - <?php echo $assunto_email;?></title>

<style type="text/css">
 /*<![CDATA[*/
 /* Contact Form & Blog Comments */
.form-post {width:100%; overflow:hidden; padding:0 0 28px; height: 100%}
.form-post h3 {margin:0 0 14px;}
.form-post h2 {color:#252525; font-size:18px; margin:0 0 38px; line-height:26px; font-weight:normal; padding-right:30px;}
.form-post .area {overflow:hidden; width:614px; margin:0 0 12px;}
.form-post .box {float:left; width:188px; margin:0 12px 0 0;}
.form-post .boxcontact {float:left; width:252px; margin:0; font-size: 11px !important}
.form-post .boxcontact2 {float:right; width:252px; margin:0 3px 0 0;font-size: 11px !important}

.form-post label {display:block; margin:15px 0 1px 0; color:#746f6e;}
.form-post .txt input {color:#555555;background:none; width:250px; height:15px; margin:0; font-size:11px; border:0; padding:4px 0;}
.form-post .txtcontact input {background:none; width:250px; height:15px; margin:0; font-size:11px; color:#0000FF; border:0; padding:4px 0;}
.form-post .txtcontact { -webkit-box-shadow: inset 1px 1px 5px #ccc; -moz-box-shadow: inset 1px 1px 5px #ccc; box-shadow: inset 1px 1px 5px #ccc; border: 1px solid #bbb; background: #fff; color: #555;}

.form-post textarea {font:11px Arial, Helvetica, sans-serif; -webkit-box-shadow: inset 1px 1px 5px #ccc; -moz-box-shadow: inset 1px 1px 5px #ccc; box-shadow: inset 1px 1px 5px #ccc; border: 1px solid #bbb; background: #fff; ;width:535px; max-width: 535px; min-width: 535px; height:120px; max-height:120px ; min-height:120px;  overflow:auto;}

.form-post .textarea { margin-top: 15px; float: none;font-size: 11px !important}
.form-post .captcha {float: left; margin-top: 10px;font-size: 11px !important }

.form-post .btn-holder {float: right; margin-top: 80px;margin-right: 30px;}
.form-post .txt-area {line-height:22px; padding:45px 0 25px;}
.form-post .txt-area p {margin:0;}

/* Form Buttons */
.rightalign {float:right; margin-right:0px;}
 /*]]>*/
</style>
</head>
<body class="postarea_pop">


<?php if(isset($emailSent) && $emailSent == true) { ?>
<div style="text-align: center"><img src="<?php echo get_template_directory_uri(); ?>/images/ok.png" width="128" height="128" border="0" alt="" />

<p><h1>Obrigado, <span style="color: #FF0000"><?=$name;?></span></h1></p>
<p><h2>Seu e-mail foi enviado com sucesso!</h2></p>
</div>
<?php } else { ?>
<h1 align="center"><img style="vertical-align: middle" src="<?php echo get_template_directory_uri(); ?>/images/contato.png" width="48" height="36" border="0" alt="Fale Conosco"/> Fale Conosco!</h1>

<script type="text/javascript">
var RecaptchaOptions = {
   lang : 'pt',
   theme : 'white',
};
</script>
	       <form action="<?php the_permalink(); ?>" id="contactForm" method="post" class="form-post message-form">


                <div class="boxcontact">
			    <label for="contactName">NOME:*</label>
                <div class="txtcontact" >
				<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" <?php global $nameError; if($nameError != '') { ?>style="border: 1px solid #DD0000;background-color: #FFECEC"<?php } ?>/>
                </div>
			  	</div>

                <div class="boxcontact2">
				<label for="email">E-MAIL:*</label>
                 <div class="txtcontact">
                <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" <?php global $emailError; if($emailError != '') { ?>style="border: 1px solid #DD0000;background-color: #FFECEC"<?php } ?>/>
                </div>
                </div>

                <div class="boxcontact">
			    <label for="assunto">ASSUNTO:*</label>
                <div class="txtcontact">
				<input type="text" name="assunto" id="assunto" value="<?php if(isset($_POST['assunto'])) echo $_POST['assunto'];?><?php echo $assunto_email;?>" <?php global $assuntoError; if($assuntoError != '') { ?>style="border: 1px solid #DD0000;background-color: #FFECEC"<?php } ?>/>
                </div>
			  	</div>

                <div class="boxcontact2">
				<label for="telefone">Site, Blog, Facebook, Twitter, etc:<small></small></label>
                 <div class="txtcontact">
                <input type="text" name="telefone" id="telefone" value="<?php if(isset($_POST['telefone']))  echo $_POST['telefone'];?>" />
                </div>
                </div>

                 <div class="clear"></div>

                 <div class="textarea">
                 <label for="commentsText">MENSAGEM:*</label>
                 <textarea name="comments" style="color:#0000FF" id="commentsText" <?php global $commentError; if($commentError != '') { ?>style="border: 1px solid #DD0000;background-color: #FFECEC"<?php } ?>><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                 </div>

                 <div class="captcha" <?php if(isset($hasError) || isset($captchaError)) { ?>style="border: 1px solid #DD0000;"<?php } ?>>
                 CAPTCHA:*
                 <?php echo recaptcha_get_html($publickey, $error); ?>
                 </div>

                 <div class="btn-holder">
                 <input type="hidden" name="submitted" id="submitted" value="true" />
				 <button type="submit" class="rightalign">Enviar Mensagem</button>
                 </div>
                  <div class="clear"></div>


		         </form>


<?php } ?>
<?php get_footer('popup'); ?>
