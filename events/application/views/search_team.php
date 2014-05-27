<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<div class="navbar navbar-inverse">
	<div class="navbar-inner">
    	<a class="brand" href="#">Event Management</a>

   		<ul class="nav">
      		 <li ><a href="<?php echo base_url()?>main/home_team">Home</a></li>
          <li ><a href="<?php echo base_url()?>team/view_team_profile">Profile</a></li>

          <li><a href="<?php echo base_url()?>participant/friends">Friends</a></li>
           <li><a href="<?php echo base_url()?>update/post_post">Post Updates</a></li>
          <li><a href="<?php echo base_url()?>update/post_view">View Updates</a></li>
          <?php if($this->session->userdata('usertype')!='others')
        {
        ?>  
         <li class="active"><a href="<?php echo base_url()?>main/search_team">Search</a></li>
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
    current_user='<?php echo $this->session->userdata("username");?>';
    //alert(current_user);
    var type='';
    var id='';
    //alert('fafa');
    type=$('#select_type').val();
    $('#select_type').change(function(e){
      e.preventDefault();
      type=$('#select_type').val();
     // alert(type);
    });
   // alert(type);
    
    $('#text').keyup(function(e){
      e.preventDefault();
      var text=$('#text').val();
      //alert(text);
      $('#res').html('');
      if(text=='')
      {
          $('#res').html('');
      }
      else
      {
          $.ajax({
          url:"<?php echo base_url('participant/search_results')?>",
          method:'POST',
          data:'table='+type+'&search_option='+text,
          success:function(result){
            console.log(result);
            if(type=='user')
            {
              len=result['data'].length;
              for(var i=0;i < len ;i++)
              {
                console.log(result["data"][i]['username']);
                $('#res').append('<li id='+result["data"][i]['username']+'>'+result["data"][i]['username']+'</li>');
              }
            }
            else
            {
              len=result['data'].length;
              for(var i=0;i < len ;i++)
              {
                console.log(result["data"][i]['event_name']);
                $('#res').append('<li id='+result["data"][i]['event_id']+'>'+result["data"][i]['event_name']+'</li>');
              }

            }
          }
        });
      }
    });

    $('#res').on('click','li',function(e){
      e.preventDefault();
      id=$(this).attr('id');
      //alert(id);
      if(type=='event')
      {
          $.ajax({
            url:'<?php echo base_url("participant/ajax_search_events") ?>',
            method:'POST',
            data:'event='+id,
            success:function(arr){
                $('#name').html('');
                $("#desc").html("");
                $("#time").html("");
                $("#duration").html("");
                $("#loc").html("");
                $("#type_def").html("");


                $('#name_user').html("");
                $('#username').html("");
                $('#age').html("");
                $('#address').html("");
                $('#gender').html("");
                $('#email').html("");
                $('#phone').html("");
                $('#address').html("");
                $('#request').html('');
                console.log(arr);
                name=arr[0]['event_name'];
                desc=arr[0]['event_disc'];
                time=arr[0]['start_time'];
                duration=arr[0]['duration'];
                loc=arr[0]['location'];
                type_def=arr[0]['type_id'];
                
                $('#name').html(name);
                $("#desc").html("About the event<br>"+desc);
                $("#time").html("starts at:"+time);
                $("#duration").html("Duration is :"+duration);
                $("#loc").html("where?? :"+"<br>"+loc);
                $("#type_def").html("type<br>"+type_def);
            }
          });
      }
      else
      {
          $('#name').html('');
                $("#desc").html("");
                $("#time").html("");
                $("#duration").html("");
                $("#loc").html("");
                $("#type_def").html("");

          $.ajax({

            url:'<?php echo base_url("participant/ajax_search_users") ?>',
            method:'POST',
            data:'user='+id,
            success:function(arr){
                $("#address").html("");
                console.log(arr);
                address=arr[0]['Address'];
                age=arr[0]['Age'];
                email=arr[0]['Email'];
                gender=arr[0]['Gender'];
                name_user=arr[0]['Name'];
                phone=arr[0]['phone'];
                username=arr[0]['username'];

                $('#name_user').html("<b>Name</b> :<i>"+name_user+"</i>");
                $('#username').html("<b>User name</b> :<i>"+username+"</i>");
                $('#age').html("<b>Age</b> :<i>"+age+"</i>");
                $('#address').html("<b>Address</b> :<i>"+address+"</i>");
                $('#gender').html("<b>Gender</b> :<i>"+gender+"</i>");
                $('#email').html("<b>Email</b> :<i>"+email+"</i>");
                $('#phone').html("<b>Phone no.</b> :<i>"+phone+"</i>");
                $('#address').html("<b>Address</b> :<i>"+address+"</i>");

                
                
            }
          });
          
          $.ajax({

            url:'<?php echo base_url("participant/check_already_friends") ?>',
            method:'POST',
            data:'user2='+id+'&user1='+current_user,
            success:function(ret){
              console.log(ret);
              if(ret=='1')
              {
                $('#request').html("<h6>You already sent request</h6>");
              }
              if(ret=='2')
              {
                $('#request').html("<h6>You already recieved a request from:</h6>" +id);
              }
              if(ret=='3')
              {
                if(id==current_user)
                {
                  $('#request').html();
                }
                else
                {
                  $('#request').html("<button class='req'>Add Friend</button>");
                }
                
              }
              if(ret=='4')
              {
                
              
                  $('#request').html("<h6>You are already connected with:"+id+"</h6>" );
                
              }
              //var status=ret[0]['status'];
              //alert(status)

              //alert(ret);
            }
          });
      }
      //alert(id);
    });

  $('#request').on('click','button',function(e){
    e.preventDefault();
    //alert(id);
    $.ajax({
      url:"<?php echo base_url('participant/friend_request')?>",
      method:'POST',
      data:'user2='+id,
      success:function(t)
      {
        $('#request').html('Request sent');
      }
    });
    
  });

  });
</script>
<!--nav bar area-->
<div class='container-fluid'>
    <div class='row-fluid'>
      <div class='span2'>
        <div>
          <!---->
          <select id='select_type' class='span12'>
            <option value='user'selected>User</option>
            <option value='event'>Events</option>
          </select>
          </div>

          <div >
            <input class='span12' type='text' id='text'>
          </div>

          <div>
            <div style='color:white;height:500px' class='span12 well '>
             <ul id='res' style='color:black' class='list'>
             </ul>
    
            </div>
          </div>


<!----> 
        </div>
  




      <div class='span10'>

          <div class="well">
    <h1 id="name">
    Search and Click on the results to get details
    </h1>
    <h4 id="desc">
    </h4>
    <h4></h4>
    <h4 id="time">
      <br>
    </h4>
    <h4 id="duration"></h4>
    <h4 id="loc"> 
    </h4>
    <h4 id="type_def"></h4>

    <h4 id='name_user'></h4>
    <h4 id='username'></h4>
    <h4 id='gender'></h4>
    <h4 id='age'></h4>
    <h4 id='email'></h4>
    <h4 id='phone'></h4>
    <h4 id='address'></h4>
    <div id='request'></div>


</div>


      </div>
    </div>
</div>
<?php include 'footer.php' ?>