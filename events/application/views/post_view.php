<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<div class="navbar navbar-inverse">
	<div class="navbar-inner">
    	<a class="brand" href="#">Event Management</a>

   		<ul class="nav">
      		<li ><a href="<?php echo base_url()?>login/index">Home</a></li>
          <li ><a href="<?php echo base_url()?>participant/view_profile">Profile</a></li>
          <?php 

        if($this->session->userdata('usertype')=='others')
        {
        ?>  
<li><a href="<?php echo base_url()?>participant/event_history">Events History</a></li>
<?php 
       }  
        ?>
          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
          <?php if($this->session->userdata('usertype')=='others')
        {
        ?>  
<li><a href="<?php echo base_url()?>participant/event_view">View Events</a></li>
<?php 
       }  
        ?>
          <?php if($this->session->userdata('usertype')!='others')
        {
        ?>  
        <li><a href="<?php echo base_url()?>update/post_post">Post Updates</a></li>
<?php 
       }
        ?>
          <li class="active"><a href="<?php echo base_url()?>update/post_view">View Updates</a></li>
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
    $.ajax({
        url:'<?php echo base_url("update/get_post")?>',
        method:'POST',
        data:'post=fjasflasfjl',
        success:function(ret){
          //alert(ret);
            if(ret)
            { 
              //console.log(ret);
              for(var i=0;i<ret.length;i++)
              {
                $('#main').append("<div class='well'>"+"<h6><i>"+ret[i]['post']+"</b></h6>"+"<p><b>"+"By: "+ret[i]['username']+" At: "+ret[i]['post_time']+", on: "+ret[i]['post_date']+".</b></p>"+"</div>");
              }
            }
        }
      });
  });
</script>

<div class='container' id='main'>

</div>

