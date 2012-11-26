<?php
  function db_select($table, $fields, $join = false, $condition = false, $limit = false, $orderBy = false, $groupBy = false) {
    $q = "SELECT ";
    if(is_array($fields)) {
      $flds = '';
      $i = 1;
      $j = 1;
      foreach ($fields as $key => $value) {
        if($i > $j) {
          $flds .= ",`$value`";
        } else {
          $flds .= "`$value`";
        }
        $i++;
      }
      $q .= $flds;
    } else {
      $q .= $fields;
    }
    $q .= " FROM $table ";
    if($condition != false) {
      if(!is_array($condition)) {
        $q .= " WHERE $condition ";
      }
    }
    if($groupBy != false) {
      $q .= " GROUP BY $groupBy";
    }
    $res = mysql_query($q);
    return $res;
  }
  
  function afterShkia(){
    return date_sunset(time(), SUNFUNCS_RET_TIMESTAMP, 40+71/60, -74+0/60, 90+50/60, -5); // This is for NYC
  }