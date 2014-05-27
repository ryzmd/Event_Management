<?php include 'header.php' ?>
<?php $event_id=$_GET['event_id'];?>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
	var event_id=<?php echo $event_id ?>;
	//alert(event_id);
	var grp_check;
	var count=0;
	$('#add').click(function(){
		if(count==0)
		{
			$('#members').append('<p>Your name will be added by default</p>');
		}

		$('#members').append('<div class="span12"><div><lable for="m_'+count+'">member'+(count+1)+'</lable><input type="text" class="span4 mem" id="m_'+count+'"></div><p class="stat" id="s_'+count+'">not available</p></div>');
		count++;
	});
	$('#submit').click(function(){

	});;

	$('#group').keyup(function(){
		var group=$('#group').val();
		$.ajax({
			url:'<?php echo base_url("registration/check_groupname")?>',
			method:'POST',
			data:'name='+group,
			success:function(result){
				if(result)
				{

						 $('#add').removeAttr('disabled');
						 $('#check').html('available');
						 
				}
				else
				{
						$('#add').prop('disabled', true);
						$('#check').html('Not available');
						
				}

			}

		});
	});

	$('#members').on('keyup','.mem',function(){
		var curname=$(this).val();
		var curid=$(this).attr('id');
		var a_split=curid.split('_');

		a_split[0]='s';
		var fin_stat='s_'+a_split[1];
		//alert(fin_stat);
		$.ajax({
			//*********************** to check members
			url:'<?php echo base_url("registration/check_user")?>',
			method:'POST',
			data:'username='+curname+'&event_id='+event_id,
			success:function(result){
				//alert(result)
				if(result)
				{
					$('#'+fin_stat).html('<p>available</p>');
				}
				else
				{
					$('#'+fin_stat).html('<p>Not available</p>');
				}
				
			}
		});

	});

	$('#submit').click(function(){

		var check_grp=$('#check').text();
			//alert(check_grp);
			if(check_grp!='available')
			{
				alert('Group not available');
				return 0;
			}
			$('.stat').each(function(){
				check_mem=$(this).text();
				//alert(check_mem);
				if(check_mem != 'available')
				{
					alert('one the group name is not available');
					return 0;
				}
			});
			var group_name=$('#group').val();
			var str='';
			$('.mem').each(function(){
				str=str+'#'+$(this).val();
			}); 
			//alert(str);
			$.ajax({
				url:'<?php echo base_url("registration/submit") ?>',
				method:'POST',
				data:'event_id='+event_id+'&members='+str+'&group_name='+group_name,
				success:function(result){
					//alert(result);
					alert('registered');
					window.location="<?php echo base_url('participant/view_events') ?>";

				}

			});
	});
});
</script>

<div class='container-fluid well'>
	<div class='row-fluid' >
		<div class='span12'>
			<div>
			<legend>Name</legend>
			</div>
			<input type='text' id='group' placeholder='Group name'  class='span4 offset4' >
			<p id='check'></p>
		</div>
	</div>
	<div id='members' class='row-fluid'></div>
	<div class='row-fluid'>
		<div class='span12'>
			<input type='button' id='add' class='btn btn-primary offset4 span4' value='Click Add Group members' disabled>
		</div>
	</div>

	



	<div class='row-fluid'>
		<div class='span12'>
			<input type='button' id='submit' class='btn btn-primary offset4 span4' value='submit' >
		</div>
	</div>
</div>


<?php include 'footer.php' ?>