<?php

namespace App\OpenApi\RequestBodies\Game;

use App\OpenApi\Schemas\Game\StoreGameSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class StoreGameRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create()
            ->description('Game data')
            ->content(MediaType::json()->schema(StoreGameSchema::ref()));
    }
}
