<?php
	$link = mysql_connect('localhost','root','');
	$db = mysql_select_db('tohealhim',$link);
	if(isset($_GET['cN'])){
		$cN = $_GET['cN'];
	}else{
		$cN = 0;
	}
	if(isset($_GET['pN'])){
		$pN = $_GET['pN'];
	}else{
		$pN = 0;
	}
	if(isset($_GET['lN']) && isset($_GET['p'])){
		$lN = $_GET['lN'];
		$p = $_GET['p'];
		if($p <= 8){
			$q4 = mysql_query("SELECT `heb_nums_id`,`heb_nums_heb`,`heb_nums_eng` FROM `heb_nums` WHERE `heb_nums_id` > $lN ORDER BY `heb_nums_id` ASC LIMIT 1");
			$r4 = mysql_fetch_assoc($q4);
		}else{
			$lN = $_GET['lN'] + 1;
			$p = 1;
			$q4 = mysql_query("SELECT `heb_nums_id`,`heb_nums_heb`,`heb_nums_eng` FROM `heb_nums` WHERE `heb_nums_id` > $lN ORDER BY `heb_nums_id` ASC LIMIT 1");
			$r4 = mysql_fetch_assoc($q4);
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>פרק <?php echo $cN?> - פסוק <?php echo $pN?></title>
		<script type="text/javascript">
			function checkForm(){
				var nikkud = document.getElementById('nikkud');
				var no_nikkud = document.getElementById('no_nikkud');
				if(nikkud.value == '' || no_nikkud.value == ''){
					return false;
				}
			}
			function nextC(cN){
				var n = Number(cN + 1);
				window.location = './tohealhim.php?cN=' + n + '&pN=1';
			}
		</script>
	</head>
	<body onLoad="document.thhForm.tehilim_text_nikkud.focus();">
		<form action="tohealhim_.php" method="post" name="thhForm" onsubmit="return checkForm()">
			<input type="hidden" name="cN" value="<?php echo $cN?>" />
			<input type="hidden" name="pN" value="<?php echo $pN?>" />
			<?php
				if(isset($lN) && isset($p)){?>
					<input type="hidden" name="lN" value="<?php echo $lN?>" />
					<input type="hidden" name="p" value="<?php echo $p?>" />
			<?php
				}
			?>
			<input type="hidden" name="lN" value="<?php echo $lN?>" />
			<input type="hidden" name="p" value="<?php echo $p?>" />
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td align="left">Chapter Number:&nbsp;</td><td align="left"><select name="tehilim_chap_num">
						<?php
							for($i=1;$i<=150;$i++){
								if($cN == $i){
									echo "<option value='$i' selected='selected'>$i</option>";
								}elseif($cN != $i){
									echo "<option value='$i'>$i</option>";
								}
							}
						?>
					</select></td>
				</tr>
				<tr>
					<td align="left">Chapter Hebrew Number:&nbsp;</td><td align="left"><select name="tehilim_chap_num_heb">
						<?php
							$q = mysql_query("SELECT `heb_nums_heb`,`heb_nums_eng` FROM `heb_nums` LIMIT 0,150");
							while($r = mysql_fetch_assoc($q)){
								$n = $r['heb_nums_heb'];
								$nE = $r['heb_nums_eng'];
								if($cN == $nE){
									echo "<option value='$n' selected='selected'>$n</option>";
								}elseif($cN != $nE){
									echo "<option value='$n'>$n</option>";
								}
							}
						?>
					</select></td>
				</tr>
				<tr>
					<td align="left">Posuk Number:&nbsp;</td><td align="left"><select name="tehilim_posuk_num">
						<?php
							for($i=1;$i<=176;$i++){
								if($pN == $i){
									echo "<option value='$i' selected='selected'>$i</option>";
								}elseif($pN != $i){
									echo "<option value='$i'>$i</option>";
								}
							}
						?>
					</select></td>
				</tr>
				<tr>
					<td align="left">Posuk Hebrew Number:&nbsp;</td><td align="left"><select name="tehilim_posuk_num_heb">
						<?php
							$q = mysql_query("SELECT `heb_nums_heb`,`heb_nums_eng` FROM `heb_nums` LIMIT 0,176");
							while($r = mysql_fetch_assoc($q)){
								$n = $r['heb_nums_heb'];
								$nE = $r['heb_nums_eng'];
								if($pN == $nE){
									echo "<option value='$n' selected='selected'>$n</option>";
								}elseif($pN != $nE){
									echo "<option value='$n'>$n</option>";
								}
							}
						?>
					</select></td>
				</tr>
				<tr>
					<td align="left">Text Nikkud:&nbsp;</td><td align="left"><input type="text" id="nikkud" name="tehilim_text_nikkud" tabindex="1" /></td>
				</tr>
				<tr>
					<td align="left">Text No Nikkud:&nbsp;</td><td align="left"><input type="text" id="no_nikkud" name="tehilim_text_no_nikkud" tabindex="2" /></td>
				</tr>
				<tr>
					<td align="left">Letter Number:&nbsp;</td><td align="left"><select name="tehilim_letter_num">
						<option></option>
						<?php
							if(isset($lN) && isset($p)){
								$q = mysql_query("SELECT `heb_nums_eng` FROM `heb_nums` WHERE `heb_num_type` = 2 ORDER BY `heb_nums_eng` ASC");
								while($r = mysql_fetch_assoc($q)){
									$n = $r['heb_nums_eng'];
									if($n == $r4['heb_nums_eng']){
										echo "<option value='$n' selected='selected'>$n</option>";
									}else{
										echo "<option value='$n'>$n</option>";
									}
								}
							}
						?>
					</select></td>
				</tr>
				<tr>
					<td align="left">Letter Number Hebrew:&nbsp;</td><td align="left"><select name="tehilim_letter_num_heb">
						<option></option>
						<?php
							if(isset($lN) && isset($p)){
								$q = mysql_query("SELECT `heb_nums_eng`,`heb_nums_heb` FROM `heb_nums` WHERE `heb_num_type` = 2 ORDER BY `heb_nums_eng` ASC");
								while($r = mysql_fetch_assoc($q)){
									$nE = $r['heb_nums_eng'];
									$n = $r['heb_nums_heb'];
									if($nE == $r4['heb_nums_eng']){
										echo "<option value='$n' selected='selected'>$n</option>";
									}else{
										echo "<option value='$n'>$n</option>";
									}
								}
							}
						?>
					</select></td>
				</tr>
				<tr>
					<td align="right" colspan="2"><input type="submit" value="Submit" tabindex="3" /></td>
				</tr>
			</table>
		</form>
		<input type="button" onclick="nextC(<?php echo $cN?>)" value="Next Chapter" tabindex="4" />
	</body>
</html>