<?php
/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

// $databaseHost     = 'covid-response.mysql.database.azure.com';
// $databaseName     = 'expotv-new';
// $databaseUsername = 'saadmin@covid-response';
// $databasePassword = 'Nepal@123';


$databaseHost     = 'localhost';
$databaseName     = 'auctionbid';
$databaseUsername = 'root';
$databasePassword = '';


$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);