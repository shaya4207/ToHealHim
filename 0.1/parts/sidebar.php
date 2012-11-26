<aside class="main">
  Font Size: <input type="number" min="10" max="72" id="font-size" value="24">
  <hr>
  <?php
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
    $hebHeb = mb_convert_encoding( jdtojewish( unixtojd(), true ), "UTF-8", "ISO-8859-8");
    $hebHebDay = explode(' ', $hebHeb);
    $hebHebDay1 = $hebHebDay[0];
    $engHeb = jdtojewish( unixtojd(), false );
    $engHebDay = explode('/', $engHeb);
    $engHebDay1 = $engHebDay[1];
    if(time() >= afterShkia()) {
      $engHebDay1 += 1;
    }
    if($engHebDay1 > cal_days_in_month(CAL_JEWISH, $engHebDay[0], $engHebDay[2])) {
      $engHebDay1 = 1;
    }
  ?>
  <a href="" class="button">
    תהילים ליום <?php echo "<span class='bold'>$hebDayText</span>"; ?>
  </a>
  <a href="" class="button">
    תהילים ל<?php echo "<span class='bold'>$hebHebDay1</span>";?> לחודש
  </a>
</aside>