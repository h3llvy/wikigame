<?php

namespace App\OpenApi\Schemas\Game;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Illuminate\Support\Facades\Date;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class StoreGameSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('StoreGame')
            ->properties(
                Schema::string('title')->default(fake()->domainWord()),
                Schema::string('description')->default(fake()->unique()->text()),
                Schema::string('development_studio')->default(fake()->company()),
                Schema::number('rating')->default(fake()->randomFloat(2, 0, 10)),
                Schema::array('genres')->items(Schema::integer())->example([1, 2, 3]),
                Schema::string('created_at')->format(Schema::FORMAT_DATE_TIME)->default(Date::now()),
            );
    }
}
