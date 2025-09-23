<?php

namespace App\Http\Controllers\HoleCards;

use App\Http\RequestHandlers\HoleCardStoreRequestHandler;
use App\Http\Requests\HoleCardStoreRequest;
use App\Http\Resources\GameStateResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HoleCardController
{
    public function __construct(private HoleCardStoreRequestHandler $storeHandler)
    {
    }

    public function store(HoleCardStoreRequest $request): JsonResponse
    {
        try {
            return $this->storeHandler->handle($request);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}