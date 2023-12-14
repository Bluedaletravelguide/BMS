<?php
include 'assets/vendor/autoload.php';
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;
use Minifier\TinyMinify;
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

curl_init();
$filesec = __DIR__ . '/../';
// echo $filesec;
$dotenv = Dotenv::createImmutable($filesec);
$dotenv->load();


session_start();


// initializing variables
$username = "";
$email = "";
$errors = array();
$errors2 = array();

// connect to the database
$db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE8']);



//edbug fucntion
function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


function sendmail3($subscriberemail, $content, $title)
{
    $errors2 = array();

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = $_ENV['MAIL_HOST1']; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = $_ENV['MAIL_USER1']; //SMTP username
        $mail->Password = $_ENV['MAIL_PASS1']; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('it@bluedale.com.my', 'KL The Guide');
        $mail->addAddress($subscriberemail, 'Subscriber'); //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('it@bluedale.com.my');x
        // $mail->addCC('izmeera2000@gmail.com');

        // $mail->addBCC('izmeera2000@gmail.com');

        //Attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        $mail->addEmbeddedImage('../assets/img/LogoNav.png', 'logoimg'); //Add attachments
        $mail->addEmbeddedImage('../assets/img/email/6.jpg', 'footerimg', 'Sign'); //Add attachments
        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $title;
        ob_start();
        require_once 'sendemail.php';
        $output = ob_get_clean();
        $mail->Body = $output;
        // $mail->Body = '
        // <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

        // <a href="https://www.kltheguide.com.my/"> 
        // <img src="cid:logoimg" style="display: block;
        //   margin-left: auto;
        //   margin-right: auto;">
        // <a>
        // <p style="font-family:Helvetica; font-size:18px">Hello ' . $subscriberemail . ',
        // </p>
        // <br>
        // <p style="font-family:Helvetica; font-size:18px">' . $content . '</p>
        // ';
        $mail->AltBody = $title;

        // $mail->addEmbeddedImage('android-chrome-192x192.png', 'logo', 'android-chrome-192x192.png');

        $mail->send();
        // echo 'Message has been sent';
        array_push($errors2, "Message has been sent");

    } catch (Exception $e) {
        array_push($errors2, "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}
function sendmail($subscriberemail, $content, $title)
{
    $errors2 = array();

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 1; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = $_ENV['MAIL_HOST1']; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = $_ENV['MAIL_USER1']; //SMTP username
        $mail->Password = $_ENV['MAIL_PASS1']; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('enquiry@bluedale.com.my', 'KL The Guide');
        $mail->addAddress($subscriberemail, 'Subscriber'); //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('it@bluedale.com.my');x
        // $mail->addCC('izmeera2000@gmail.com');

        // $mail->addBCC('izmeera2000@gmail.com');

        //Attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        // $mail->addEmbeddedImage('../assets/img/LogoNav.png', 'logoimg'); //Add attachments
        // $mail->addEmbeddedImage('../assets/img/email/6.jpg', 'footerimg', 'Sign'); //Add attachments
        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $title;

        $mail->Body = $content;
        // $mail->Body = '
        // <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

        // <a href="https://www.kltheguide.com.my/"> 
        // <img src="cid:logoimg" style="display: block;
        //   margin-left: auto;
        //   margin-right: auto;">
        // <a>
        // <p style="font-family:Helvetica; font-size:18px">Hello ' . $subscriberemail . ',
        // </p>
        // <br>
        // <p style="font-family:Helvetica; font-size:18px">' . $content . '</p>
        // ';
        $mail->AltBody = $title;

        // $mail->addEmbeddedImage('android-chrome-192x192.png', 'logo', 'android-chrome-192x192.png');
        $mail->send();
        // echo 'Message has been sent';
        return '1';

    } catch (Exception $e) {
        return '2';
    }
}

function sendmail2($subscriberemail, $content, $title)
{


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = $_ENV['MAIL_HOST1']; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = $_ENV['MAIL_USER1']; //SMTP username
        $mail->Password = $_ENV['MAIL_PASS1']; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('enquiry@bluedale.com.my', 'KL The Guide');
        $mail->addAddress($subscriberemail, 'Subscriber'); //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('it@bluedale.com.my');
        // $mail->addCC('izmeera2000@gmail.com');

        // $mail->addBCC('izmeera2000@gmail.com');

        //Attachments
        $mail->addEmbeddedImage('assets/img/LogoNav.png', 'logoimg'); //Add attachments
        $mail->addEmbeddedImage('assets/img/email/6.jpg', 'footerimg', 'Sign'); //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true); //Set email format to HTML

        $mail->Subject = $title;
        ob_start();
        require_once 'welcomeemail.php';
        $output = ob_get_clean();
        $mail->Body = $output;
        //         $mail->Body = '

        //         <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

        // <a href="https://www.kltheguide.com.my/"> 
// <img src="cid:logoimg" style="display: block;
//   margin-left: auto;
//   margin-right: auto;">
// <a>
// <p style="font-family:Helvetica; font-size:18px">Hello ' . $subscriberemail . ',
// </p>
// <br>
// <p style="font-family:Helvetica; font-size:18px">Welcome to KL The Guide</p><a style="font-family:Helvetica; font-size:18px" href="https://www.kltheguide.com.my/">See More <img src="cid:footerimg" style="display: block;max-width:650px;
//   margin-left: auto;
//   margin-right: auto;">
// <a>
// </a>


        //         ';
        $mail->AltBody = $title;

        // $mail->addEmbeddedImage('android-chrome-192x192.png', 'logo', 'android-chrome-192x192.png');
        $mail->send();
        echo 'Message has been sent';
        // array_push($errors2, "Message has been sent");

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // array_push($errors2, "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");

    }
}

