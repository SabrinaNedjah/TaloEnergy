<?php
ini_set("display_errors",0);error_reporting(0);
require("partials/functions.php");
require("partials/_header.php");
require("partials/_nav.php");
?>
<section class="DivBlue">
  <div class="contactTitle">
    <span>Contact</span>
    <p>Restons en <strong>contact</strong></p>
  </div>
  <section class="formm">

    <?php
    require_once('phpmailer/PHPMailerAutoload.php');

    if (isset($_POST['submit'])) {
      $mail = new PHPMailer();
      $nom = $_POST["nom"];
      $prenom = $_POST["prenom"];
      $usrmail = $_POST["email"];
      $msg = $_POST["message"];

      if (not_empty(['nom', 'prenom', 'email', 'message'])) {
        $errors = [];
        extract($_POST);

        if (mb_strlen($nom)<  2) {
          array_push($errors, "Il faut remplir le champ Nom");
        }

        if (mb_strlen($prenom)< 2) {
          array_push($errors, "Il faut remplir le champ Prénom");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          array_push($errors, "Adresse email invalide");
        }

        if (mb_strlen($msg)< 30) {
          array_push($errors, "Il faut remplir un message (30 caractères minimum)");
        }

        if(count($errors) === 0) {
          $mail->Host = ' localhost';
          $mail->SMTPAuth = true;
          $mail->Username = 'taloenergydev@gmail.com';
          $mail->Password = 'Sabrina2017';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;
          $mail->setFrom($usrmail, "$nom $prenom" );
          $mail->addAddress('taloenergydev@gmail.com', 'taloenergydev');
          $mail->addReplyTo($usrmail, 'Information');
          $mail->isHTML(false);
          $mail->Subject =  "Mail contact ";
          $mail->Body    =  "Nom: $nom Prénom: $prenom\n \n $msg";

          if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
            echo "<div class='alert alert-success'>
      <strong>Success!</strong>Votre message a bien été pris en compte. Nous vous répondrons d’ici 48 heures.</div>";
          }
        } else {
          echo '<div class="alert alert-warning"><ul>';
          for($i = 0; $i < count($errors); $i++) {
            echo '<li>' . $errors[$i] .'</li>';
          }
          echo '</ul> </div>';
        }
      }
    }
    ?>
      <form class="form-horizontal" role="form" method="post" action="contact.php">
        <div class="form-group nom">
          <div class="col-md-12 col-sm-12">
            <input type="text" class="form-control nomPrenom" id="name" name="nom" placeholder="Nom" value="" required="required">
          </div>
        </div>
        <div class="form-group prenom">
          <div class="col-md-12 col-sm-12">
            <input type="text" class="form-control" id="name" name="prenom" placeholder="Prénom" value="" required="required">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12 col-sm-12">
            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="" required="required">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12 col-sm-12">
            <textarea class="form-control message" rows="4" name="message" required="required"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-1">
            <input id="submit" name="submit" type="submit" value="Envoyer" class="btn btn-primary">
          </div>
        </div>
      </form>
  </section>
  <section class="map">
    <iframe class="mapIframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.3335834604204!2d2.2768014151249574!3d48.87091700777946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66ff63ad6c7d7%3A0x475eed39821352be!2s7+Place+du+Chancelier+Adenauer%2C+75116+Paris!5e0!3m2!1sfr!2sfr!4v1496308523251" frameborder="0" margin="0 auto" width="70%" height="320" style="border:0" allowfullscreen></iframe>
  </section>
</section>
<div class="wave"></div>
<section class="contactContener">
  <div class="contactTitle2">
    <span>Contact</span>
    <p>Nous sommes aussi accessible sur d’autres<strong> plateformes </strong>!</p>
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
  <p class="contactTaloBlack">Par mail, à l’adresse suivante</p>
  <p class="contactTaloBlue">contac@taloenergy.fr</p>
  <p class="contactTaloBlack">Et par téléphone au </p>
  <p class="contactTaloBlue">01 02 03 04 05</p>
</section>


<?php require("partials/_footer.php");
 ?>
