<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
  var  id='';
  arr=<?php echo json_encode($data) ?>;
  if('none'!=($('select').val()))
    {
      $('#button').removeAttr('disabled');
    }
  $('select').click(function(){
    if('none'==($('select').val()))
    {
      $('#button').prop('disabled', true);
    }
    else
    {
      $('#button').removeAttr('disabled');
    }
  });

  $('button').click(function(){
    //alert('class');
    var name='';
    id=$(this).attr('id');
    alert(id);
    for(var i=0;i<arr.length;i++)
    {
      if(arr[i]['event_id']==id)
      {
        name=arr[i]['event_name'];
        desc=arr[i]['event_disc'];
        time=arr[i]['start_time'];
        duration=arr[i]['duration'];
        loc=arr[i]['location'];
        type=arr[i]['type_id'];
      }

    }
    var xyz=name+desc;
    
    $('#name').html(name);
    $("#desc").html("About the event<br>"+desc);
    $("#time").html("starts at:"+time);
    $("#duration").html("Duration is :"+duration);
    $("#loc").html("where?? :"+"<br>"+loc);
    $("#type").html("type<br>"+type);
    $("#register").html('<button  class="span12 btn btn-primary" type="button">Register</button>');
    //alert(text);
      });



$('#register').on("click","button",function(){
     window.location='<?php echo base_url("registration/view_registration")?>'+'?event_id='+id;
});
});//ready


</script>


<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="#">Event Management</a>
    <ul class="nav">
     <li ><a href="<?php echo base_url()?>main/home">Home</a></li>
          <li ><a href="<?php echo base_url()?>participant/view_profile">Profile</a></li>
          <li><a href="<?php echo base_url()?>participant/event_history">Events History</a></li>
          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
          <li class="active"><a href="<?php echo base_url()?>participant/event_view">View Events</a></li>
          <li><a href="<?php echo base_url()?>update/post_view">View Updates</a></li>
    </ul>

<a href="http://localhost/events/login/logout" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Logout</a>
      <p style='font-size:18px;color:white;float:right;padding-top:9px;padding-right:10px'>Logged in as : <?php echo $this->session->userdata('username');?></p>
      
    
      </div>
    </div>

  </div><!-- nav bar inner -->
</div>	
<!------------------------------ login area-------------->

<!------------------------------ login area-------------->
<?php
if(isset($error))
{
  ?>
  <div><h6 style='color:red' align="center">Wrong User Name or Password</h6></div>


<?php }
?>

<div class='container-fluid' >
<div class='row-fluid'>
    <div class='span2' style="background-color:#E8E8E8 ;">
    <h4 align='center'>EVENTS</h4>
    <?php
   

    for($i=0;$i<count($data);$i++)
    {
      $a=$data[$i]["event_name"];
      $id=$data[$i]["event_id"];
    ?>
    <div>    
    <button id="<?php echo $id?>" class="span12 btn btn-primary" type="button"><?php echo $a;?></button>
    <br>
    <br>
    </div><?php
    }
    ?>
    </div>    
  

<div class="span10">
<div class="well">
    <h1 id="name">
    CLICK on an event to know more about it.
    </h1>
    <h4 id="desc">
    </h4>
    <h4></h4>
    <h4 id="time">
      <br>
    </h4>
    <h4 id="duration"></h4>
    <h4 id="loc"> 
    </h4>
    <h4 id="type"></h4>
    <p class = "span2 offset5" id="register"></p><br>
</div>
</div>    
</div>
</div>


<?php include 'footer.php' ?>