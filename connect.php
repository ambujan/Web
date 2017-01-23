<?php
/**
 * Created by PhpStorm.
 * User: Ambujan
 * Date: 10-Nov-16
 * Time: 3:23 PM
 */
define('db_name', 'ticketvmodule');
define('db_user', 'root');
define('db_pass', '');
define('db_host', 'localhost');

$link = mysqli_connect(db_host, db_user, db_pass, db_name);

if(mysqli_connect_errno()){
    die('Could not Connect! ');
}

mysqli_select_db($link, db_name);

echo 'Connected Successfully!';