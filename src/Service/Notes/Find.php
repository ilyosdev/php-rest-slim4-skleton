<?php

    declare(strict_types=1);

    namespace App\Service\Notes;


    final class Find extends Base
    {
        public function all(): array
        {
            return $this->notesRepository->getAll();
        }

        public function getNotesByPage(
            int $page,
            int $perPage,
            ?string $name,
            ?string $description
        ): array
        {
            if ($page < 1) {
                $page = 1;
            }
            if ($perPage < 1) {
                $perPage = self::DEFAULT_PER_PAGE_PAGINATION;
            }

            return $this->notesRepository->getNotesByPage(
                $page,
                $perPage,
                $name,
                $description
            );
        }

        public function one(int $notesId)
        {
            return $this->checkAndGet($notesId);
        }

        protected function checkAndGet(int $notesId)
        {
            return $this->notesRepository->checkAndGet($notesId);
        }

    }