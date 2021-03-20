<?php include 'conn.php' ?>
<?php
    $searchuser=$_POST['searchuser'];
    $sql="SELECT reg_no FROM  customer where mobileNo='$searchuser' or email='$searchuser'";
    $res=mysqli_query($con,$sql);
    if (mysqli_num_rows($res) > 0)
    {
    while($result=mysqli_fetch_array($res))
    {
        ?>
        <input type="hidden" id="hidden_reg_no" value="<?php echo $result['reg_no'];?>">
     <?php
    
    }
}
    else{
        echo 'Plz Enter valid userid and Mobile Number';    
    }
              
    
  

?>