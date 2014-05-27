<?php
$user1=$_POST['user1'];
$user2=$_POST['user2'];
$body=$_POST['msg'];
$t=time();
$d=date("Y-m-d",$t);
$t2=date("H:i:s",$t);
$con=mysql_connect('localhost','root','smile');
if($con)
{
	//echo 'conn';
	//echo $user1.$user2.$body;
	mysql_select_db('events');
	$query="INSERT INTO `message`( `sent_user`, `recv_user`, `body`,   `msg_date`, `msg_time`) VALUES ('$user1','$user2','$body','$d','$t2');";
	//$query="insert into message('sent_user','recv_user','body','msg_date','msg_time') values ('$user1','$user2','$body','$d','$t2');";
	if(mysql_query($query))
	{
		echo 1;
	}
}
?>