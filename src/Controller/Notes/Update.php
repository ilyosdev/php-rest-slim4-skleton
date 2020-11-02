<?php

declare(strict_types=1);

namespace App\Controller\Notes;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Update extends Base
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $input = $request->getParsedBody();
        $notes = $this->getNotesService()->update($input, (int) $args['id']);

        return JsonResponse::withJson($response, json_encode($notes));
    }
}
