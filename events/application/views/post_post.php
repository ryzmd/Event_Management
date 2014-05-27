<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<div class="navbar navbar-inverse">
	<div class="navbar-inner">
    	<a class="brand" href="#">Event Management</a>

   		<ul class="nav">
      		<li><a href="<?php echo base_url()?>login/index">Home</a></li>
          <li ><a href="<?php echo base_url()?>participant/view_profile">Profile</a></li>
          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
          <li class="active"><a href="<?php echo base_url()?>update/post_post">Post Updates</a></li>
          <li><a href="<?php echo base_url()?>update/post_view">View Updates</a></li>
          <?php if($this->session->userdata('usertype')!='others')
        {
        ?>  
         <li><a href="<?php echo base_url()?>main/search_team">Search</a></li>
<?php 
       }
        ?>
    	</ul>
    	<a href="http://localhost/events/login/logout" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Logout</a>
    	<p style='font-size:18px;color:white;float:right;padding-top:9px;padding-right:10px'>Logged in as : <?php echo $this->session->userdata('username');?></p>
    	
  	 </div>
</div>

<script type="text/javascript">
  $('document').ready(function(){
    $('#post').click(function(){
      var text=$('#post_text').val();
      $('#post_text').val('');
      $.ajax({
        url:'<?php echo base_url("update/insert_post")?>',
        method:'POST',
        data:'post='+text,
        success:function(ret){
          //alert(ret);
            if(ret)
            { 
              $('#status').html('<h3 class="span12" align="center" style="color:green">Posted</h3>');
            }
        }
      });

    });

    $('#post_text').click(function(){
      $('#status').html('');
    });
  });
</script>

<div class='container well'>
  <div>
  <h3 align="center" class='span12'>Post Update</h3>
  </div>
  <div>
  <textarea rows="20"  id='post_text' cols="100" style='resize:none;' class='span12' placeholder='write your post here'></textarea>
  </div>
  <div>
  <button class='span12 btn btn-primary' id='post'>Post</button>
  </div>
  <div id='status'>
    
  </div>
</div>