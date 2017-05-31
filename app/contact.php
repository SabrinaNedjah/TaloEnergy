<?php
require("partials/_header.php");
require("partials/_nav.php");
?>
<section class="DivBlue">
  <div class="contactTitle">
    <span>Contact</span>
    <p>Restons en <strong>contact</strong></p>
  </div>
  <section class="formulaire">
  <form class="form-horizontal" role="form" method="post" action="index.php">
  	<div class="form-group">
  		<div class="col">
  			<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
          <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
  		</div>
  	</div>
  	<div class="form-group">
  		<div class="col-lg">
  			<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
  		</div>
  	</div>
  	<div class="form-group">
  		<div class="col-lg">
  			<textarea class="form-control" rows="4" name="message"></textarea>
  		</div>
  	</div>
    <div class="form-group">
    		<div class="col-sm-10 col-sm-offset-2">
    			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
    		</div>
    	</div>
      </form>
</section>
















<!--  <form method="post" action="contact.php">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" placeholder="Nom" /><label for="prenom">Prenom :</label><input type="text" name="prenom" placeholder="Prenom" />
    <label for="email">E-mail :</label>
    <input id="email" type="email" name="email" placeholder="email" />
    <label for="phone">Telephone :</label>
    <input type="text" name="phone" placeholder="+33 6...." />
    <label for="date">Date de votre événement :</label>
    <input type="date" name="eventDate" />
    <label for="content">Message :</label>
    <textarea value="content" name="content" placeholder="Écrivez-Nous !"></textarea>
    <input id="validation" type="submit" name='submit' value="Envoyer" />
  </form> -->

 </section>
 <div class="wave"></div>
 <section class="contactContener">
   <div class="contactTitle2">
     <span>Contact</span>
     <p>Nous sommes aussi accessible sur d’autres<strong> plateformes </strong>!</p>
     </p>
   </div>
   <div class="social">
     <div class="twitter">
      <img src="images/twitter.png" alt="icone twitwi">
     </div>
     <div class="facebook">
       <img src="images/facebook.png" alt="icone de rechargement">
     </div>
     <div class="thermometerQuote">
       <img src="images/instagram.png" alt="icone de thermomètre">
     </div>
   </div>
 </section>




 </section>















<?php
require_once('phpmailer/PHPMailerAutoload.php');

if (isset($_POST['submit'])) {
  $mail = new PHPMailer();

  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $usrmail = $_POST["email"];
  $phone = $_POST["phone"];
  $msg = $_POST["content"];

  if (empty($usrmail)) {
    echo 'Please enter your email';

    return;
  }

  //$mail->isSMTP();
  //$mail->SMTPDebug = 2;                               // Enable verbose debug output
                                     // Set mailer to use SMTP
  $mail->Host = ' localhost';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'taloenergydev@gmail.com';                 // SMTP username
  $mail->Password = 'Sabrina2017';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  $mail->setFrom($usrmail, "$nom $prenom" );
  $mail->addAddress('taloenergydev@gmail.com', 'taloenergydev');     // Add a recipient
  $mail->addReplyTo('taloenergydev@gmail.com', 'Information');


  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(false);                                  // Set email format to HTML

  $mail->Subject =  "Mail contact ";
  $mail->Body    =  "$nom\n $prenom\n $phone\n $msg";

  if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    echo "<script>alert(\"Votre message a bien été envoyé !\")</script>";
  }
}

?>
 <?php require("partials/_footer.php");
 ?>
