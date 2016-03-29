<?php
//echo para identificar acentuacao
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=bdweb user=bdweb password=bdweb2016")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT * FROM tb_usuario_jailsonbw';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>