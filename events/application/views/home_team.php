<?php include 'header.php' ?>
<?php if($this->session->userdata('usertype')!='team')
      {
        if($this->session->userdata('usertype')=='admin')
        {
          header('location:'.base_url('main/home_admin'));
        }
        if($this->session->userdata('usertype')=='others')
        {
          header('location:'.base_url('main/home'));
        }

      }
 ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<?php $username=$this->session->userdata('username')?>

<div class="navbar navbar-inverse">
  <div class="navbar-inner">
      <a class="brand" href="#">Event Management</a>

      <ul class="nav">
          <li class="active"><a href="<?php echo base_url()?>main/home_team">Home</a></li>
          <li ><a href="<?php echo base_url()?>team/view_team_profile">Profile</a></li>

          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
           <li><a href="<?php echo base_url()?>update/post_post">Post Updates</a></li>
          <li><a href="<?php echo base_url()?>update/post_view">View Updates</a></li>
           <li><a href="<?php echo base_url()?>main/search_team">Search</a></li>
          
      </ul>
      <a href="http://localhost/events/login/logout" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Logout</a>
      <p id='usersname' style='font-size:18px;color:white;float:right;padding-top:9px;padding-right:10px'>Logged in as : <?php echo $username?></p>
      
     </div>
     <!--nav-bar area-->

     <div class='container-fluid'>
       <div class='row-fluid'>
          <div class='span3'>
                  <a href="<?php echo base_url()?>team/view_events_team" role="button" class="btn btn-inverse">update a team </a>
          </div>
       </div>

     </div>
</div>