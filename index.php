<?php
// Connecting, selecting database
$dbconn = pg_connect("host=ec2-18-204-101-137.compute-1.amazonaws.com dbname=de8n9si7jjtvjm user=wumboiitbnbzbz password=93cfb48391089642d01c100202e763eac9e0ee2c011c21aaebd3435f40ff9dad")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT * FROM authors';
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
