<?php

namespace App\Http\Controllers\Api\Products;

use App\Actions\Products\Create;
use App\Factories\ProductFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Products\StoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreRequest $request): JsonResponse
    {
        $product = Create::handle(
            ProductFactory::make($request->validated())
        );
         return new JsonResponse(
            [],
             Response::HTTP_CREATED
         );
    }
}
