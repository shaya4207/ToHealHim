<?php
  if($_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
    $link = mysql_connect('localhost','integsk2','Sk9721486!') or die(mysql_error());
    $db = mysql_select_db('integsk2_tohealhim',$link) or die(mysql_error());
  } else {
    $link = mysql_connect('localhost','root','');
    $db = mysql_select_db('tohealhim',$link) or die(mysql_error());
  }
?>