<?php
			@set_magic_quotes_runtime(0);
			$conn = mysql_connect("localhost","wwespecials_a","anaconda123");
			if (!$conn)
			{
				die("Connection to data failed:".mysql_error());
			}
			session_start();
			$username = $_POST['userid'];
		    $password = $_POST['passwd'];
		    if($username == "" || $password == ""){
		    	echo json_encode(array('succ'=>false,'msg'=>"User name and password can't be empty!"));
		    }
		    if(@get_magic_quotes_gpc()==0){
		    	$username=addslashes($username);
		    	$password=addslashes($password);
		    }
		    $username = str_replace("_","\_",$username);//ת�����_��
		    $username = str_replace("%","\%",$username);//ת�����%��
		    $password = str_replace("_","\_",$password);//ת�����_��
			$password = str_replace("%","\%",$password);//ת�����%��
		    $query = "insert into player values('$username','$password',DEFAULT,DEFAULT,DEFAULT);";
		    mysql_select_db("wwespecials");
		    $result = mysql_query($query);
		    if (!$result)
		    {
		    	echo json_encode(array('succ'=>false,'msg'=>"User name already exists!"));
		    }
		    else
		    {
		    	$_SESSION['USERNAME'] = $username;
		    	echo json_encode(array('succ'=>true,'userid'=>$username));
		    }
?>
