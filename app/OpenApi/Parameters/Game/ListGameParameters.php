<?php

namespace App\OpenApi\Parameters\Game;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class ListGameParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [
            Parameter::query()
                ->name('page')
                ->description('Number of page')
                ->required(false)
                ->schema(Schema::number()->default(5)),

            Parameter::query()
                ->name('per-page')
                ->description('Count records per page')
                ->required(false)
                ->schema(Schema::number()->default(20)),

            Parameter::query()
                ->name('rating_from')
                ->description('Including bot of rating')
                ->required(false)
                ->schema(Schema::number()->default(rand(0,100)/10)),

            Parameter::query()
                ->name('rating_to')
                ->description('Including top of rating')
                ->required(false)
                ->schema(Schema::number()->default(rand(0,100)/10)),
        ];
    }
}
