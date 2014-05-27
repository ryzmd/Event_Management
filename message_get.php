<?php
$sent_user=$_POST['user1'];
$recv_user=$_POST['user2'];

//$t=time();
//$d=date("Y-m-d",$t);
//$t2=date("H:i:s",$t);
//echo $user1.$user2;
$con=mysql_connect('localhost','root','smile');
if($con)
{
	//echo 'conn';
	//echo $user1.$user2.$body;
	mysql_select_db('events');
	//$query="INSERT INTO `message`( `sent_user`, `recv_user`, `body`,   `msg_date`, `msg_time`) VALUES ('$user1','$user2','$body','$d','$t2');";
	//$query="insert into message('sent_user','recv_user','body','msg_date','msg_time') values ('$user1','$user2','$body','$d','$t2');";
	//if(mysql_query($query))
	//{
		//echo 1;
	//}
	$query="select * from message where((sent_user = '$sent_user' AND recv_user = '$recv_user' AND del_from = 0) OR 
	(sent_user = '$recv_user' AND recv_user = '$sent_user' AND del_to = 0)) order by (msg_id) asc;";

if($results=mysql_query($query))
{
	$data=array();
	while($row=mysql_fetch_array($results))
	{
		//push_array(array('id'=>$row['msg_id'],'sent'=$row['sent_user'],'recv'=>$row['recv_user'],'body'=>$row['body']));
		$data[]=$row;
	}
	header('Content-Type: application/json');
	echo json_encode($data);
}
}
?>