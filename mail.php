<?php
session_start();
require_once('database.php');
include('employees.php');
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
$message .= '<p style="color:#080;font-size:18px;">"Welcome to my site,\n

Dear <?php echo $firstname ?>, You have been registered on our site.\n

Please visit <a href="<?php echo $LoginUrl ?>">This Link</a> to view your account\n

Regards."</p>';
$message .= '</body></html>';
$result = $conn->query("SELECT email FROM employee");

while ($row = $result->fetch_object()) {
    if (isset($row->email)) {
        $to = $data['email'];
        $subject = 'Welcome to the Company!';
        $from = $_SESSION['username'];
        
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $LoginUrl = 'http://localhost/projectwork/login%20page.php';
        
        // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        // Compose a simple HTML email message
        $message = '<html><body>';
        $message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
        $message .= '<p style="color:#080;font-size:18px;">"Welcome to my site,\n

        Dear <?php echo $firstname ?>, You have been registered on our site.\n

        Please visit <a href="<?php echo $LoginUrl ?>">This Link</a> to view your account\n

        Regards."</p>';
        $message .= '</body></html>';
        
        // Sending email
        if(mail($to, $subject, $message, $headers)){
            echo 'Your mail has been sent successfully.';
        } else{
            echo 'Unable to send email. Please try again.';
        }
    }
} 
?>