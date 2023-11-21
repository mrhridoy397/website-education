<?php 
 
    require ('connection.php');
    session_start();
 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    function sendmail($email,$reset_token){
         
        require ('PHPMailer-master/src/PHPMailer.php');
        require ('PHPMailer-master/src/Exception.php');
        require ('PHPMailer-master/src/SMTP.php');
 
        $mail = new PHPMailer(true);
 
        try {
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '3fd1b874b6cef1';
            $mail->Password = '4925788d54dfcd';                          
 
            $mail->setFrom('mrhridoy39709@gmail.com');
            $mail->addAddress($email);
 
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset link form Education';
            $mail->Body    = "we got a request form you to reset Password! <br>Click the link bellow: <br>
            <a href='http://localhost/education/admin/updatePassword.php?email=$email&reset_token=$reset_token'>reset password</a>";
 
            $mail->send();
                return true;
        } catch (Exception $e) {
                return false;
        }
    }
 
 
    // update password
    if (isset($_POST['send-link'])) {
         
        $email = $_POST['email'];
 
        $sql="SELECT * FROM user WHERE email = '$email'";
        $result = $conn->query($sql);
 
        if ($result) {
             
            if ($row = $result->fetch_assoc()) {
                 
                $reset_token=bin2hex(random_bytes(16));
                date_default_timezone_set('Asia/dhaka');
                $date = date("Y-m-d");
 
                $sql = "UPDATE user SET resettoken ='$reset_token', resettokenexp = '$date' WHERE email = '$email'";
 
                if (($conn->query($sql)===TRUE) && sendmail($email,$reset_token )===TRUE) {
                        echo "
                            <script>
                                alert('Password reset link send to mail.');
                                window.location.href='index.php'   
                            </script>"; 
                    }else{
                        echo "
                            <script>
                                alert('Something got Wrong');
                                window.location.href='forgotPassword.php'
                            </script>";
                    }
 
            }else{
                echo "
                    <script>
                        alert('Email Address Not Found');
                        window.location.href='forgotPassword.php'
                    </script>";
            }   
             
        }else{
            echo "
                <script>
                    alert('Server Down');
                    window.location.href='forgotPassword.php'
                </script>";
        }
    }
 ?>