<?php
function connectdb(){
    $conn=mysql_connect(DBHOST,DBUSER,DBPASS) or die("can't connect this database");
    mysql_select_db(DBNAME,$conn);
    return $conn;
}
