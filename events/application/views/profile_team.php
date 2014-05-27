<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<?php $username=$this->session->userdata('username');?>
<script type="text/javascript">
  $('document').ready(function(){
    var username=<?php echo json_encode($username)?>;
    //alert(username);
    $.ajax({
      url:"<?php echo base_url()?>team/get_team_name",
      method:'POST',
      data:'username='+username,
      success:function(result){

        //username=result+'/'+username;
       // alert(result[0]['team']);
        console.log(result);
        //$('#usersname').html('Logged in as:'+username);
        //alert('lengthis:'+result.length);
        for(var i=0;i<result.length;i++){
          t=result[i]['team'];
          $('#teams').append(t+',');
        }
      }
    });
    
  });
</script>
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
      <a class="brand" href="#">Event Management</a>

      <ul class="nav">
          <li><a href="<?php echo base_url()?>main/home_team">Home</a></li>
          <li class="active"><a href="<?php echo base_url()?>team/view_team_profile">Profile</a></li>
          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
           <li><a href="<?php echo base_url()?>update/post_post">Post Updates</a></li>
          <li><a href="<?php echo base_url()?>update/post_view">View Updates</a></li>
           <li><a href="<?php echo base_url()?>main/search_team">Search</a></li>
          
          
      </ul>
      <a href="http://localhost/events/login/logout" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Logout</a>
      <p style='font-size:18px;color:white;float:right;padding-top:9px;padding-right:10px'>Logged in as :<?php echo $username?> </p>
      
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
     <h4 id='teams'>Teams:<h4>
    
</div>
</div>

</div>