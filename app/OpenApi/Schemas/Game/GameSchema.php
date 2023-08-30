<?php

namespace App\OpenApi\Schemas\Game;

use App\OpenApi\Schemas\Genre\GenreSchema;
use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Illuminate\Support\Facades\Date;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class GameSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('Game')
            ->properties(
                Schema::integer('id')->default(1),
                Schema::string('title')->default(fake()->domainWord()),
                Schema::string('description')->default(fake()->unique()->text()),
                Schema::string('development_studio')->default(fake()->company()),
                Schema::number('rating')->default(fake()->randomFloat(2, 0, 10)),
                Schema::array('genres')->items(GenreSchema::ref()),
                Schema::string('created_at')->format(Schema::FORMAT_DATE_TIME)->default(Date::now()),
            );
    }
}
