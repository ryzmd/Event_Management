<?php include 'header.php' ?>
 <?php if($this->session->userdata('usertype')!='admin')
      {
        if($this->session->userdata('usertype')=='team')
        {
          header('location:'.base_url('main/home_team'));
        }
        if($this->session->userdata('usertype')=='others')
        {
          header('location:'.base_url('main/home'));
        }

      }
 ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>

</script>
<script type="text/javascript">
$(document).ready(function(){
  //alert('jaffa');
  var username='';
    $('#send').click(function(){
      var name=$('#name').val();
      username=$('#username').val();
      var team_name=$('#team_name').val();
      var phone=$('#phone').val();
      var details=$('#details').val();
      //alert(name);
    //alert('fafa');
    if(isNaN(phone))
    {
      alert('Invalid phone no.');
      return 0;
    }
    
    if(name!='' && username !='' && team_name != '' && phone != '' && details != '')
    {
      $.ajax({
        url:'<?php echo base_url("admin/add_team") ?>',
        method:'POST',
        data:'name='+name+'&username='+username+'&team_name='+team_name+'&phone='+phone+'&details='+details,
        success:function(result){
          //alert(result);
          $('#added_status').html("<h3 style='color:green'>Successfully Added..</h3>");
          alert('successfully added');
            window.location='<?php echo base_url("admin/view_add_team");?>';
        }

      });
    }
    else
    {
      alert('empty fields not allowed');
    }
  });//send


  $('#username').keyup(function(){
    
       username=$('#username').val();
       //alert(username);
       $.ajax({
      url:'<?php echo base_url("admin/check_team_available") ?>',
      method:'POST',
      data:'username='+username,
      success:function(result){
        //alert(result);
        if(result)
        {
            $('#check').html("<p style='color:green'>Avaliable</p>");
        }
        else
        {
            $('#check').html("<p style='color:red'> Not Avaliable</p>");
        }
      }

    });
  }); 
});//ready
 
</script>
<div class="navbar navbar-inverse">
	<div class="navbar-inner">
    	<a class="brand" href="#">Event Management</a>

   		<ul class="nav">
      		<li class="active"><a href="<?php echo base_url()?>main/home_admin">Home</a></li>
          <li ><a href="<?php echo base_url()?>participant/view_profile">Profile</a></li>
          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
           <li><a href="<?php echo base_url()?>update/post_post">Post Updates</a></li>
          <li><a href="<?php echo base_url()?>update/post_view">View Updates</a></li>
           <li><a href="<?php echo base_url()?>main/search_team">Search</a></li>
    	</ul>
    	<a href="http://localhost/events/login/logout" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Logout</a>
    	<p style='font-size:18px;color:white;float:right;padding-top:9px;padding-right:10px'>Logged in as : <?php echo $this->session->userdata('username');?></p>
    	
  	 </div>
</div>





<div class='container-fluid'>
  <div class='row-fluid'>
    <div class='span2' style="background-color:skyblue;">
    <h4 align='center'>MENU</h4>
    <div>
      <a href="<?php echo site_url();?>admin/view_add_team" class=" span12 btn btn-primary" style='margin-bottom:15px;margin-top:5px; '>Add Team Member</a>
    </div>
    <div>
      <a href="<?php echo site_url();?>admin/view_add_event" class="span12 btn btn-primary" style='margin-bottom:15px; '>Add Event</a>
    </div>
    
      
    </div>
      <div class='span10' style="background-color:lightgrey;margin-left:15px">
      <div class='row-fluid'>

        <div class='span12'> 
           <legend>Name</legend>
           <input type='text' id='name' placeholder="Name" class='span6' >
         </div>
      </div>


       <div class='row-fluid'>
        <div class='span12'> 
          <legend>Username</legend>
          <div class='row-fluid'>
            <div class='span6'>
              <input type='text' id='username' placeholder="User Name" class='span12' >
              </div>
               <div class='span6' id='check'><p>Avaliability</p></div>
           </div>
         </div>
      </div>

      

       <div class='row-fluid'>

        <div class='span12'> 
           <legend>Team</legend>
           <input type='text' id='team_name' placeholder="Team Name" class='span6'>
         </div>
      </div>

       <div class='row-fluid'>

        <div class='span12'> 
           <legend>Details</legend>
           <textarea class='span6' id='details' placeholder="Details" style="min-height:100px;height:100%;" > </textarea>
         </div>
      </div>

      

      <div class='row-fluid'>

        <div class='span12'> 
           <legend>Phone Number</legend>
           <input type='text' id='phone' placeholder="Phone Number" class='span6' >
         </div>
      </div>

       <div class='row-fluid'>
        <div class='span12'> 
          
           <input type='button' class='btn btn-primary span6' id='send' value='Save'>
         </div>
      </div>


<div id='added_status'><h3>ADD STATUS</h3>
</div>
      
      
    </div>
  </div>
</div>

<?php include 'footer.php' ?>