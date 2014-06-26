<?php
    require_once './vendor/autoload.php';
    use Newbg\Main\BackgroundChanger;

    $config = parse_ini_file("./Resources/config/config.ini");

    $bgChanger = new BackgroundChanger($config['bg_save_folder']);
    $bgChanger->go();
?>