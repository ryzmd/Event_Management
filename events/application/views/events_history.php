<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>

<div class="navbar navbar-inverse">
  <div class="navbar-inner">
      <a class="brand" href="#">Event Management</a>

      <ul class="nav">
          <li><a href="<?php echo base_url()?>login/index">Home</a></li>
          <li ><a href="<?php echo base_url()?>participant/view_profile">Profile</a></li>
          <li class="active"><a href="<?php echo base_url()?>participant/event_history">Events History</a></li>
          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
          <li><a href="<?php echo base_url()?>participant/event_view">View Events</a></li>
          <li><a href="<?php echo base_url()?>update/post_view">View Updates</a></li>
          
          
      </ul>
      <a href="http://localhost/events/login/logout" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Logout</a>
      <p style='font-size:18px;color:white;float:right;padding-top:9px;padding-right:10px'>Logged in as : <?php echo $this->session->userdata('username');?></p>
      
     </div>
<div class="span10">
<div class="well">
<script type="text/javascript">
    $('document').ready(function(){
    arr=<?php echo json_encode($data) ?>;
    console.log(arr);
    var len_grp=arr['group'].length;
    var len_solo=arr['solo'].length;
    console.log(len_grp);
    console.log(len_solo);
    for(i=0;i<len_grp;i++)
    {
      //$('#progress_grp').append('<p>Name : '+arr['group'][i]['Name']);
      //$('#progress_grp').append(' Event Name : '+arr['group'][i]['event_name']);
      $('#progress_grp').append('<h5><i>Round : '+arr['group'][i]['round']+' in event : '+arr['group'][i]['event_name']+' with group :'+arr['group'][i]['Name']+'</i></h5>');

    }

    for(i=0;i<len_solo;i++)
    {
      //$('#progress_grp').append('<h5><i>Round : '+arr['solo'][i]['round']+' in event : '+arr['group'][i]['event_name']+'</i></h5>');
      //$('#progress_solo').append('<p>Event Name :</p>'+arr['solo'][i]['event_name']);
      //$('#progress_solo').append('<p>Round :'+arr['solo'][i]['round'] + ' in Event : '+arr['solo'][i]['event_name']+'</p>');

    }
    });
  
</script>
    <h1 id="solo">
    </h1>
    <h4 id="progress_solo">
    </h4>
    <h1 id="group">
    Events:
    </h1>
    <h4 id="progress_grp">
    </h4>
    
</div>
</div>

</div>