<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$name = $_POST['name'];
$phone = $_POST['phonenumber'];
$sai = $_POST['mail']; 

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn-connect_error) {
    die('Connection error: ' . $conn->connect_error);
} else {
    // Prepare and execute database insertion
    $stmt = $conn->prepare('INSERT INTO leads (name, phone, mail) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $name, $phone, $sai); 
    $stmt->execute();

    // Send email
    $mail = new PHPMailer(false); 
    try {
        //Server settings
        $mail->isSMTP();                             
        $mail->Host       = 'smtp.gmail.com';       
        $mail->SMTPAuth   = true;           
        $mail->Username   = 'madworkdeveloper@gmail.com';
        $mail->Password   = 'oklotoybyecaiwex';
        $mail->SMTPSecure = 'tls';           
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('madworkdeveloper@gmail.com', $name);
        $mail->addAddress('challasai525@gmail.com');     

        // Content
        $mail->isHTML(true);                             
        $mail->Subject = 'New Lead Submitted';
      // HTML body with inline CSS for styling
$mail->Body ="
    <div style='
        background-color: #f0f0f0;
        border: 1px solid #ccc;        
        padding: 20px;
        border-radius: 5px;
        width:50%;
        box-shadow: 1px 2px 3px 4px #00000045;
    '>
        <h2>New Lead Submitted</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Email:</strong> $sai</p>
    </div>
";
        $mail->send();
        echo '';         
        echo '';
    } catch (Exception ) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div style="background: white;width: 50%;margin: 0 auto;
             padding: 2rem;box-shadow: 1px 2px 3px 4px #0000005e;
             border-radius: 1rem;text-align: center; 
             margin-top: 50px; font-size: 24px;">Thank you..!<br>We
        will Get Back to You soon..!<br><br><button onclick="history.back()"
            style="padding: 10px 20px; font-size: 18px; background-color:#eab52b; color: white; border: none; border-radius: 5px; cursor: pointer;">Go
            Back to Home</button></div>

</body>

</html>