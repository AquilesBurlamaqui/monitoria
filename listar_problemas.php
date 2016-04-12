<?php
    $dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
    or die('Could not connect: ' . pg_last_error());
    $result = pg_query("SELECT * FROM monitoria.problema") or 
    die('Query failed: ' . pg_last_error());

    $count = pg_num_rows($result);

    $i = 0;
    echo '<html><body><table><tr>';
    while ($i < pg_num_fields($result)-1)
    {
      $fieldName = pg_field_name($result, $i);
      echo '<td>' . $fieldName . '</td>';
      $i = $i + 1;
    }
    echo '</tr>';
    $i = 0;

    while ($row = pg_fetch_row($result)) 
    {
      echo '<tr>';
      $count = count($row);
      $y = 0;
      while ($y < $count-1)
      {
        $c_row = current($row);
        echo '<td>' . $c_row . '</td>';
        next($row);
        $y = $y + 1;
      }
      echo '</tr>';
      $i = $i + 1;
    }
    pg_free_result($result);

    pg_close($dbconn);
?>