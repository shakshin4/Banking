<?php include 'link.php' ?>
</head>

<body>
<?php include 'navbar.php'?> 
<?php include 'conn.php' ?>
<?php

$sql = " select * from admin ";

$result = $con->query($sql);

if ($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc())
  {
	  $adminname=$row['AdminName'];
	  $email=$row['Email'];
	  $address=$row['Address'];
	  $phoneno=$row['PhoneNumber'];
	  $dob=$row['DOB'];
	   
	  
  }
}

?>






<div class="container bg-light mt-4">  

<div class="jumbotron ">
  <div class="container ">
    <h1 class="text-center font-weight-bold text-shadow text-dark" style=" text-shadow: 3px 1px #808080;">ADMIN DETAILS</h1>      
  </div>
</div>
<div class="row mt-5">
 <div class="col-4 ">    
  <img src="img/my.jfif" class="img-thumbnail ml-5" alt="Cinque Terre" width="200px" height="100px"> 
</div>
<div class="col-8">         
  <table class="table " >
 
    <tbody>
      <tr>
        <td><h5 style="color:	#708090" >Admin Name</h5></td>
        <td style="color:#696969"><?php  echo $adminname; ?></td>
	</tr>
	<tr>
        <td><h5 style="color:	#708090">Email</h5></td>
		<td style="color:#696969"><?php  echo $email; ?></td>
	</tr>
	<tr>
		<td><h5 style="color:	#708090">Address<h5></td>
        <td style="color:#696969"><?php  echo $address; ?></td>
      </tr>
	<tr>
		<td><h5 style="color:	#708090">Phone No</h5></td>
		<td style="color:#696969"><?php  echo $phoneno; ?></td>
	</tr>
	<tr>
		<td><h5 style="color:	#708090">DOB</h5></td>
        <td style="color:#696969"><?php  echo $dob; ?></td>
      </tr>
      
    </tbody>
  </table>
  </div>
</div>
</div>

<!--<div class="container">        
  <img src="img/Shakshi_photo.jpg" class="img-thumbnail" alt="Cinque Terre" width="255" height="200"> 
</div>-->
      
</body>
</html>