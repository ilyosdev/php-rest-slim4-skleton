<?php

    declare(strict_types=1);

    namespace App\Service\Notes;

    use App\Exception\Notes;
    use App\Repository\NotesRepository;
    use App\Service\BaseService;
    use Respect\Validation\Validator as v;

    abstract class Base extends BaseService
    {
        /** @var NotesRepository */
        protected $notesRepository;

        public function __construct(
            NotesRepository $notesRepository
        )
        {
            $this->notesRepository = $notesRepository;
        }

        protected static function validateNotesName(string $name): string
        {
            if (!v::length(1, 50)->validate($name)) {
                throw new Notes('The name of the note is invalid.', 400);
            }

            return $name;
        }
    }