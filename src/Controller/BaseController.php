<?php

    declare(strict_types=1);

    namespace App\Controller;

    use App\Helper\JsonResponse;
    use Pimple\Psr11\Container;
    use Psr\Http\Message\ResponseInterface as Response;

    abstract class BaseController
    {
        protected $container;

        public function __construct(Container $container)
        {
            $this->container = $container;
        }

        protected function jsonResponse(Response $response, string $status, $message, int $code): Response
        {
            $result = [
                'code'    => $code,
                'status'  => $status,
                'message' => $message,
            ];
            return JsonResponse::withJson($response, json_encode($result), $code);
        }
    }