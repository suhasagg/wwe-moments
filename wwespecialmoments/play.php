<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Play</title>
<link href="css/play.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/image.js"></script>
<script type="text/javascript" src="js/play.js"></script>
<script src="js/countdown.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php
session_start();
$imgurl=$_GET['url'];
?>
	<div id="content">
	<?php include 'header.php';?>
		<div id="main">
		<a id="a_logout" href="#" style="float:right;">logout</a>
			<div id="game">
				<div id="gameleft">
					<div id="time">
						<h1>Time</h1>
						<div id="counter_2"></div>
						<div class="desc"></div>
					</div>
					<div id="score">
						<h1>Achievement Points</h1>
						<h2 id="scorenum">0</h2>
					</div>
					<div id="passes">
						<h1>Media Units Passed</h1>
						<h2 id="passnum">0</h2>
					</div>
					<div id="offlimit">
						<h1>Emotion Scale Saturation Level</h1>
					</div>
					<div id="mylabels">
						<h1>Emo-Tags</h1>
						<div id="labelstr"></div>
					</div>
				</div>
				<div id="gamecenter">
					<div id="input">
						<input id="labelbox" type="text" />
						<input id="label" class="button" type="button" value="EmoTag" />
						<input id="pass" class="button1" type="button" value="Pass/Don't Know" />
					</div>
					<div id="notify">
					</div>
		            <div id="image">
						<img id="gameimg" height="250" width="250" src="<?php echo $imgurl;?>" />
					</div>

				</div>
			</div>
		</div>
		<div id="footer"></div>
	</div>
</body>
</html>
