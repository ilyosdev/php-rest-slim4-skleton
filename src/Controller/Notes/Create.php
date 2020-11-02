<?php

declare(strict_types=1);

namespace App\Controller\Notes;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Create extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
        $input = $request->getParsedBody();
        $notes = $this->getNotesService()->create($input);

        return JsonResponse::withJson($response, json_encode($notes), 201);
    }
}
