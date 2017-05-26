<?php
require("partials/_header.php");
require("partials/_nav.php");
?>

<form method="post" action="contact.php">
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
  <input id="validation" type="submit" name="submit" value="Envoyer" />
</form>


<?php
require_once('phpmailer/PHPMailerAutoload.php');

echo 'je passe par là';
if (isset($_POST['submit'])) {
$mail = new PHPMailer();
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$usrmail=$_POST["email"];
$phone=$_POST["phone"];
$msg=$_POST["content"];

//$mail->isSMTP();
//$mail->SMTPDebug = 2;                               // Enable verbose debug output
echo 'ici aussi';
$mail->isSMTP();
//$mail->Host = 'localhost';                                   // Set mailer to use SMTP
$mail->Host = gethostbyname('smtp.gmail.com');// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'taloenergydev@gmail.com';                 // SMTP username
$mail->Password = 'Sabrina2017';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('taloenergydev@gmail.com', 'taloenergydev');
$mail->addAddress('taloenergydev@gmail.com', 'Information');
$mail->addReplyTo($usrmail, "$nom $prenom");     // Add a recipient



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
<?php require("partials/_footer.php"); ?>
