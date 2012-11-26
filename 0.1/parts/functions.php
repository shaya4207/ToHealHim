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
    if($limit != false) {
      $q .= " LIMIT $limit";
    }
    if($groupBy != false) {
      $q .= " GROUP BY $groupBy";
    }
    $res = mysql_query($q);
    return $res;
  }
  
  function afterShkia(){
    return date_sunset(time(), SUNFUNCS_RET_TIMESTAMP, 40+71/60, -74+0/60, 90+50/60, -5) + 4320; // This is for NYC
  }
  
  function hebCal($day){
    switch ($day) {
    case 'dayOfWeek':
      if(time() >= afterShkia()) {
        $dayOfWeek = date('N') + 1;
        if($dayOfWeek == 8) {
          $dayOfWeek = 1;
        }
      } else {
        $dayOfWeek = date('N');
      }
      switch ($dayOfWeek) {
        case 1:
            $hebDayText = 'שני';
            break;
        case 2:
            $hebDayText = 'שלישי';
            break;
        case 3:
            $hebDayText = 'רביעי';
            break;
        case 4:
            $hebDayText = 'חמישי';
            break;
        case 5:
            $hebDayText = 'שישי';
            break;
        case 6:
            $hebDayText = 'שבת';
            break;
        case 7:
            $hebDayText = 'ראשון';
            break;
      };
      return $hebDayText;
      break;
    
      case 'hebHebDay':
        $hebHeb = mb_convert_encoding( jdtojewish( unixtojd(), true ), "UTF-8", "ISO-8859-8");
        $hebHebDay = explode(' ', $hebHeb);
        $hebHebDay1 = $hebHebDay[0];
        return $hebHebDay1;
        break;
      case 'hebEngDay':
        $engHeb = jdtojewish( unixtojd(), false );
        $engHebDay = explode('/', $engHeb);
        $engHebDay1 = $engHebDay[1];
        if(time() >= afterShkia()) {
          $engHebDay1 += 1;
        }
        if($engHebDay1 > cal_days_in_month(CAL_JEWISH, $engHebDay[0], $engHebDay[2])) {
          $engHebDay1 = 1;
        }
        return $engHebDay1;
        break;
    }


//    $hebHeb = mb_convert_encoding( jdtojewish( unixtojd(), true ), "UTF-8", "ISO-8859-8");
//    $hebHebDay = explode(' ', $hebHeb);
//    $hebHebDay1 = $hebHebDay[0];
//    $engHeb = jdtojewish( unixtojd(), false );
//    $engHebDay = explode('/', $engHeb);
//    $engHebDay1 = $engHebDay[1];
//    if(time() >= afterShkia()) {
//      $engHebDay1 += 1;
//    }
//    if($engHebDay1 > cal_days_in_month(CAL_JEWISH, $engHebDay[0], $engHebDay[2])) {
//      $engHebDay1 = 1;
//    }
  }