function sendmail4($subscriberemail, $content, $title)
{


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = $_ENV['MAIL_HOST1']; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = $_ENV['MAIL_USER1']; //SMTP username
        $mail->Password = $_ENV['MAIL_PASS1']; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('enquiry@bluedale.com.my', 'KL The Guide');
        $mail->addAddress($subscriberemail, 'Subscriber'); //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('it@bluedale.com.my');
        // $mail->addCC('izmeera2000@gmail.com');

        // $mail->addBCC('izmeera2000@gmail.com');

        //Attachments
        // $mail->addEmbeddedImage('assets/img/LogoNav.png', 'logoimg'); //Add attachments
        // $mail->addEmbeddedImage('assets/img/email/6.jpg', 'footerimg', 'Sign'); //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true); //Set email format to HTML

        $mail->Subject = $title;
        ob_start();
        require_once '$content';
        $output = ob_get_clean();
        $mail->Body = $output;
        //         $mail->Body = '

        //         <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

        // <a href="https://www.kltheguide.com.my/"> 
// <img src="cid:logoimg" style="display: block;
//   margin-left: auto;
//   margin-right: auto;">
// <a>
// <p style="font-family:Helvetica; font-size:18px">Hello ' . $subscriberemail . ',
// </p>
// <br>
// <p style="font-family:Helvetica; font-size:18px">Welcome to KL The Guide</p><a style="font-family:Helvetica; font-size:18px" href="https://www.kltheguide.com.my/">See More <img src="cid:footerimg" style="display: block;max-width:650px;
//   margin-left: auto;
//   margin-right: auto;">
// <a>
// </a>


        //         ';
        $mail->AltBody = $title;

        // $mail->addEmbeddedImage('android-chrome-192x192.png', 'logo', 'android-chrome-192x192.png');
        $mail->send();
        echo 'Message has been sent';
        // array_push($errors2, "Message has been sent");

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // array_push($errors2, "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");

    }
}

function uploadimage($formname, $folder, $category)
{

    $errors2 = array();

    // echo $folder ;
// echo $category;
    $target_dir = "../assets/img/" . $folder . "/" . $category;
    // echo $target_dir;
    $target_file = $target_dir . basename($formname["name"]);
    // echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($formname["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        // array_push($errors, "Wrongasdasdsan");

        // array_push($errors2, "File is an image - " . $check["mime"] . ".");


        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        array_push($errors2, "File is not an image");

        $uploadOk = 0;
    }


    // Check if file already exists
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        array_push($errors2, "File already exists");

        $uploadOk = 0;
    }

    // Check file size
    if ($formname["size"] > 5000000) {
        // echo "Sorry, your file is too large.";
        array_push($errors2, "Your file is too large");

        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "webp"
    ) {
        // array_push($errors2, "only JPG, JPEG, PNG & GIF files are allowed");

        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        array_push($errors2, "File is not uploaded");
        // if everything is ok, try to upload file
    } else {
        // var_dump($errors2);

        if (move_uploaded_file(($formname["tmp_name"]), $target_file)) {
            array_push($errors2, "The file " . htmlspecialchars(basename($formname["name"])) . " has been uploaded.");

            $filename = basename($formname["name"]);
            return $filename;

        } else {
            array_push($errors2, "Error While Uploading Image");
            // echo "Error While Uploading PDF";


        }
    }
}


