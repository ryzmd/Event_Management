<?php include 'header.php' ?>

<?php

if($this->session->userdata('isLoggedIn'))
    {
      redirect(base_url("login"));
    }

?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
  if('none'!=($('select').val()))
    {
      $('#button').removeAttr('disabled');
    }
  $('select').click(function(){
    if('none'==($('select').val()))
    {
      $('#button').prop('disabled', true);
    }
    else
    {
      $('#button').removeAttr('disabled');
    }
  });
});


</script>



		<!-----------------------------nav bar section -------------------------->
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="#">Event Management</a>
    <ul class="nav">
      <li class="active"><a href="login">Home</a></li>
    </ul>

    <a href="#myModal" role="button" class="btn btn-inverse" style="float:right" data-toggle="modal">Login</a>
 
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Login</h3>
      </div>

      <div class="modal-body">
       <div class="row">
          <div class="span4 offset1 well">
            <legend>Please Sign In</legend>
            <form action='<?php echo base_url("login/login_check");?>' method='POST'>
              <select name="usertype" class='span4'>
                <option value="none">Select User Type</option>
                <option value="admin">Admin</option>
                <option value="team">Team</option>
                <option value="others">Participants</option>
            </select>
            <input type="text" id="email" class="span4" name="username" placeholder="User Name">
            <br>
            <input type="password" id="password" class="span4" name="password" placeholder="Password">
            
            <button type="submit" id='button' name="submit" class="btn btn-info btn-block" disabled>Sign in</button>
             
          
          </form>
		      <a href="<?php echo base_url("login/register")?>" style="float:right" color=>register here</a>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    
      </div>
    </div>

  </div><!-- nav bar inner -->
</div>	
<!------------------------------ login area-------------->

<!------------------------------ login area-------------->
<?php
if(isset($error))
{
  ?>
  <div><h6 style='color:red' align="center">Wrong User Name or Password</h6></div>


<?php }
?>

<div class="span12 offset2 hero-unit">
<h1 align=center ><i>Alcheringa</i></h1>
<p align=center>ATLANTIS</p>
<p align=center>
<i >Alcheringa annual cultural festival of IIT Guwahati</i>
</p>
<p align=center>
<a href="<?php echo site_url();?>events/view_events" class="btn btn-primary" align=center style='margin-bottom:15px;margin-top:5px; '>Entersite</a>  
</p>
</div>

<?php include 'footer.php' ?>



