<?php
	//exit('exiting');
	
	error_reporting(E_ALL);
	
	require_once './vendor/autoload.php';

    use Newbg\Main\BackgroundChanger;

    $bgChanger = new BackgroundChanger();
    $bgChanger->go();
?>