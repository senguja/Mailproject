<?php

use Backend\Controller\MailHandlingController;

require __DIR__ . '/../vendor/autoload.php';


$path = $_SERVER['REQUEST_URI'];


//wenn man im root ist dann render das html der home.php
if ($path == '/') {
    require __DIR__ . "/home.php";
}
//wenn man eine request an /send sendet, mache das:
if ($path == '/send') {
    require __DIR__.'/../source/Controller/MailHandlingController.php';

    $mailHandlingController = new MailHandlingController();
    $mailHandlingController->handle();
    $mailHandlingController->sendMail();

}





