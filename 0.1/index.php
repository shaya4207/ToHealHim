<?php
	require('./parts/db.inc');
	require('./parts/functions.php');
  include_once('./parts/head.php');
?>
<div class="main-wrap">
	<?php
	  include_once('./parts/header.php');
	?>
	<div class="main" dir="rtl">
		<?php
			$fields = array('tehilim_chap_num','tehilim_chap_num_heb');
			$q = db_select('chapters_full',$fields,'','','','','tehilim_chap_num');
			while($res = mysql_fetch_assoc($q)) {?>
				<div class="chapter">
					<h2><?php echo $res['tehilim_chap_num_heb'];?></h2>
					<?php
						$tehilim_chap_num = $res['tehilim_chap_num'];
						$flds = array('tehilim_text_nikkud','tehilim_posuk_num_heb');
						$q2 = db_select("chapters_full",$flds,"","tehilim_chap_num=$tehilim_chap_num");
						while ($res2 = mysql_fetch_assoc($q2)) {
							echo $res2['tehilim_posuk_num_heb'] . " " . $res2['tehilim_text_nikkud'] . ": ";
						}
					?>
				</div>
		<?php
			}
		?>
	</div>
	<aside class="main">
	</aside>
	<div class="clear"></div>
	<?php
	  include_once('./parts/footer.php');
	?>
</div>
<?php
  include_once('./parts/foot.php');
?>