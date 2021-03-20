<?php include 'link.php'?>
<?php include 'conn.php'?>

<script>
function relocate_home()
{
     var searchuser=  $("#searchUser").val();
     
			$.ajax({

url :'searchuser.php',

data: {searchuser:searchuser},

type : 'POST', 
beforeSend: function(response)
{
  $("#loader").show();
      

},	   
success : function(response){

   $('#result').html(response);
  
   $("#reg").val($("#hidden_reg_no").val());
      
   var reg_no=$("#hidden_reg_no").val();


   
     
     setTimeout(function(){ window.location = "transferMoney.php?reg_no="+reg_no}, 3000);
 
   
      

            }
    });
 
   
    
     
} 

</script>
<body style="background:#D3D3D3" onload="$('#loader').hide()">
<?php include 'navbar.php'?>
<div id="result">  </div>
<div  id="loader" style="display:block;position:fixed;width:100%;height:100%;background-color:rgba(0,0,0,0.6);z-index:1366;"> 
     <img  src="img/loading3.gif" style="width:10%;height:10%;margin-top:200px;margin-left:600px;" class="b">
</div>
<div class="jumbotron m-5 shadow ">


   <form class="form m-5">
    <label > <h2 class="text-center" style="color:#808080">Transfer your money fast and Secure</h2></label>
     <div class="input-group mb-3">
  <input type="text"  id="searchUser" class="form-control shadow" placeholder="Enter the userid or phonenumber">
  <div class="input-group-append ">
  <input type="button" class="btn btn-info shadow " value="SEARCH" onclick="relocate_home()">
  </div>
</div>
     </form>
  

</div>
</body>
</html>