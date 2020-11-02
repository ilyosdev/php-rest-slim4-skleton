<?php

    declare(strict_types=1);

    namespace App\Controller\Notes;

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    final class GetAll extends Base
    {
        public function __invoke(Request $request, Response $response, $args): Response
        {
            $params = $request->getQueryParams();
            $page = $params['page'] ?? null;
            $perPage = $params['perPage'] ?? null;
            $name = $params['name'] ?? null;
            $description = $params['description'] ?? null;

            $notes = $this->getServiceFindNotes()
                ->getNotesByPage((int)$page, (int)$perPage, $name, $description);

            return $this->jsonResponse($response, 'ok', $notes, 200);
        }
    }