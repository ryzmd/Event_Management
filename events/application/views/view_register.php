<?php include 'header.php' ?>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jqu
ery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
  //alert('fasfa');
  var username='';
 $('input').keyup(function(){
    var name=$("#name").val();
    username=$("#username").val();
    var password=$("#password").val();
    var password2=$("#password2").val();
    var gender=$('#gender').val();
    var address=$("#address").val();
    var email=$("#email").val();
    var phone=$('#phone').val();
    var age=$('#age').val();
    if(name!='' && age!='' && username!='' && password !='' && password2 !='' && gender!='none' && email!='' && phone!='' && address!=''){
      $('#signup').removeAttr('disabled');
    }
    else
    {
    $("#signup").prop("disabled",true);
    } 

 });

 $('#password2').keyup(function(){
 // alert('jebv');
    if(password2.value!=password.value){
       //alert(password+password2);
        $('#pass_check').html("<i style='color:red'>passwords do not match</i>");
    }
    else{
      //alert("no");
      $('#pass_check').html("<i style='color:green'>passwords match</i>");
    }
    

 });
 
 $('#username').keyup(function(){
    
       
       //alert(username);
       $.ajax({

      url:"<?php echo base_url('register/check_team_available');?>",
      method:'POST',
      data:'username='+username,
      success:function(result){
        //alert(result);
        if(result)
        {
            $('#validity').html("<i style='color:green'>Avaliable</i>");
        }
        else
        {
            $('#validity').html("<i style='color:red'> Not Avaliable</i>");
        }
      }

    
  });
  });
});


</script>
<style>
#signup-window{
  margin-top:10%; 
  margin-left:60%;
  margin-right:auto;
  margin-bottom:auto;
}
</style>
<div class="navbar navbar-inverse">
<div class="navbar-inner">
    <a class="brand" href="#">Event Management</a>
    <ul class="nav">
      <li class="active"><a href="login">Home</a></li>
    </ul>    
  </div><!-- nav bar inner -->

<div class="container-fluid">
<div class="row-fluid">
 <div class="span4 well"  id="signup-window">
    <form action='<?php echo base_url("register/register_done");?>' method='POST'>
            <input type="text" id="name" class="span12" name="name" placeholder="name">
            <input type="text" id="username" class="span10" name="username" placeholder="User Name">
            <div  id="validity"></div>
            <input type="password" id="password" class="span10" name="password" placeholder="Password">
            <input type="password" id="password2" class="span10" name="password2" placeholder="Re-Type Password">
            <div id="pass_check"> </div>
            <input type="text" id="age" class="span10" height="500" name="age" min='12' max='100' placeholder="age">
            <input type="text" id="address" class="span10" height="500" name="address" placeholder="address">
            <input type="text" id="email" class="span10" height="500" name="email" placeholder="email">
            <input type="text" id="phone" class="span10" height="500" name="phone" min='8000000000' max='9999999999' placeholder="phone number">  
              <select id="gender" name="gender" class='span10'>
                <option value="none">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others...</option>
              </select>
            <br>
            
            <button type="submit" id='signup' name="submit" class="btn btn-info btn-block" disabled>Register</button>
             
          
          </form>
 </div>
</div>
</div>
<!------------------------------ login area-------------->

<!------------------------------ login area-------------->
<!--name,username,gender,password,address,emails,phones-->
<?php include 'footer.php'?>