function uploadpdf($formname, $path)
{
    debug_to_console($path);
    $errors2 = array();

    // echo $folder ;
// echo $category;

    $target_dir = $path;
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0, true);
    }
    // echo $target_dir;
    $target_file = $target_dir . "/" . basename($formname["name"]);
    // echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));





    // Check if file already exists
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        array_push($errors2, "File already exists");
        // debug_to_console("exist");

        $uploadOk = 0;
    }

    // Check file size
    if ($formname["size"] > 5000000) {
        // echo "Sorry, your file is too large.";
        array_push($errors2, "Your file is too large");
        // debug_to_console("too large");

        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "pdf"
    ) {
        // array_push($errors2, "only JPG, JPEG, PNG & GIF files are allowed");
        // debug_to_console("not pdf");

        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        array_push($errors2, "File is not uploaded");
        // if everything is ok, try to upload file
        // debug_to_console("error upload");
    } else {
        // var_dump($errors2);
        // debug_to_console($target_file);

        if (move_uploaded_file(($formname["tmp_name"]), $target_file)) {
            array_push($errors2, "The file " . htmlspecialchars(basename($formname["name"])) . " has been uploaded.");

            $filename = basename($formname["name"]);
            return $filename;

        } else {
            // array_push($errors2, "Error While Uploading Image");
            debug_to_console("asd");

        }
    }
}

