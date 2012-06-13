<?php
	$link = mysql_connect('localhost','root','');
	$db = mysql_select_db('tohealhim',$link);

    $tehilim_chap_num = $_POST['tehilim_chap_num']; 
    $tehilim_chap_num_heb = $_POST['tehilim_chap_num_heb']; 
    $tehilim_posuk_num = $_POST['tehilim_posuk_num']; 
    $tehilim_posuk_num_heb = $_POST['tehilim_posuk_num_heb']; 
    $tehilim_text_nikkud = $_POST['tehilim_text_nikkud']; 
    $tehilim_text_no_nikkud = $_POST['tehilim_text_no_nikkud'];
	$tehilim_letter_num = $_POST['tehilim_letter_num'];;
	$tehilim_letter_num_heb = $_POST['tehilim_letter_num_heb'];

	$cN = $_POST['cN'];
	$pN = ($_POST['pN'] + 1);
	if(isset($_POST['p'])){
		if($_POST['p'] < 8){
			$p = ($_POST['p'] + 1);
			$lN = $_POST['lN'];
		}else{
			$p = 1;
			$lN = $_POST['lN'];
			$q4 = mysql_query("SELECT `heb_nums_id`,`heb_nums_heb`,`heb_nums_eng` FROM `heb_nums` WHERE `heb_nums_id` > $lN ORDER BY `heb_nums_id` ASC LIMIT 1");
			$r4 = mysql_fetch_assoc($q4);
			$lN = $r4['heb_nums_id'];
		}
	}

	$q = mysql_query("INSERT INTO `chapters_full`
	(`tehilim_chap_num`,`tehilim_chap_num_heb`,`tehilim_posuk_num`,`tehilim_posuk_num_heb`,`tehilim_text_nikkud`,`tehilim_text_no_nikkud`,`tehilim_letter_num`,`tehilim_letter_num_heb`)
	VALUES
	('$tehilim_chap_num','$tehilim_chap_num_heb','$tehilim_posuk_num','$tehilim_posuk_num_heb','$tehilim_text_nikkud','$tehilim_text_no_nikkud','$tehilim_letter_num','$tehilim_letter_num_heb')");
	if(!$q){
		echo mysql_error();
	}else{
//		if(isset($lN) && isset($p)){
//			header("Location: ./tohealhim.php?cN=$cN&pN=$pN&lN=$lN&p=$p");
//		}else{
			header("Location: ./tohealhim.php?cN=$cN&pN=$pN");
//		}
	}
?>