<?php include 'header.php' ?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
      <a class="brand" href="">Event Management</a>

      <ul class="nav">
          <li><a href="<?php echo base_url()?>login/index">Home</a></li><?php 

      if($this->session->userdata('usertype')=='team')
        {
        ?>  
<li><a href="<?php echo base_url()?>team/view_team_profile">Profile</a></li>
<?php 
       }
       else
       {
        ?><li ><a href="<?php echo base_url()?>participant/view_profile">Profile</a></li><?php
       }
        ?>  
        <?php 
        if($this->session->userdata('usertype')=='others')
        {
        ?>  
<li><a href="<?php echo base_url()?>participant/event_history">Events History</a></li>
<?php 
       }
        ?>  
          <li class="active"><a >Friends</a></li>
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
 <script type="text/javascript">
              $('document').ready(function(){
                var jaffa='';
                var id;
                var user1="<?php echo $this->session->userdata('username');?>";
                  arr=<?php echo json_encode($data) ?>;
                  console.log(arr);
                  var len_grp=arr['f1'].length;
                  var len_solo=arr['f2'].length;
                  var len_rqst=arr['f3'].length;
                  console.log(len_grp);
                  console.log(len_solo);
                  console.log(len_rqst);
                  for(i=0;i<len_grp;i++)
                  {
                    //$('#progress_grp').append('<p>Name : '+arr['group'][i]['Name']);
                    //$('#progress_grp').append(' Event Name : '+arr['group'][i]['event_name']);
                    $('#friends').append('<li>'+arr['f1'][i]['user1'] + '</li>');

                  }

                  for(i=0;i<len_solo;i++)
                  {
                    //$('#progress_grp').append('<h5><i>Round : '+arr['solo'][i]['round']+' in event : '+arr['group'][i]['event_name']+'</i></h5>');
                    //$('#progress_solo').append('<p>Event Name :</p>'+arr['solo'][i]['event_name']);
                    $('#friends').append('<li>'+arr['f2'][i]['user2'] + '</li>');

                  }
                  for(i=0;i<len_rqst;i++)
                  {
                    //$('#progress_grp').append('<h5><i>Round : '+arr['solo'][i]['round']+' in event : '+arr['group'][i]['event_name']+'</i></h5>');
                    //$('#progress_solo').append('<p>Event Name :</p>'+arr['solo'][i]['event_name']);
                   //$('#requests').append("<li id="+arr['f3'][i]['user1']+">"+arr['f3'][i]['user1']+"</li><button  class='btn btn-primary' type='button'>Add</button>");
                   $('#requests').append("<li class='btn btn-primary span12'id='"+arr['f3'][i]['user1']+"'>"+arr['f3'][i]['user1']+"</li>");
                  }
                  if(len_rqst==0)
                  {
                    $('#requests').html('No friend requests pending')
                  }

                    $('#friends').on('click','li',function(e){
                      e.preventDefault();
                     $('#prev_msg').html('<p>faf</p> \n');
                      
                        id=$(this).text();
                        //alert(id);
                        $.ajax({
                          url:'http://localhost/message_get.php',
                          method:'POST',
                          data:'user2='+id+'&user1='+user1,
                          success:function(res){
                              //alert(res);
                              console.log(res);
                              var x='';
                              for(var i=0; i< res.length ;i++)
                              {
                                  str=res[i]['sent_user']+': '+res[i]['body']+'\n(At '+res[i]['msg_time']+', '+res[i]['msg_date']+')\n';
                                  x=x+str;
                                  $('#prev_msg').html(x);
                                  jaffa=x;

                              }
                              if(res.length==0)
                              {
                                $('#prev_msg').html('No Previous messages');
                              }
                          }
                        });
                    });

                  $('#send').click(function(e){
                      e.preventDefault();
                      var msg=$('#msg').val();
                      $('#msg').val('');
                     // alert(id);
                      //alert("-"+id+"-");
                     // alert(msg);
                     //msg="<?"
                      str='user2='+id+'&msg='+msg+'&user1='+user1;
                      $.ajax({
                          url:'http://localhost/message_put.php',
                          method:'POST',
                          data:str,
                          success:function(res){
                             // alert(res);
                              //console.log(res);
                              jaffa=jaffa+user1+': '+msg+'\n(Sent now)'+'\n';
                              $('#prev_msg').html(jaffa);

                          }
                        });

                    });
                  $('#requests').on("click","li",function(){
                      var user2=$(this).attr('id');
                      //alert('user id is'+user2);
                      $.ajax({
                          url:"<?php echo base_url()?>participant/add_friend",
                           method:'POST',
                          data:'user2='+user2,
                         success:function(result){
                              console.log(result);
                              window.location="http://localhost/events/participant/friends";
                            }
                      });
                    });
              });
       
  

</script>

<div class='container-fluid'>
  <div class='row-fluid'>
    <div class='span2'>
      <div class='well'>
      <h4>Friend Requests:</h4>
      <ul id='requests'>
      </ul>
      <h4>Friends list</h4>
      <h5 id='friends'></h5>

      </div>
    </div>


    <div class='span10'>
      <div class='well'>
        <div class='row-fluid'>
          <div>
          <h6 align="center">Previous Conversation</h6>
          </div>
          <div>
            <textarea rows="20" readonly id='prev_msg' cols="100" style='resize:none;' class='span6 offset3' ></textarea>
          </div>
        </div>
        <div class='row-fluid'>
          <textarea rows="10" id='msg'cols="100" style='resize:none;' class='span6 offset3' placeholder='Type message'></textarea>
        </div>
        <div class='row-fluid'>
          <button class='span6 offset3 btn btn-primary' id='send'>send</button>
        </div>
      </div>
    </div>
  </div>
</div>
   