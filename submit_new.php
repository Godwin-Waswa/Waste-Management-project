<?php
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $con = mysqli_connect('localhost','root','','wms');
  $result = "select email,password from users where md5(email)='$email'";
  $select=mysqli_query($con,$result);
}
?>