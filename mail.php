<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
require_once 'config.php';

//session data for regId
if(isset($_SESSION["reg_id"])){
    $regId = $_SESSION["reg_id"];
}else{
    $regId = "error";
}

$te_11 = "";
$te_22 = "";
$te_33 = "";
$te_44 = "";

$nte_11 = "";
$nte_22 = "";
$nte_33 = "";

$_SESSION['techEvent']=$_POST['TechEvent'];
$_SESSION['nonTechEvent']=$_POST['NonTechEvent'];
              
if(isset($_SESSION['techEvent'])){
   foreach($_SESSION['techEvent'] as $selected)
    {
        if($selected == "humblefoolz"){
            $te_11 = "humblefoolz";
        }else if($selected == "webuiduo"){
            $te_22 = "webuiduo";
        }else if($selected == "inovate"){
            $te_33 = "inovate";
        }else if($selected == "trickytrail"){
            $te_44 = "trickytrail";
        }
    }
}

if(isset($_SESSION['nonTechEvent'])){
   foreach($_SESSION['nonTechEvent'] as $selected)
    {
        if($selected == "cricbidd"){
            $nte_11 = "cricbidd";
        }else if($selected == "blitzbrigade"){
            $nte_22 = "blitzbrigade";
        }else if($selected == "shuttersnap"){
            $nte_33 = "shuttersnap";
        }
    }
}

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$id=trim($_POST["excel_id"]);
$te_1 = $_POST["te_1"];
$te_2 = $_POST["te_2"];
$te_3 = $_POST["te_3"];
$te_4 = $_POST["te_4"];
$nte_1 = $_POST["nte_1"];
$nte_2 = $_POST["nte_2"];
$nte_3 = $_POST["nte_3"];
//$sql = "SELECT id FROM details WHERE name =?";
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'synsara2k19@gmail.com'; // email
$mail->Password = 'synsara19$'; // password
$mail->setFrom('synsara2k19@gmail.com', 'synsara2k19'); // From email and name
$mail->addAddress($email, $name); // to email and name
$mail->Subject = 'Team Synsara Welcomes You';
$detail="<html>
  <head>
    <!-- <link rel='stylesheet' href='styles.css' /> -->
  </head>
  <body>
    <div style='text-shadow: 0 0 3px rgb(255, 0, 0), 0 0 5px rgb(0, 0, 255);
    font-family: Comic Sans MS;
    font-size: 2em;
    color: rgb(33, 173, 228);
    text-transform: uppercase;
    text-align: center;'>
      <hr />
      <h3 style='text-align: center; font-family: Comic Sans MS;'>
        Synsara 2k19 
        <!--<span style='font-size: 20px;
        color: rgb(33, 33, 33); font-family: Comic Sans MS; text-align: center;'>
        <br />Welcomes you!</span>-->
      </h3>
    </div>
    <hr />
    <div>
      <span style='font-family: Comic Sans MS; '>
     Dear $name,</span>
    </div>
    <hr />
    <div style=''>
      <!--<div style='font-family: Comic Sans MS;
      font-weight: 900;'><h4 style='margin: 0%;'>Note:</h4></div>-->
      <div style='font-family: Comic Sans MS;
      font-size: 12px;'>
        <br />
        <h3>Registration ID :-  $regId</h3>
        <br />
        <p>Greetings from SYNSARA,Sri Sairam Engineering College!</p>
        <br />
        <p>Congratulations on being a part of SynSara 2k19, the National Technical Festival organized by the Department of Computer Science and Engineering. </p>
        <br />
        <p>The excitement for SynSara 2k19 is at an all-time high! With about just two weeks to take the leap, get yourself ready to be a part of SynSara.</p>
        <br />
        <p>Suit up and set sail to land in our <span>World of Syntax</span> to get drenched with overwhelming and fun filled events on the wish list. Hope the last fest was a fun and learning experience for you.This year we are bigger and better with a mega event,<span>Hack-una-Matata</span>,the hackathon arranged to express your coding and project development skills and a lot more exciting new events, to mark this first edition of SynSara, the grandest in the history.</p>
        <br />
        <h3>Events Registered:-</h3>
        <h3>Technical Events:-</h3>
        <h4>";
            if($te_11 == "humblefoolz"){
                $detail = $detail."humblefoolz<br />";
            }
            if($te_22 == "webuiduo"){
                $detail = $detail."webuiduo<br />";
            }
            if($te_33 == "inovate"){
                $detail = $detail."inovate<br />";
            }
            if($te_44 == "trickytrail"){
                $detail = $detail."trickytrail<br />";
            }
            
        $detail=$detail."</h4>";   
        $detail=$detail."<h3>Non-Technical Events:-</h3><h4>";
        
        if($nte_11 == "cricbidd"){
            $detail = $detail."cricbidd<br />";
        }
        if($nte_22 == "blitzbrigade"){
            $detail = $detail."blitzbrigade<br />";
        }
        if($nte_33 == "shuttersnap"){
            $detail = $detail."shuttersnap<br />";
        }
            
        $detail = $detail."</h4>
        <p>Thanks and Regards,</p>
        <br />
        <span>Team Synsara 2k19</span>
      </div>
    </div>
  </body>
</html>
";
$mail->msgHTML($detail);
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = "Thanks for Registering..! -Team SynSara"; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "<div style='color:#ff0000'>EMail Not Sent to registered email-id. Error: " . $mail->ErrorInfo."</div>";
    //$email_sent_boolean = false;
}else{
    echo "<div style='color:grey'>Confirmation Email sent to  Registered Email-id: <b>".$email."</b></div>";
   // $email_sent_boolean = true;
}
?>