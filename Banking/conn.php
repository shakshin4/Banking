<?php
  $server='localhost';
  $username='root';
  $password='';
  $db='banking';
  $con=mysqli_connect($server,$username,$password,$db);
  if(!$con)
  {
      die("Connection to This is database");
       
  }
 