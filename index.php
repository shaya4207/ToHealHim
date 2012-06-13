<?php
	$link = mysql_connect('localhost','root','');
	$db = mysql_select_db('tohealhim',$link);
//	$link = mysql_connect('thejobshadchan.db.5764518.hostedresource.com','thejobshadchan','Sk9721486');
//	$db = mysql_select_db('thejobshadchan',$link);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html dir="rtl" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Untitled Document</title>
		<style>
			.chapters{
				font-family: David, Arial Unicode MS;
				font-size: 23px;
				width: 700px;
				text-align: justify;
				margin: 0 auto;
			}
			.chapter_num{
				font-size: 26px;
				font-weight: 700;
			}
			.posuk_num{
				font-size: 16px;
			}
		</style>
	</head>
	<body>
		<div style="position:fixed;top:20px;right: 20px">
			<select onchange="window.location = './'+this.value">
				<option selected="selected" disabled="disabled"></option>
				<option value="./">הכל - All</option>
				<?php
					$q = mysql_query("SELECT `tehilim_chap_num_heb`,`tehilim_chap_num` FROM `chapters_full` GROUP BY `tehilim_chap_num_heb` ORDER BY `tehilim_chap_num` ASC");
					while($r = mysql_fetch_assoc($q)){
						$h = $r['tehilim_chap_num_heb'];
						$e = $r['tehilim_chap_num'];
						echo "<option value='?c=$e'>$h - $e</option>";
					}
				?>
			</select> | <a href="?n=1">With Nikkud</a> | <a href="?n=0">No Nikkud</a>
		</div>
		<?php
			if(isset($_GET['n'])){
				if($_GET['n'] == 0){
					$n = 'tehilim_text_no_nikkud';
				}elseif($_GET['n'] == 1){
					$n = 'tehilim_text_nikkud';
				}
			}else{
				$n = 'tehilim_text_nikkud';
			}
			if(isset($_GET['c'])){
				$c = $_GET['c'];
				$q = mysql_query("SELECT `tehilim_chap_num_heb` FROM `chapters_full` WHERE `tehilim_chap_num` = $c GROUP BY `tehilim_chap_num_heb` ORDER BY `tehilim_chap_num` ASC");
			}else{
				$q = mysql_query("SELECT `tehilim_chap_num_heb` FROM `chapters_full` GROUP BY `tehilim_chap_num_heb` ORDER BY `tehilim_chap_num` ASC");
			}
			while($r = mysql_fetch_assoc($q)){
				$chap_num = $r['tehilim_chap_num_heb'];
				echo "<div class='chapters'>";
				echo "<span class='chapter_num'>$chap_num<br /></span>";
				$q1 = mysql_query("SELECT `tehilim_posuk_num_heb`,`$n` FROM `chapters_full` WHERE `tehilim_chap_num_heb` = '$chap_num' ORDER BY `tehilim_posuk_num` ASC");
				while($r1 = mysql_fetch_assoc($q1)){
					$p = $r1['tehilim_posuk_num_heb'];
					$t = $r1[$n];
					echo "<span class='posuk_num'>$p</span> $t: ";
				}
				echo "</div><p />";
			}
		?>
	</body>
</html>