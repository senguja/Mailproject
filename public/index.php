<?php

use Backend\Controller\AnswerStorageController;
use Backend\Controller\MailHandlingController;
use Backend\Controller\QuestionController;

require __DIR__ . '/../vendor/autoload.php';


/*$path = $_SERVER['REQUEST_URI'];
var_dump($path);

$route = [
    '/',
    '/saveAnswer',
    '/getQuestions'
];

//$regEx = "~^/getQuestions/?$~i";
$regEx = '#^([/A-z0-9]+)?(\?.*)$#i';

preg_match_all($regEx, '/test/duschoene/methode?param', $matches);

$url = '';
$queryString = '';
$path = '';
if ( count($matches) === 3)
{
    [$url, $path, $queryString] = $matches;
}

var_dump($url);*/


$path = $_SERVER['REQUEST_URI'];
//var_dump($path);

$routes = [
    '/',
    '/saveAnswer',
    '/getQuestions'
];

//Regular Expression
// hier werden die Zeichen definiert, die in der URL vorgesehen sind.
// Slash, von A-Z, von 0-9, +=mindestens oder beliebig oft die Zeichen,
// ?= das weitere ist optional, \? = Fragezeichen erlaubt, .*= alle oder keine beliebige Zeichen
$regEx = '#^([/A-z0-9]+)?(\?.*)$#i';

// durchsucht $path  nach Übereinstimmungen mit $regEx, $matches wird mit den Suchergebnissen gefüllt
preg_match($regEx, $path, $urlMatches);
//var_dump($urlMatches);

//$url = '';
//$queryString = '';
//$path = '';
if (count($urlMatches) === 3) {
    [$url, $path, $queryString] = $urlMatches;
}

$uri = '';
foreach ($routes as $route) {
    if ($path === $route) {
        $uri = $route;
    }
}

//wenn man im root ist dann render das html der home.php
if ($uri === '/') {
    require __DIR__ . "/home.php";
}
//wenn man eine request an /send sendet, mache das:
if ($uri === '/send') {
    require __DIR__ . '/../source/Controller/MailHandlingController.php';

    $mailHandlingController = new MailHandlingController();
    $mailHandlingController->saveMail();
    $mailHandlingController->sendMail();
}

if ($uri === '/saveAnswer') {
    $answerStorageController = new AnswerStorageController();
    $answerStorageController->saveAnswers();
}


if ($uri === '/getQuestions') {
    $questionController = new QuestionController();
    $questionController->fetch();
}





