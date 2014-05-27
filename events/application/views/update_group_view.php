<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jqu
ery.min.js">
</script>
<?php $username=$this->session->userdata('username');?>
<script>
$(document).ready(function(){
	$('#details').on("click","button",function(){
    var new_id=$(this).attr('id');
    var arr=new_id.split("_");
    var pre_id=arr[0];
    var group_id=arr[1];
    var event_id=arr[2];
    var round=arr[3];
    var rounds=arr[4];
    rounds=parseInt(rounds);
    round=parseInt(round)+1;
    //alert(pre_id+"jj"+group_id+"kk"+event_id);
    if(round==''){
      alert('no input given for group '+group_id );
    }
    else{
      if(pre_id='new'){
        $.ajax({
          url:"<?php echo base_url()?>team/update_group_round",
          method:'POST',
          data:'group_id='+group_id+'&round='+round+'&event_id='+event_id,
            success:function(result){
              if(result=='done'){
                alert(result);

                window.location="<?php echo base_url()?>team/view_events_team";

               
              }
              else{
                alert("not - "+result);
              }
            }
        });          
      }
    }
 //   alert(id[3]);
  });
  //
  var username=<?php echo json_encode($username)?>;
  var teamslist;
  $.ajax({
      url:"<?php echo base_url()?>team/get_team_name",
      method:'POST',
      data:'username='+username,
      success:function(result){
        teamslist=result;
      }
    });
	$('button').click(function(){
    var id=$(this).attr('id');
    console.log(teamslist);
    $("#details").html("");
    
		$.ajax({
			url:"<?php echo base_url()?>team/event_members",
			method:'POST',
			data:'event_id='+id,
			success:function(arr){
          $('#details').html("");
        	 for(var i=0;i<arr.length;i++)
    				{
    				  if(arr[i]['event_id']==id)
    				  {
    				    events_id=arr[i]['event_id'];
        				group_name=arr[i]['Name'];
                group_id=arr[i]['group_id'];
                rounds=arr[i]['rounds'];
        				round=arr[i]['round'];
                  if(rounds==round)
                  {
                    $('#details').append("<div class='well'><div class='span12 row-fluid'><div class='span3' ><p>Group : "+group_name+"</p></div><div class='span3'><i id='text_"+group_id+"'></i></div><div class='span3'><p>This Group Has Won</p></div></div></div>");
                  }
                  else
                  {
      				  	$('#details').append("<div class='well'><div class='span12 row-fluid'><div class='span3' ><p>Group : "+group_name+"</p></div><div class='span3'><i id='text_"+group_id+"'>Present round is :"+round+"</i></div><div class='span3'><button id='new_"+group_id+"_"+events_id+"_"+round+"_"+rounds+"' class='btn btn-primary' type='button'>Promote to Next Round</button></div></div></div>");
                  }
      				  }
      				  else{
      				  	$('#details').append('<p>ajcabakj:'+i+'</p>');
      				  }

    				}
        		    
      }	
		});
	});
});	
</script>
<div class="navbar navbar-inverse">
	<div class="navbar-inner">
    	<a class="brand" href="#">Event Management</a>

   		<ul class="nav">
      		<li class="active"><a href="<?php echo base_url()?>main/home_team">Home</a></li>
          <li ><a href="<?php echo base_url()?>team/view_team_profile">Profile</a></li>
          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
           <li><a href="<?php echo base_url()?>update/post_post">Post Updates</a></li>
          <li><a href="<?php echo base_url()?>update/post_view">View Updates</a></li>
    	</ul>
    	<a href="http://localhost/events/login/logout" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Logout</a>
    	<p style='font-size:18px;color:white;float:right;padding-top:9px;padding-right:10px'>Logged in as : <?php echo $username;?></p>
    	
  	 </div>
</div>
<!--nav bar area-->
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
  <div class='span10' id='details'>
      
  <!--<div class='well'>
  <div class='span12 row-fluid'>
    <div class='span3' >
    <p>Group id is:"+group_id+"</p>
     </div>
      <div class='span3'>
       <i>present round is :"+round+"</i>
      </div>
     <div class='span3'>
      <input type='text' placeholder='jaffa'>
    </div>
    <div class='span3'>
     <button id='"+group_id+"' style='float:center' class='btn btn-primary' type='button2'>
      submit
     </button>
    </div>
    </div>
   </div>

  		-->
  </div>
</div>
</div>






<?php include 'footer.php' ?>