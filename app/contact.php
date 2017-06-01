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
  <form class="form-horizontal" role="form" method="post" action="contact.php">
  	<div class="form-group nom">
  		<div class="col">
  			<input type="text" class="form-control nomPrenom" id="name" name="nom" placeholder="Nom" value="">
  		</div>
  	</div>
    <div class="form-group prenom">
      <div class="col">
          <input type="text" class="form-control" id="name" name="prenom" placeholder="Prénom" value="">
    </div>
  </div>
  	<div class="form-group">
  		<div class="col-lg">
  			<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
  		</div>
  	</div>
  	<div class="form-group">
  		<div class="col-lg">
  			<textarea class="form-control message" rows="4" name="message"></textarea>
  		</div>
  	</div>
    <div class="form-group">
    		<div class="col-sm-10 col-sm-offset-2">
    			<input id="submit" name="submit" type="submit" value="Envoyez" class="btn btn-primary">
    		</div>
    	</div>
      </form>
</section>
<section class="map"></section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.3335834604204!2d2.2768014151249574!3d48.87091700777946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66ff63ad6c7d7%3A0x475eed39821352be!2s7+Place+du+Chancelier+Adenauer%2C+75116+Paris!5e0!3m2!1sfr!2sfr!4v1496308523251" margin="90px" width="500" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
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
    <p>Par mail, à l’adresse suivante</p>
<p class="contactTalo">contac@taloenergy.fr</p>
<p>Et par téléphone au </p>
 <p class="contactTalo">01 02 03 04 05</p>
 </section>


<?php
require_once('phpmailer/PHPMailerAutoload.php');

if (isset($_POST['submit'])) {
  $mail = new PHPMailer();
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $usrmail = $_POST["email"];
  $msg = $_POST["message"];

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
  $mail->addReplyTo($usrmail, 'Information');


  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(false);                                  // Set email format to HTML

  $mail->Subject =  "Mail contact ";
  $mail->Body    =  "Nom: $nom Prénom: $prenom\n \n $msg";

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
