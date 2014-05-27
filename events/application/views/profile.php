<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
      <a class="brand" href="#">Event Management</a>

      <ul class="nav">
          <li><a href="<?php echo base_url()?>login/index">Home</a></li>
          <li class="active"><a href="#">Profile</a></li>
          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
          <?php if($this->session->userdata('usertype')!='others')
        {
        ?>  
        <li><a href="<?php echo base_url()?>update/post_post">Post Updates</a></li>
<?php 
       }
        ?>
          
          
      </ul>
      <a href="http://localhost/events/login/logout" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Logout</a>
      <p style='font-size:18px;color:white;float:right;padding-top:9px;padding-right:10px'>Logged in as : <?php echo $this->session->userdata('username');?></p>
      
     </div>
<div class="span10">
<div class="well">
    <h1 id="name">
    Name : <?php echo $data[0]["Name"]?>
    </h1>
    <h4 id="username">
      Username: <?php echo $data[0]["username"]?>
    </h4>
    <h4>Age: <?php echo $data[0]["Age"]?></h4>
    <h4>Gender: <?php if($data[0]["Gender"]==1)
                      {
                        echo "Male";
                      }
                      if($data[0]["Gender"]==2)
                      {
                        echo "Female";
                      }
                        ?></h4>
     <h4>Address: <?php echo $data[0]["Address"]?></h4>
     <h4>Email: <?php echo $data[0]["Email"]?></h4>
    
</div>
</div>

</div>