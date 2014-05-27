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
<script type="text/javascript">
  $('document').ready(function(){
    $('#round').hide();
    $('#send').click(function(){
      name=$('#name').val();
      descripition=$('#descripition').val();
      type=$('#type').val();
      starttime=$('#starttime').val();
      loc=$('#location').val();
      duration=$('#duration').val();
      date=$('#date').val();
      team=$('#team').val();
      round=$('#round').val();
      //alert(team);
      if($('#type').val()=='show')
      {
        round=2;
        str='name='+name+'&descripition='+descripition+'&type='+type+'&starttime='+starttime+'&location='+loc+'&duration='+duration+'&date='+date+'&team='+team+'&round='+round;
      }
      else
      {

        str='name='+name+'&descripition='+descripition+'&type='+type+'&starttime='+starttime+'&location='+loc+'&duration='+duration+'&date='+date+'&team='+team+'&round='+round;
      }
      //alert(str);
      if( name != '' && descripition != '' && type != '' && starttime != '' && loc != '' && duration != '' && date != '' && team != '' )
     {   
        $.ajax({
          url:"<?php echo base_url('events/add_events');?>",
          method:'POST',
          data:str,
          success:function(result){
            alert('successfully added');
            window.location='<?php echo base_url("admin/view_add_event");?>';
            //alert(result);
            
          }
        }); 
      }
      else
      {
        alert('Empty inputs are not allowed');
      }
    });
    $('#type').change(function(){
      //alert($('#type').val());
      if($('#type').val()=='comp')
      {
        $('#round').show();
        type=$('#type').val();
      }
      else
      {
        $('#round').hide();
        type=$('#type').val();
      }
    });
  });//ready
</script>


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
           <input type='text' id='name' placeholder="Name" class='span6'>
         </div>
      </div>

      <div class='row-fluid'>
      <div class='span12'> 
           <legend>Description</legend>
           <textarea type='text' id='descripition' placeholder="Description" class='span6'></textarea>
         </div>
      </div>


      <div class='row-fluid'>
       <div class='span12'> 
           <legend>Type</legend>
           <select id='type' placeholder='Event Type' class='span6'>
             <option selected value="show">Show</option>
             <option value='comp'>Competition</option>
           </select>
         </div>
      </div>

      <div class='row-fluid'>
      <div class='span12'> 
           <legend>Start Time</legend>
           <input type='time' id='starttime' placeholder="Start Time" class='span6'>
         </div>
      </div>


      <div class='row-fluid'>
      <div class='span12'> 
           <legend>Duration</legend>
           <input type='text' id='duration' placeholder="Duration" class='span6'>
         </div>
      </div>

      <div class='row-fluid'>
      <div class='span12'> 
           <legend>Location</legend>
           <input type='text' id='location' placeholder="Location" class='span6'>
         </div>
      </div>

      <div class='row-fluid'>
      <div class='span12'> 
           <legend>date</legend>
           <input type='date' id='date' placeholder="date" class='span6'>
         </div>
      </div>

      <div class='row-fluid'>
      <div class='span12'> 
           <legend>Team</legend>
           <input type='text' id='team' placeholder="Team" class='span6'>
         </div>
      </div>

      <div class='row-fluid'>
       <div class='span12'> 
           <legend>Rounds</legend>
           <select id='round' placeholder='Rounds' class='span6'>
             <option selected value= "5" >5</option>
             <option value='4'>4</option>
             <option value='3'>3</option>
             <option value='2'>2</option>
             <option value='1'>1</option>
           </select>
         </div>
      </div>


  

  <div class='row-fluid'>    
    <div class='row-fluid'>
        <div class='span12'> 
          
           <input type='button' class='btn btn-primary span6' id='send' value='Save'>
         </div>
      </div>

    <div class='row-fluid'>
        <div class='span12'> 
          
           
            </div>
         </div>
      </div>


      </div>


  </div>
</div>

<?php include 'footer.php' ?>