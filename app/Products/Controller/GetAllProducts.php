<?php

declare(strict_types=1);

namespace App\Products\Controller;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

final class GetAllProducts
{
    public function __invoke(ServerRequestInterface $request)
    {
        return new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(['message' => 'Get Products'])
        );
    }
}
