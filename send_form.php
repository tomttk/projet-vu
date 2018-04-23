<?php
session_start();//on démarre la session
// $errors = [];
  $errors = array(); // on crée une vérif de champs
if(!array_key_exists('name', $_POST) || $_POST['name'] == '') {// on verifie l'existence du champ et d'un contenu
  $errors ['name'] = "vous n'avez pas renseigné votre nom";
  }
if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {// on verifie existence de la clé
  $errors ['mail'] = "vous n'avez pas renseigné votre email";
  }
if(!array_key_exists('message', $_POST) || $_POST['message'] == '') {
  $errors ['message'] = "vous n'avez pas renseigné votre message";
  }
if(array_key_exists('antispam', $_POST)) {// on place un petit filet anti robots spammers
  $errors ['antispam'] = "Vous êtes un robots spammer";
  }
//On check les infos transmises lors de la validation
  if(!empty($errors)){ // si erreur on renvoie vers la page précédente
  $_SESSION['errors'] = $errors;//on stocke les erreurs
  $_SESSION['inputs'] = $_POST;
  header('Location: contact.php');
  }else{
  $_SESSION['success'] = 1;
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $headers .= 'FROM:' . htmlspecialchars($_POST['email']);
  $to = 'mimuelectro@gmail.com'; // Insérer votre adresse email ICI
  $subject = 'Message envoyé par ' . htmlspecialchars($_POST['name']) .' - <i>' . htmlspecialchars($_POST['email']) .'</i>';
  $message_content = '
  <table>
  <tr>
  <td><b>Emetteur du message:</b></td>
  </tr>
  <tr>
  <td>'. $subject . '</td>
  </tr>
  <tr>
  <td><b>Contenu du message:</b></td>
  </tr>
  <tr>
  <td>'. htmlspecialchars($_POST['message']) .'</td>
  </tr>
  </table>
  ';
mail($to, $subject, $message_content, $headers);

  header('Location: contact.php');
  $id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

 require_once 'conn.php';
$req = "INSERT INTO contact (id,name,email,message) VALUES ('$id','$name','$email','$message')";
$ps = $pdo ->prepare ($req);
$ps -> execute();

}
 
class Message{
private $id;
private $name ;
private $email ;
private $message ;



public function __construct($newid,$newname,$newemail,$newmessage){
    $this ->id =$newid;
    $this ->name =$newname;
    $this ->email=$newemail;
    $this ->message=$newmessage;
}
public function getid(){
    return $this ->id;
}
public function setnewid($nbr){
    $this ->newid=$nbr;
}


public function getname(){
    return $this ->name;
}
public function setnewname($nom){
    $this ->newname=$nom;
}

public function getemail(){
    return $this ->email;
}
public function setnewemail($courriel){
    $this ->newemail=$courriel;
}

public function getmessage(){
    return $this ->message;
}
public function setnewmessage($journal){
    $this ->newmessage=$journal;
}



}

$mess = new Message();

echo ("<br>");
echo ("Nbr: {$mess->getid()}"); 
echo ("<br>");
echo ("Nom: {$mess->getname()}");
echo ("<br>");
echo ("Email:{$mess->getemail()}");
echo ("<br>");
echo ("Message: {$mess->getmessage()}"); 

?>