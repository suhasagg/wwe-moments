<?php
//???????
$cfg_dbhost = 'localhost';
$cfg_dbname = 'wwespecials';
$cfg_dbuser = 'wwespecials_a';
$cfg_dbpwd = 'anaconda123';
$cfg_db_language = 'utf8';

$stat_requestPass = '5';
$stat_agreePass = '6';

function get_parter()
{
	$parter = "SELECT * from player where userid = (select partid from player where userid = '$_SESSION[USERNAME]');";
	$rp = mysql_query($parter);
	if ($row = mysql_fetch_object($rp)){
		return $row;
	}
	return FALSE;
}

function get_self()
{
	$self = "SELECT * from player where userid ='$_SESSION[USERNAME]';";
	$rp = mysql_query($self);
	if ($row = mysql_fetch_object($rp)){
		return $row;
	}
	return FALSE;
}

function get_pic_from_flickr( mysqli $db){
	$keywords = array("face","nature","flowers","expression","celebration","emotion","movie","baby","people","children","god","books");
	$keywordsnum = count($keywords);
	srand();
	$keyword = $keywords[rand(0, $keywordsnum-1)];
	$queryPrepare = "insert into pic(url) values(?)";
	$stmt = $db->prepare($queryPrepare);
	$stmt->bind_param("s",$time);
	$stmt->execute();



      $r = rand(1,8);

      $src = 'bb/'.$r.'.jpg';
      $stmt->bind_param("s",$src);
      $stmt->execute();


        $sql="select @@IDENTITY as id";
	$result = $db->query($sql);
	$picid = $result->fetch_array();
        return array( 'picid' => $picid['id'], 'url'=>$src);
}

function get_pic(  mysqli $link )
{
	srand();
	$r = rand(50,200);
	$result;
	if($r > 49){
		$result = get_pic_from_flickr($link);
	}
	else{
		$tableName='pic';
		$queryString = "SELECT picid, url FROM ".$tableName."
WHERE picid >= (SELECT floor(RAND() * (SELECT MAX(picid) FROM ".$tableName.")))
ORDER BY picid LIMIT 1";

		$tempresult = $link->query($queryString);
		$pic = $tempresult->fetch_array();

                $result = array("url"=> $pic["url"],"picid"=>$pic["picid"]);
	}
	return $result;
}

function get_pic_p()
{
	$tableName='pic';
	$queryString = "SELECT picid, url FROM ".$tableName."
WHERE picid >= (SELECT floor(RAND() * (SELECT MAX(picid) FROM ".$tableName.")))
ORDER BY picid LIMIT 1";

	$result = mysql_query($queryString);
	$pic = mysql_fetch_array($result);
	$result = array("url"=> $pic["url"],"picid"=>$pic["picid"]);
	return $result;
}
?>
