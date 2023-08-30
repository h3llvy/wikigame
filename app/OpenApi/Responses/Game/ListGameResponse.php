<?php

namespace App\OpenApi\Responses\Game;

use App\OpenApi\Schemas\Game\ListGameSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class ListGameResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()
            ->description('Successful response')
            ->content(MediaType::json()->schema(ListGameSchema::ref()));
    }
}
