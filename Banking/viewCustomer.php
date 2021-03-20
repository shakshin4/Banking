
      <?php include 'link.php' ?>
      <?php include 'conn.php' ?>
     
   

<body>
   
       <?php include 'navbar.php' ?>
        <table class="table table-lg  table-responsive-sm mt-5 table-striped mt-2">
        <thead style="background:	#F0F8FF;color:#808080">
           <tr>
            <th>NAME</th>
            <th>MOBILE NUMBER</th>
            <th>EMAIL </th>
            <th>TRANSFER MONEY</th>
            <th>VIEW TRANSACTION</th>
           </tr> 
        </thead>
        <tbody>
        <?php
        $sql="SELECT * FROM  customer";

        $res=mysqli_query($con,$sql);
        while($result=mysqli_fetch_array($res))
        {
            ?>
            <tr>
          <td style="color:#808080">
                <?php echo $result['name'] ?>
          </td>
          <td style="color:	#808080">
              <?php echo $result['mobileNo'] ?>
          </td>
          <td style="color:	#808080">
            <?php echo $result['email'] ?>
          </td>
          <td>
          <a href="transferMoney.php?reg_no=<?php echo $result['reg_no']; ?>" class="text-decoration-none"><i class="fas fa-rupee-sign fa-2x"></i>Click to transfer Money </a>
          </td>
          <td>
         <a href="checktransaction.php?email=<?php echo $result['email']; ?>" class="text-decoration-none" > <i class="fas fa-exchange-alt fa-2x "></i>click to check transaction</a>
          </td>
  </tr>
        </tbody>
        <?php 
        }
        ?>


        
   

    </table>



</body>
</html>