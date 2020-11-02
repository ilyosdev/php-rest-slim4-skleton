<?php

    declare(strict_types=1);

    use App\Service\Notes;

    $container['find_note_service'] = static function ($container): Notes\Find {
        return new Notes\Find($container['notes_repository']);
    };
