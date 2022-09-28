<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{   $email=$_POST['email'];
    $con = mysqli_connect('localhost','root','','wms');
    $result = "select email,password from users where md5(email)='$email'";
    $select=mysqli_query($con,$result);
  if(mysqli_num_rows($select)==1)
  {
    while($row=mysqli_fetch_array($select))
    {
      $email=md5($row['email']);
      $pass=md5($row['password']);
    }
    $link="<a href='www.samplewebsite.com/reset.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    require_once('phpmail/PHPMailerAutoload.php');
    $mail =new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;                  
    $mail->Username = "waswagodwin19@gmail.com";
    // GMAIL password
    $mail->Password = "your_gmail_password";
    $mail->SMTPSecure = "ssl";  
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
    $mail->From='waswagodwin19@gmail.com';
    $mail->FromName='Godwin Waswa';
    $mail->AddAddress('reciever_email_id', 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$pass.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
?>