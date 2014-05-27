<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
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
    var id=$(this).attr('id');
    //alert(id);
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
    //alert(text);
      });
});//ready


</script>


<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="#">Event Management</a>
    <ul class="nav">
      <li><a href="<?php echo base_url()?>login/index">Home</a></li>
    </ul>

    <a href="#myModal" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Login</a>
 
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Login</h3>
      </div>

      <div class="modal-body">
       <div class="row">
          <div class="span4 offset1 well">
            <legend>Please Sign In</legend>
            <form action='<?php echo base_url();?>login/login_check' method='POST'>
              <select name="usertype" class='span4'>
                <option value="none">Select User Type</option>
                <option value="admin">Admin</option>
                <option value="team">Team</option>
                <option value="others">Participants</option>
            </select>
            <input type="text" id="email" class="span4" name="username" placeholder="User Name">
            <br>
            <input type="password" id="password" class="span4" name="password" placeholder="Password">
            
            <button type="submit" id='button' name="submit" class="btn btn-info btn-block" disabled>Sign in</button>

          
          </form>
		
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    
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
</div>
</div>    
</div>
</div>


<?php include 'footer.php' ?>