function sendpushnotification($db, $pushtitle, $pushcontent)
{


    $notifications = [];

    $query = "SELECT * FROM pushsub";

    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {

        $endpoint = $row['endpoint'];
        $p256dh = $row['p256dh'];
        $auth = $row['auth'];

        $sub = [
            'subscription' => Subscription::create([
                'endpoint' => $endpoint,
                // Firefox 43+,
                'publicKey' => $p256dh,
                // base 64 encoded, should be 88 chars
                'authToken' => $auth,
                // base 64 encoded, should be 24 chars
            ])
        ];
        array_push($notifications, $sub);
        // var_dump($notifications);

    }
    $push = new WebPush([
        "VAPID" => [
            "subject" => "mailto: <izmeera2000@gmail.com>",
            "publicKey" => $_ENV['VAPID_PUBLIC_KEY'],
            "privateKey" => $_ENV['VAPID_PRIVATE_KEY']
        ]
    ]);
    foreach ($notifications as $notification) {

        $push->queueNotification($notification['subscription'], json_encode([
            "title" => $pushtitle,
            "body" => $pushcontent,
            "icon" => "../assets/img/android-chrome-192x192.png",
            "image" => "../assets/img/sign.jpg"
        ]));
    }

    foreach ($push->flush() as $report) {
        $endpoint = $report->getRequest()->getUri()->__toString();

        if ($report->isSuccess()) {
            echo "<br>[v] Message sent successfully for subscription {$endpoint}.";
            // array_push($errors2, "Message sent successfully for subscription");

        } else {
            echo "<br>[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}";
            // array_push($errors2, "{$endpoint}: {$report->getReason()}");

        }
    }
}


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    // $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

    // if (empty($username)) {
    //     array_push($errors, "Username is required");
    // }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }



    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE  email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists


        if ($user['email'] === $email) {
            array_push($errors, "user already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO users (title, email, password, level) 
  			  VALUES('it', '$email', '$password', 'sdsd')";
        mysqli_query($db, $query);
        // $_SESSION['email'] = $email;
        // $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']) . "@bluedale.com.my";
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // if (empty($username)) {
    //     array_push($errors, "Username is required");
    // }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {


            while ($row = mysqli_fetch_assoc($results)) {
                $_SESSION['email'] = $row["email"];
                $_SESSION['level'] = $row["level"];
            }
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
if (isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
}


//email subscribe
if (isset($_POST['subscribe'])) {

    $email = $_POST['emailsubscribe'];

    $user_check_query = "SELECT * FROM emailsub WHERE emailsub_email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    // $title = "Welcome To KL The Guide";
    // $content = "Welcome to KL The Guide";
    if ($user) { // if user exists

        // if ($user['emailsub_email'] === $email) {
        // }

    } else {
        $query = "INSERT INTO emailsub (emailsub_name, emailsub_email) 
        VALUES('', '$email')";
        mysqli_query($db, $query);
        $query2 = "SELECT * FROM welcomeemail";

        $result2 = mysqli_query($db, $query2);
        while ($row2 = mysqli_fetch_assoc($result2)) {

            $title = $row2['title'];
            $content = $row2['content'];

        }
        sendmail2($email, $content, $title);

    }



}

//email send
if (isset($_POST['sendmail'])) {

    $emailcontent = $_POST['emailcontent'];
    $emailtitle = $_POST['emailtitle'];

    $query = "SELECT * FROM emailsub  ";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {



        sendmail3($row['emailsub_email'], $emailcontent, $emailtitle);

    }




}

if (isset($_POST['queuemail'])) {



    $file = $_POST['file'];
    ob_start();
    require_once $file;

    $output = ob_get_clean();

    $output = TinyMinify::html($output);
    $output = urlencode($output);
    $output = preg_replace('/[\x00-\x1F\x7F]/u', '', $output);
    $output2 = urldecode($output);
    // echo $output2;

    $query = "SELECT * FROM emailsub";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $sendto = $row['emailsub_email'];
        if (isset($_POST['checkbox_name'])) {
            $emailtitle = $sendto . " - " . $_POST['emailtitle'];

        } else {
            $emailtitle = $_POST['emailtitle'];

        }
        $query4 = "INSERT INTO mailqueue (sendstatus, sendto, sendtitle,sendbody) 
        VALUES('0' , '$sendto' , '$emailtitle', '$output')";
        $result4 = mysqli_query($db, $query4);
        if (!empty($result4)) {
            // echo "ok";
        } else {
            // throw new Exception("Value must be 1 or below");
            echo ("Error description: " . mysqli_error($db));

        }

    }

}
if (isset($_POST['sendinternal'])) {



    $file = $_POST['file'];
    ob_start();
    require_once $file;

    $output = ob_get_clean();

    $output = TinyMinify::html($output);
    $output = urlencode($output);
    $output = preg_replace('/[\x00-\x1F\x7F]/u', '', $output);
    $output2 = urldecode($output);
    // echo $output2;

    $query = "SELECT * FROM internal";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $sendto = $row['internal_email'];
        if (isset($_POST['checkbox_name'])) {
            $emailtitle = $sendto . " - " . $_POST['emailtitle'];

        } else {
            $emailtitle = $_POST['emailtitle'];

        }
        $query4 = "INSERT INTO mailqueue (sendstatus, sendto, sendtitle,sendbody) 
        VALUES('0' , '$sendto' , '$emailtitle', '$output')";
        $result4 = mysqli_query($db, $query4);
        if (!empty($result4)) {
            // echo "ok";
        } else {
            // throw new Exception("Value must be 1 or below");
            echo ("Error description: " . mysqli_error($db));

        }

    }

}

