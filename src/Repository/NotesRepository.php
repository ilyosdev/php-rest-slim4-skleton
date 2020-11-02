<?php

    declare(strict_types=1);

    namespace App\Repository;

    use App\Exception\Notes;

    final class NotesRepository extends BaseRepository
    {

        public function getAll(): array
        {
            $query = 'SELECT * FROM `notes` ORDER BY `id`';
            $statement = $this->db->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
        }

        public function getNotesByPage(
            int $page,
            int $perPage,
            ?string $name,
            ?string $description
        ): array
        {
            $params = [
                'name'        => is_null($name) ? '' : $name,
                'description' => is_null($description) ? '' : $description,
            ];
            $query = $this->getQueryNotesByPage();
            $statement = $this->db->prepare($query);
            $statement->bindParam('name', $params['name']);
            $statement->bindParam('description', $params['description']);
            $statement->execute();
            $total = $statement->rowCount();

            return $this->getResultsWithPagination(
                $query,
                $page,
                $perPage,
                $params,
                $total
            );
        }

        public function getQueryNotesByPage(): string
        {
            return "
            SELECT *
            FROM `notes`
            WHERE `name` LIKE CONCAT('%', :name, '%')
            AND `description` LIKE CONCAT('%', :description, '%')
            ORDER BY `id`
        ";
        }

        protected function getResultsWithPagination(
            string $query,
            int $page,
            int $perPage,
            array $params,
            int $total
        ): array
        {
            return [
                'pagination' => [
                    'totalRows'   => $total,
                    'totalPages'  => ceil($total / $perPage),
                    'currentPage' => $page,
                    'perPage'     => $perPage,
                ],
                'data'       => $this->getResultByPage($query, $page, $perPage, $params),
            ];
        }

        protected function getResultByPage(
            string $query,
            int $page,
            int $perPage,
            array $params
        ): array
        {
            $offset = ($page - 1) * $perPage;
            $query .= " LIMIT ${perPage} OFFSET ${offset}";
            $statement = $this->db->prepare($query);
            $statement->execute($params);

            return $statement->fetchAll();
        }

        public function create(object $notes)
        {
            $query = 'INSERT INTO `notes` (`id`, `name`, `description`) VALUES (:id, :name, :description)';
            $statement = $this->getDb()->prepare($query);
            $statement->bindParam('id', $notes->id);
            $statement->bindParam('name', $notes->name);
            $statement->bindParam('description', $notes->description);

            $statement->execute();

            return $this->checkAndGet((int)$this->getDb()->lastInsertId());
        }

        public function checkAndGet(int $notesId)
        {
            $query = 'SELECT * FROM `notes` WHERE `id` = :id';
            $statement = $this->getDb()->prepare($query);
            $statement->bindParam('id', $notesId);
            $statement->execute();
            $notes = $statement->fetchObject();
            if (empty($notes)) {
                throw new Notes('Notes not found.', 404);
            }

            return $notes;
        }

        public function update(object $notes, object $data)
        {
            if (isset($data->name)) {
                $notes->name = $data->name;
            }
            if (isset($data->description)) {
                $notes->description = $data->description;
            }


            $query = 'UPDATE `notes` SET `name` = :name, `description` = :description WHERE `id` = :id';
            $statement = $this->getDb()->prepare($query);
            $statement->bindParam('id', $notes->id);
            $statement->bindParam('name', $notes->name);
            $statement->bindParam('description', $notes->description);

            $statement->execute();

            return $this->checkAndGet((int)$notes->id);
        }

        public function delete(int $notesId): void
        {
            $query = 'DELETE FROM `notes` WHERE `id` = :id';
            $statement = $this->getDb()->prepare($query);
            $statement->bindParam('id', $notesId);
            $statement->execute();
        }
    }
