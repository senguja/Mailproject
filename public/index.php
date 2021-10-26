<?php

use Backend\Controller\AnswerStorageController;
use Backend\Controller\MailHandlingController;
use Backend\Controller\QuestionController;

require __DIR__ . '/../vendor/autoload.php';


$path = $_SERVER['REQUEST_URI'];

$regEx = "~^$path/?$~i";

preg_match($regEx, $path, $matches);


//wenn man im root ist dann render das html der home.php
if ($path == '/') {
    require __DIR__ . "/home.php";
}
//wenn man eine request an /send sendet, mache das:
if ($path == '/send') {
    require __DIR__ . '/../source/Controller/MailHandlingController.php';

    $mailHandlingController = new MailHandlingController();
    $mailHandlingController->saveMail();
    $mailHandlingController->sendMail();
}

if ($path == '/saveAnswer') {
    $answerStorageController = new AnswerStorageController();
    $answerStorageController->saveAnswers();
}

if (count($matches) == 1) {
    $questionController = new QuestionController();
    $questionController->fetch();

}




