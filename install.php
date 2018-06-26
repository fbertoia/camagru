<?php
include 'db/db_settings.php';

try {
    $dbh = new PDO("mysql:host=$servername", $username, $password);
	$dbh->exec("DROP DATABASE `$dbname`");
	echo "Database $dbname deleted."."<br>";
	$dbh->exec("CREATE DATABASE IF not EXISTS `$dbname`");
	echo "Database $dbname created."."<br>";
	$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
	$dbh->exec(
		"CREATE TABLE IF not EXISTS users (
			`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
			`login` VARCHAR(100) DEFAULT 'unknown' NOT NULL,
			`firstname` VARCHAR(100) DEFAULT 'unknown' NOT NULL,
			`lastname` VARCHAR(100) DEFAULT 'unknown' NOT NULL,
			`email` VARCHAR(100) DEFAULT 'unknown' NOT NULL,
			`password` VARCHAR(256) NOT NULL,
			`creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			`salt` VARCHAR(20) DEFAULT 'unknown' NOT NULL,
			`confirmation` VARCHAR(20) DEFAULT 'false');
		CREATE TABLE IF not EXISTS photos (
			`id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
			`creation_date` DATE NOT NULL,
			`user_photo` VARCHAR(8) NOT NULL)");

    // $stmt = $dbh->exec("INSERT INTO users (`firstname`, `lastname`, `email`, `login`, `password`, `creation_date`)
    // VALUES ('toto', 'titi', 'tata', 'tutu', 'dsfsadfasdf', '2010-02-06 19:30:13')");
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>
