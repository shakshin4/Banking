<?php include 'link.php'?>
<?php include 'conn.php'?>
<?php
if(isset($_GET['reg_no']) && $_GET['reg_no'] !== '' ){
  $reg_no = $_GET['reg_no'];
  $sql="SELECT name , email FROM  customer where reg_no=$reg_no";

$res=mysqli_query($con,$sql);
if (mysqli_num_rows($res)> 0){
while($result=mysqli_fetch_array($res)){
     $name=$result['name'];
     $email=$result['email'];
     
}
}
else{
     echo "enter valid user id and password";
}
} else {
   echo "failed";
}




   
     $sql1="SELECT currentBalance FROM  accountdetails where customerId='$email'";
     $res1=mysqli_query($con,$sql1);
     while($result1=mysqli_fetch_array($res1))  
     {
          $amount =$result1['currentBalance'];
     
     }
        
     

?>
<script>
 function addMoney()
 {
      
  
      var currentbalance=10000;
     
        var email=<?php echo json_encode($email); ?>;
       
      var amount1=$("#amount").val();
      if(amount1<currentbalance)
      {
       
          $.ajax({

          url :'amount.php',

          data: {email1:email,amount:amount1},

            type : 'POST', 
            beforeSend: function(response){
               $('#loader').show();
            },
               success : function(response){
                    $('#loader').hide();
                    setInterval('location.reload()', 1000);    
             alert(response);

                  }});
                    
  

           
  
      }
      else
      {
           alert("Amount insufficent");
      }
  
     
    
  
    
      
 } 
</script>

<body onload="$('#loader').hide()">
<?php include 'conn.php'?>
<div  id="loader" style="display:block;position:fixed;width:100%;height:100%;background-color:rgba(0,0,0,0.6);z-index:1366;"> 
<img  src="img/loading3.gif" style="width:10%;height:10%;margin-top:200px;margin-left:600px;" class="b">
</div>
   <div class="jumbotron ">
 
          <div class="input-group mt-3 mt-2 input-group-lg">
               <div class="input-group-append ">
                      <span class="input-group-text bg-dark text-white input-group-lg border-1 rounded font-weight-bold font-italic ">To <?php echo $name ?></span>
              </div>
               <div class="input-group-append input-group-lg">
                           <span class="input-group-text "><i class="fas fa-rupee-sign"></i></span>
              </div>
                 <input type="text" id="amount" class="form-control" placeholder="Enter your Amount" >
                 <div class="input-group-append input-group-lg border-1 rounded">
                    <button type="button" onclick="addMoney()" class="input-group btn bg-dark text-white font-weight-bold " >SEND</button>
               </div>
          
         </div> 
              <div class="mt-5 text-center">
                    <div class="bg-dark pl-5 pr-4 pb-1  pt-2 border-2 rounded-pill d-inline-block"> <h4 class="text-center text-white">Banking Name: <?php echo $name ?>&nbsp;<i class="fas fa-check-circle text-success"></i></h4> <div>
        

               </div>
            
          </div>    
         
  </div>
 
  <?php 
        $sql="select *from transactions where customerId='$email'  ORDER BY transactionId DESC";
        $res=mysqli_query($con,$sql);
           while($result=mysqli_fetch_array($res))
           {
                if($result['status']=='paid')
                {
?>  
          <div  id="event" class="card p-2 m-3" style="background:	#F0FFFF;">
           <div class="card-header text-bold " ><h3 class="text-right"><?php echo $result['amount'] ?></h3></h3></div>
           <div class="card-body"><h4 class="text-right" style="background:#F0FFFF;"><?php echo $result['status'] ?> <h4></div> 
           </div>
           <?php
           }
           else{
          ?>
               <div class="card p-2 m-3">
           <div class="card-header text-bold "><h3 class=" text-left "><?php echo $result['amount'] ?></h3></h3></div>
           <div class="card-body"><h4 class=" text-left text-capitalize"><?php echo $result['status'] ?><h4></div> 
           </div>
        <?php
           }
          }
 ?>
          

      </div>
</body>
</html>
