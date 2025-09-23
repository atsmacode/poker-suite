<?php

namespace App\Http\Controllers\HoleCards;

use App\Http\RequestHandlers\HoleCardStoreRequestHandler;
use App\Http\Requests\HoleCardStoreRequest;
use App\Http\Resources\GameStateResource;

class HoleCardController
{
    public function __construct(private HoleCardStoreRequestHandler $storeHandler)
    {
    }

    public function store(HoleCardStoreRequest $request): GameStateResource
    {
        return $this->storeHandler->handle($request);
    }
}