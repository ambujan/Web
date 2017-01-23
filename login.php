<?php
/**
 * Created by PhpStorm.
 * User: Ambujan
 * Date: 05-Jan-17
 * Time: 1:42 PM
 */
include "connect.php";
$uname = $_POST['username'];
$password = md5($_POST['password']);