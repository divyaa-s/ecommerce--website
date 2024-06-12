<?php

$uname=$_POST['username'];
$upass=$_POST['password'];
$utype=$_POST['usertype'];

$cipher_password=md5($upass);

$conn=new mysqli("localhost","root","","jan",3307);

mysqli_query($conn,"insert into user(username,password,usertype) values ('$uname','$cipher_password','$utype')");


?>
