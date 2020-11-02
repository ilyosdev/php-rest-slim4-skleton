<?php

    declare(strict_types=1);

    $container['notes_repository'] = static function ($container): App\Repository\NotesRepository {
        return new App\Repository\NotesRepository($container['db']);
    };