//pushnotification
if (isset($_POST['sendpushnotification'])) {


    $pushtitle = $_POST['pushtitle'];
    $pushcontent = $_POST['pushcontent'];

    $notifications = [];

    $query = "SELECT * FROM pushsub";

    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {

        $endpoint = $row['endpoint'];
        $p256dh = $row['p256dh'];
        $auth = $row['auth'];

        $sub = [
            'subscription' => Subscription::create([
                'endpoint' => $endpoint,
                // Firefox 43+,
                'publicKey' => $p256dh,
                // base 64 encoded, should be 88 chars
                'authToken' => $auth,
                // base 64 encoded, should be 24 chars
            ])
        ];
        array_push($notifications, $sub);
        // var_dump($notifications);

    }

    $defaultOptions = [
        "TTL" => 0,
        // defaults to 4 weeks
        "urgency" => "normal",
        // protocol defaults to "normal". (very-low, low, normal, or high)
        "topic" => "newEvent",
        // not defined by default. Max. 32 characters from the URL or filename-safe Base64 characters sets
        "batchSize" => 200,
        // defaults to 1000
    ];
    $push = new WebPush([
        "VAPID" => [
            "subject" => "mailto: <izmeera2000@gmail.com>",
            "publicKey" => $_ENV['VAPID_PUBLIC_KEY'],
            "privateKey" => $_ENV['VAPID_PRIVATE_KEY']
        ]
    ], $defaultOptions);
    $push->setDefaultOptions($defaultOptions);

    foreach ($notifications as $notification) {

        $push->queueNotification($notification['subscription'], json_encode([
            "title" => $pushtitle,
            "body" => $pushcontent,
            "icon" => "../assets/img/android-chrome-192x192.png",
            "image" => "../assets/img/sign.jpg",
            "badge" => "../assets/img/android-chrome-192x192.png",
            "data" => ["url" => "ebook.php#ebook"],
        ]));
    }

    foreach ($push->flush() as $report) {
        $endpoint = $report->getRequest()->getUri()->__toString();

        if ($report->isSuccess()) {
            // echo "<br>[v] Message sent successfully for subscription {$endpoint}.";
            array_push($errors2, "Message sent successfully for subscription");

        } else {
            // echo $report->getReason();
            // echo $endpoint;

            $query = "DELETE FROM pushsub WHERE endpoint='$endpoint'";
            mysqli_query($db, $query);

            // array_push($errors2, "{$endpoint}: {$report->getReason()}");


        }
    }

}
//post user sub data to db
if (isset($_POST['sub'])) {

    $p256dh = json_decode($_POST["sub"])->keys->p256dh;
    $auth = json_decode($_POST["sub"])->keys->auth;
    $endpoint = json_decode($_POST["sub"])->endpoint;
    debug_to_console($_POST["sub"]);


}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["newsalesconfirm"])) {
        debug_to_console($_POST['sc']);
        debug_to_console($_POST['company_name']);
        debug_to_console($_POST['product_name']);
        debug_to_console($_POST['amount']);
        debug_to_console($_POST['bgoc']);
        debug_to_console($_POST['remark']);
        debug_to_console($_POST['radiocheck']);
        debug_to_console($_POST['durationmonth']);
        $d = strtotime("now");


        $sc = $_POST['sc'];
        $company_name = $_POST['company_name'];
        $product_name = $_POST['product_name'];
        $amount = $_POST['amount'];
        $bgoc = $_POST['bgoc'];
        $remark = $_POST['remark'];
        $d = date("Y-m-d h:i:sa", $d);
        if ($_POST['radiocheck'] == 2) {
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
            $duration = null;
        } else {
            $date_start = null;
            $date_end = null;
            $duration = $_POST["durationmonth"];
        }


        debug_to_console($_POST['date_end']);


        $pdfname = uploadpdf($_FILES["filenamesale"], "assets/pdf/confirmation/" . $_POST['company_name']);

        debug_to_console($pdfname);

        $query = "INSERT INTO products (name, product,amount,bgoc,sc,remarks,confirmationfilename,date_start,date_end,duration) 
        VALUES('$company_name','$product_name','$amount','$bgoc','$sc','$remark','$pdfname' ,'$date_start' ,'$date_end','$duration' )";
        mysqli_query($db, $query);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }

}





if (isset($_POST["testqueue"])) {
    // echo "sucess";

    $query4 = "SELECT * FROM mailqueue WHERE sendstatus=0 LIMIT 30 ";
    $result4 = mysqli_query($db, $query4);
    $counter = 0;
    while ($row4 = mysqli_fetch_assoc($result4)) {
        if ($counter == 0) {
            // sendmail('annie@bluedale.com.my', urldecode($row4['sendbody']), $row4['sendtitle']);

        }
        $id = $row4['id'];
        $date = date('Y-m-d H:i:s');
        // echo "send";
        $response = sendmail($row4['sendto'], urldecode($row4['sendbody']), $row4['sendtitle']);

        $query = "UPDATE mailqueue SET sendstatus=$response , send_time='$date'  WHERE  id=$id";
        $update = mysqli_query($db, $query);

        $counter++;
    }




}

if (isset($_POST["clearqueue"])) {
    // echo "sucess";

    $query4 = "DELETE FROM  mailqueue WHERE sendstatus=1 ";
    $result4 = mysqli_query($db, $query4);



}

