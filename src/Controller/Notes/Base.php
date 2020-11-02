<?php

    declare(strict_types=1);

    namespace App\Controller\Notes;

    use App\Controller\BaseController;
    use App\Service\Notes\Create;
    use App\Service\Notes\Delete;
    use App\Service\Notes\Find;
    use App\Service\Notes\Update;

    abstract class Base extends BaseController
    {
        protected function getServiceFindNotes(): Find
        {
            return $this->container->get('find_note_service');
        }

        protected function getServiceCreateNotes(): Create
        {
            return $this->container->get('create_note_service');
        }

        protected function getServiceUpdateNotes(): Update
        {
            return $this->container->get('update_note_service');
        }

        protected function getServiceDeleteNotes(): Delete
        {
            return $this->container->get('delete_note_service');
        }
    }