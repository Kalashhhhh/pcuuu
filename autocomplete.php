<?php

// if the 'term' variable is not sent with the request, exit
if (!isset($_REQUEST['term'])) {
    exit;
}
// connect to the database server and select the appropriate database for use
$dblink = mysql_connect('188.165.190.52', 'dbsampfg_user', 'mI-hF&eUal@fg-v7Lx') or die(mysql_error());
mysql_select_db('dbsampfg_dtrp');

// query the database table for zip codes that match 'term'
$rs = mysql_query('select id, Nombre from usuarios where Nombre like "' . mysql_real_escape_string($_REQUEST['term']) . '%" order by Nombre asc limit 0,10', $dblink);

// loop through each zipcode returned and format the response for jQuery
$data = array();
if ($rs && mysql_num_rows($rs)) {
    while ($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
        $data[] = array(
            'label' => $row['Nombre'] . ', ' . $row['id'],
            'value' => $row['Nombre']
        );
    }
}

// jQuery wants JSON data
echo json_encode($data);
flush();
