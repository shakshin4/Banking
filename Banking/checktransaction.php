<?php include 'link.php' ?>
<?php include 'conn.php' ?>
<body style="background:#DCDCDC;width:100%;height:100%"> 
  <?php include 'navbar.php' ?>
 <?php 
 
  if(isset($_GET['email']) && $_GET['email'] !== '' )
  {
         $email = $_GET['email'];

   


}


  ?>
  <div class="container  mt-5">
<div class="jumbotron">
<div> <h4 class="text-center text-dark" > Transaction with :<?php echo $email?></h4></div>
 <table class="table table-lg  table-responsive-sm  table-striped ">
  <thead >
  <tr class="text-dark font-weight-bold"> 
    <th class="text-center"><h5>Transaction Id</h5></th>
    <th><h5> Status</h5></th>
    <th><h5> Amount</h5> </th>
  </tr>
  </thead>
 
 <tbody>
 <?php
        $sql="SELECT * FROM  transactions where customerId='$email'";
        $res=mysqli_query($con,$sql);
        while($result=mysqli_fetch_array($res))
        {
?>
   <tr>
     <td><h5 style="color:	#808080" class="text-center"><?php  echo $result['transactionId']; ?></h5></td>
     <td style="color:#696969"><?php  echo $result['status']; ?></td>
     <td style="color:#696969"><?php  echo $result['amount']; ?></td>
</tr>
    <?php
        }
        ?>
 </tbody>
</table>
</div>
   </div>
  
</body>
</html>