if (isset($_POST["checkproduct"])) {
    // echo "sucess";

    // $query4 = "DELETE FROM  mailqueue WHERE sendstatus=1 ";
    // $result4 = mysqli_query($db, $query4);
    $name = $_POST["checkproduct"];

    $query = "SELECT * FROM products WHERE name='$name' AND statusjoborder IS NULL ";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $row['product'] ?>">
            <?php echo $row['product']; ?>-
            <?php echo date("d-m-Y", strtotime($row['date_confirm'])) ?>
        </option>

        <?php
    }


}

if (isset($_POST["newjoborder"])) {
    // echo "sucess";
    debug_to_console($_POST['sc']);
    debug_to_console($_POST['company_name']);
    debug_to_console($_POST['product_name']);
    debug_to_console($_POST['remark']);
    debug_to_console($_POST['note']);
    $sc = $_POST['sc'];
    $company_name = $_POST['company_name'];
    $product_name = $_POST['product_name'];
    $remark = $_POST['remark'];
    $note = $_POST['note'];

    $datetime_created = date('Y-m-d');
    ;

    // showordersite();
    // header ('Location: ' . $_SERVER['REQUEST_URI']);
    // exit();
    $query = "INSERT INTO job_order (datetime_created,sc,company_name,type,note,remark) 
    VALUES('$datetime_created','$sc','$company_name','$product_name','$note','$remark')";
    $result = mysqli_query($db, $query);
    if (!empty($result)) {
        // echo "ok";
    } else {
        // throw new Exception("Value must be 1 or below");
        echo ("Error description: " . mysqli_error($db));

    }
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}


if (isset($_POST["newsite_joborder_bbtb"])) {
    // echo "sucess";
    debug_to_console($_POST['location']);
    debug_to_console($_POST['size']);
    debug_to_console($_POST['date_start']);
    debug_to_console($_POST['date_end']);

    $job_order_id = $_POST['job_order_id'];

    $location = $_POST['location'];
    $company_name = $_POST['company_name'];
    $size = $_POST['size'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];


    // showordersite();
    // header ('Location: ' . $_SERVER['REQUEST_URI']);
    // exit();


    $query = "INSERT INTO job_order_bbtb (job_order_id,company_name,site_location,size,date_start,date_end) 
    VALUES('$job_order_id','$company_name','$location','$size','$date_start','$date_end')";
    $result = mysqli_query($db, $query);
    if (!empty($result)) {
        // echo "ok";

        $timeupdate = date("Y-m-d H:i:s");

        $query2 = "UPDATE job_order SET datetime_updated='$timeupdate' WHERE id='$job_order_id'";
        $result2 = mysqli_query($db, $query2);
        if (!empty($result2)) {
        } else {
            // throw new Exception("Value must be 1 or below");
            echo ("Error description: " . mysqli_error($db));

        }



    } else {
        // throw new Exception("Value must be 1 or below");
        echo ("Error description: " . mysqli_error($db));

    }
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}



if (isset($_POST["approve_joborder"])) {
    // echo "sucess";
    debug_to_console($_POST['sc']);
    debug_to_console($_POST['company_name']);
    debug_to_console($_POST['job_order_id']);
    debug_to_console($_POST['incharge']);

    // $job_order_id = $_POST['job_order_id'];

    // $location = $_POST['location'];
    // $company_name = $_POST['company_name'];
    // $size = $_POST['size'];
    // $date_start = $_POST['date_start'];
    // $date_end = $_POST['date_end'];


    // showordersite();
    // header ('Location: ' . $_SERVER['REQUEST_URI']);
    // exit();

    // $query = "INSERT INTO job_order_bbtb (job_order_id,company_name,site_location,size,date_start,date_end) 
    // VALUES('$job_order_id','$company_name','$location','$size','$date_start','$date_end')";
    // $result = mysqli_query($db, $query);
    // if (!empty($result)) {
    // } else {
    //     echo ("Error description: " . mysqli_error($db));

    // }
    // header('Location: ' . $_SERVER['REQUEST_URI']);
    // exit();
}



