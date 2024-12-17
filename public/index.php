<?php

namespace Htlw3r\Dockerwebdemo;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Tools\DsnParser;
use Htlw3r\Dockerwebdemo\Model\Repository\UserRepository;
use Htlw3r\Dockerwebdemo\View\TemplateRenderer;

require_once '../vendor/autoload.php';

// we make use of the Repository here to fetch an array of User Entities
$userRepository = new UserRepository('pdo-sqlite:///../db/mydb.sqlite');
$templateRenderer = new TemplateRenderer('../templates');
// we render the users with the help of a twig template
echo $templateRenderer->render(
    'index.html',
    array(
        'users' => $userRepository->findAll()
    )
);