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
var_dump($urlMatches);

$url = '';
$queryString = '';
$path = '';
if ( count($urlMatches) === 3)
{
    [$url, $path, $queryString] = $urlMatches;
}

foreach ($routes as $route)
{
    preg_match_all('#'.$url.'#', $path, $matches);

    var_dump($matches);
}


//wenn man im root ist dann render das html der home.php
if ($path === '/') {
    require __DIR__ . "/home.php";
}
//wenn man eine request an /send sendet, mache das:
if ($path === '/send') {
    require __DIR__ . '/../source/Controller/MailHandlingController.php';

    $mailHandlingController = new MailHandlingController();
    $mailHandlingController->saveMail();
    $mailHandlingController->sendMail();
}

if ($path === '/saveAnswer') {
    $answerStorageController = new AnswerStorageController();
    $answerStorageController->saveAnswers();
}


if ($path === '/getQuestions') {
    var_dump('hi');
    $questionController = new QuestionController();
    $questionController->fetch();


}