if (isset($_POST["newcontact2"])) {
    // echo "sucess";
    // debug_to_console($_POST['sc']);
    // debug_to_console($_POST['company_name']);
    // debug_to_console($_POST['product_name']);
    // debug_to_console($_POST['remark']);
    // debug_to_console($_POST['note']);
    $company_name = $_POST['company_name'];
    $company_email = $_POST['company_email'];
    $company_phone_office = $_POST['company_phone_office'];
    $company_phone_mobile = $_POST['company_phone_mobile'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $industry = $_POST['industry'];


    // showordersite();
    // header ('Location: ' . $_SERVER['REQUEST_URI']);
    // exit();
    $query = "INSERT INTO contacts2 (
        company_name,
        company_email,
        company_phone_office,
        company_phone_mobile,
        city,
        state,
        country,
        industry
        ) 
    VALUES(
        '$company_name',
        '$company_email',
        '$company_phone_office',
        '$company_phone_mobile',
        '$city',
        '$state',
        '$country',
        '$industry'
        )";
    $result = mysqli_query($db, $query);
    if (!empty($result)) {
        // echo "ok";
    } else {
        // throw new Exception("Value must be 1 or below");
        echo ("Error description: " . mysqli_error($db));

    }
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}


if (isset($_POST["importcontact2"])) {
    // debug_to_console("startread");

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["excel"]["type"], $allowedFileType)) {
        // echo "<script type='text/javascript'>alert('start');</script>";

        $targetPath = 'uploads/' . $_FILES['excel']['name'];
        $moved = move_uploaded_file($_FILES['excel']['tmp_name'], $targetPath);
        if ($moved) {
            // debug_to_console('sukses bossku');
        } else {
            // debug_to_console($_FILES["excel"]["error"]);

        }
        $Reader = new Xlsx();

        $spreadSheet = $Reader->load($targetPath);

        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
        // debug_to_console($sheetCount);

        // echo "<script type='text/javascript'>alert('$sheetCount');</script>";




        for ($i = 1; $i <= $sheetCount; $i++) {

            $company_name = "";
            $company_email = "";
            $company_phone_office = "";
            $company_phone_mobile = "";
            $city = "";
            $state = "";
            $country = "";
            $industry = "";

            if (isset($spreadSheetAry[$i][0])) {

                $company_name = mysqli_real_escape_string($db, $spreadSheetAry[$i][0]);

            }
            if (isset($spreadSheetAry[$i][1])) {
                $company_email = mysqli_real_escape_string($db, $spreadSheetAry[$i][1]);
            }
            if (isset($spreadSheetAry[$i][2])) {
                $company_phone_office = mysqli_real_escape_string($db, $spreadSheetAry[$i][2]);
            }
            if (isset($spreadSheetAry[$i][3])) {
                $company_phone_mobile = mysqli_real_escape_string($db, $spreadSheetAry[$i][3]);
            }
            if (isset($spreadSheetAry[$i][6])) {
                $city = mysqli_real_escape_string($db, $spreadSheetAry[$i][6]);
            }
            if (isset($spreadSheetAry[$i][7])) {
                $state = mysqli_real_escape_string($db, $spreadSheetAry[$i][7]);
            }
            if (isset($spreadSheetAry[$i][8])) {
                $country = mysqli_real_escape_string($db, $spreadSheetAry[$i][8]);
            }
            if (isset($spreadSheetAry[$i][9])) {
                $industry = mysqli_real_escape_string($db, $spreadSheetAry[$i][9]);
            }




            // $query = "insert into contacts2(company_name,company_email) values(?,?)";
            // $paramType = "ss";
            // $paramArray = array(
            //     $name,
            //     $description
            // );
            // $insertId = $db->insert($query, $paramType, $paramArray);

            $query = "INSERT IGNORE  INTO contacts2 (
                    company_name,
                    company_email,
                    company_phone_office,
                    company_phone_mobile,
                    city,
                    state,
                    country,
                    industry
                    ) 
                VALUES(
                    '$company_name',
                    '$company_email',
                    '$company_phone_office',
                    '$company_phone_mobile',
                    '$city',
                    '$state',
                    '$country',
                    '$industry'
                    )";
            $result = mysqli_query($db, $query);

            // if (!empty($insertId)) {
            //     $type = "success";
            //     $message = "Excel Data Imported into the Database";
            // } else {
            //     $type = "error";
            //     $message = "Problem in Importing Excel Data";
            // }

        }

    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
        // debug_to_console($type);
        // debug_to_console($message);

    }
    unlink($targetPath);

    $urlserver = $_SERVER['REQUEST_URI'];
    header("Location: $urlserver");
    exit();
}



