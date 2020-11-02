<?php

    declare(strict_types=1);

    namespace App\Repository;

    abstract class BaseRepository
    {
        protected $db;

        public function __construct(\PDO $db)
        {
            $this->db = $db;
        }

        public function getDb(): \PDO
        {
            return $this->db;
        }
    }