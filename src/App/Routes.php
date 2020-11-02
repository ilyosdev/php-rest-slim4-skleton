<?php

    declare(strict_types=1);

    $app->get('/', 'App\Controller\DefaultController:getHelp');
    $app->get('/status', 'App\Controller\DefaultController:getStatus');

    $app->get('/notes', App\Controller\Notes\GetAll::class);
    $app->post('/notes', App\Controller\Notes\Create::class);
    $app->get('/notes/{id}', App\Controller\Notes\GetOne::class);
    $app->put('/notes/{id}', App\Controller\Notes\Update::class);
    $app->delete('/notes/{id}', App\Controller\Notes\Delete::class);