if (isset($_POST["exportcontact2"])) {

    print_r("asdasd");

    $postdata = $_POST['data'];
    $useremail = $_SESSION['email'];
    // print_r($songData);
    foreach ($postdata as $x => $val) {
        // print_r($val[0]);
        $query = "INSERT INTO contacts2todo (list_created_by,company_name, company_email) 
  			  VALUES('$useremail','$val[1]', '$val[2]')";
        mysqli_query($db, $query);
    }
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}


if (isset($_POST["editcontactlist2"])) {

    $list_created_for = $_POST["list_created_for"];
    $list_name = $_POST["list_name"];
    $list_created_date = $_POST["list_created_date"];
    $list_created_by = $_POST["list_created_by"];
    $query = "UPDATE contacts2todo SET  list_created_for='$list_created_for' ,list_name='$list_name' 
    WHERE  list_created_date='$list_created_date' AND list_created_by='$list_created_by' ";
    mysqli_query($db, $query);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

if (isset($_POST["contacttodo_crm"])) {

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $contact2todoid = $_POST['id'];
    $email = $_POST['email'];

    // $check_query = "SELECT * FROM contacts2todo_dates WHERE  contacts2todo_id='$contact2todoid'  ";
    // $result = mysqli_query($db, $check_query);
    // $user = mysqli_fetch_assoc($result);

    // if ($user) { // if user exists

    //     if ($user['crm'] == "") {
    //         $contact2todoid = $_POST['id'];
    //         $datenow = date('Y-m-d H:i:s', strtotime('now'));
    //         debug_to_console($datenow);
    //         $query = "UPDATE contacts2todo_dates SET  crm='$datenow'
    //     WHERE  contacts2todo_id='$contact2todoid'  ";
    //         mysqli_query($db, $query);
    //     } else {
    //         $contact2todoid = $_POST['id'];
    //         $datenow = date('Y-m-d H:i:s', strtotime('now'));
    //         debug_to_console($datenow);
    //         $query = "INSERT INTO contacts2todo_dates SET  crm='$datenow'
    //     WHERE  contacts2todo_id='$contact2todoid'  ";
    //         mysqli_query($db, $query);
    //     }
    // }

    $query = "INSERT INTO contacts2todo_dates (contacts2todo_id,type,user)
        VALUES  ('$contact2todoid','crm','$email')  ";
    mysqli_query($db, $query);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

if (isset($_POST["contacttodo_phone"])) {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $contact2todoid = $_POST['id'];
    $email = $_POST['email'];

    $query = "INSERT INTO contacts2todo_dates (contacts2todo_id,type,user)
        VALUES  ('$contact2todoid','phone','$email')  ";
    mysqli_query($db, $query);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

if (isset($_POST["contacttodo_email"])) {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $contact2todoid = $_POST['id'];
    $email = $_POST['email'];

    $query = "INSERT INTO contacts2todo_dates (contacts2todo_id,type,user)
        VALUES  ('$contact2todoid','email','$email')  ";
    mysqli_query($db, $query);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}
if (isset($_POST["contact2"])) {

    $data = array();

    $query = "SELECT * FROM contacts2   ";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode($data);
}


if (isset($_POST["contact2-list-post"])) {
    $query = "SELECT * FROM contacts2todo GROUP BY list_created_date   ";
    $result = mysqli_query($db, $query);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $date_created = $row['list_created_date'];
        $date = strtotime($row['list_created_date']);
        $formatteddate = date('d-m-Y', $date);

        $listname = $row['list_name'];
        $yearnow = date('Y');
        $list_created_by = $row['list_created_by'];
        $list_created_for = $row['list_created_for'];

        $btnfunc = "openModalEditList('$list_created_by','$date_created','$listname','$list_created_for')";


        $action1 = '<button type="submit" class="btn btn-primary m-1" name="editcontactlist"
        onclick="' . $btnfunc . '">Edit</button>';
        $action2 = "<a href='contact2-list.php?query=$listname&year=$yearnow' class='btn btn-primary m-1'>See</a>
";

        $data[] = array(
            "date" => $formatteddate,
            "name" => $listname,
            "created_by" => $list_created_by,
            "created_for" => $list_created_for,
            "action" => $action1 . $action2,
        );

    }
    echo json_encode($data, JSON_UNESCAPED_SLASHES);

}


?>