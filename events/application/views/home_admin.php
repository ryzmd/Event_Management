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
    	<p style='font-size:18px;color:white;float:right;padding-top:9px;padding-right:10px'>Logged in as : <?php echo $this->session->userdata('usertype');?></p>
    	
  	 </div>
</div>
<!--nav bar area-->
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

      <?php echo $this->session->userdata('isLoggedIn');?>
		  </div>
	</div>
</div>
<?php include 'footer.php' ?>