<?php
	require('./parts/db.inc');
	require('./parts/functions.php');
	include_once('./parts/head.php');
?>
<div class="main-wrap" xmlns="http://www.w3.org/1999/html">
	<?php
	  include_once('./parts/header.php');
	?>
    <aside class="main">
		&nbsp;
    </aside>
	<div class="main" dir="rtl">
		<?php
	  		if(!isset($_GET['c'])) {
			  $fields = array('tehilim_chap_num','tehilim_chap_num_heb');
			  $q = db_select('chapters_full',$fields,'','','','','tehilim_chap_num');
			  while($res = mysql_fetch_assoc($q)) {?>
				  <div class="chapter">
					  <h2><a href="http://<?php echo $file?>/c/<?php echo $res['tehilim_chap_num'];?>"><?php echo $res['tehilim_chap_num_heb'];?></a></h2>
					  <?php
						  $tehilim_chap_num = $res['tehilim_chap_num'];
						  $flds = array('tehilim_text_nikkud','tehilim_posuk_num_heb');
						  $q2 = db_select("chapters_full",$flds,"","tehilim_chap_num=$tehilim_chap_num");
						  while ($res2 = mysql_fetch_assoc($q2)) {
							  echo "<span class='posuk-num'>" . $res2['tehilim_posuk_num_heb'] . "</span> " . $res2['tehilim_text_nikkud'] . ": ";
						  }
					  ?>
				  </div>
		  <?php
			  }
			} else {
				$fields = array('tehilim_chap_num','tehilim_chap_num_heb');
				$c = $_GET['c'];
				$q = db_select('chapters_full',$fields,'',"tehilim_chap_num=$c",'','','tehilim_chap_num');
				while($res = mysql_fetch_assoc($q)) {?>
                    <div class="chapter">
                        <h2><a href="http://<?php echo $file?>/c/<?php echo $res['tehilim_chap_num'];?>"><?php echo $res['tehilim_chap_num_heb'];?></a></h2>
					  <?php
					  $tehilim_chap_num = $res['tehilim_chap_num'];
					  $flds = array('tehilim_text_nikkud','tehilim_posuk_num_heb');
					  $q2 = db_select("chapters_full",$flds,"","tehilim_chap_num=$tehilim_chap_num");
					  while ($res2 = mysql_fetch_assoc($q2)) {
						echo "<span class='posuk-num'>" . $res2['tehilim_posuk_num_heb'] . "</span> " . $res2['tehilim_text_nikkud'] . ": ";
					  }
					  ?>
                    </div>
				  <?php
				}
			}
		?>
	</div>
	<div class="clear"></div>
	<?php
	  include_once('./parts/footer.php');
	?>
</div>
<?php
  include_once('./parts/foot.php');
?>