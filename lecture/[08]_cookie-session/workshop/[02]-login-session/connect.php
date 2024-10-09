<?php
try {
	$pdo=new PDO("mysql:host=localhost; dbname=sec1_8;charset=utf8","Wstd8","az02MP6a");
} catch (PDOException $e) {
	echo "เกิดข้อผิดพลาด : ".$e->getMessage();
}
?>