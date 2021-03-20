
<?php include 'conn.php' ?>
<?php 

   $email=$_POST["email1"];
  $amount=$_POST["amount"];

   $sql="select currentBalance from accountdetails where customerId='$email'";
$res=mysqli_query($con,$sql);
    while($result=mysqli_fetch_array($res))
    {
     $currentbal=$result['currentBalance'];
    
     }
       $currentbal=(int)$currentbal;   
       $amount=(int)$amount; 
       
       $balance=strval($currentbal+$amount);
       $sql1 = "UPDATE accountdetails SET currentBalance='$balance' WHERE customerId='$email'";
     
       if (mysqli_query($con, $sql1)) {
             
           
        echo "Record updated successfully";
        $sql2= "INSERT INTO transactions(customerId,status, amount) VALUES('$email','paid','$amount') ";
        if(mysqli_query($con,$sql2))
        {
          echo "Connection Successfull";
        }
        else{
          echo "Error".$sql2."<br>".mysqli_error($con);
        }
      } else {
        echo "Error updating record: " . mysqli_error($con);
      }
       


           
           
  
?>