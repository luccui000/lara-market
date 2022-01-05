<?php

namespace App\Http\Controllers\Api\Sellers;

use App\Actions\Sellers\Create;
use App\Factories\SellerFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Seller\StoreRequest;
use App\Http\Resources\Api\SellerResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): JsonResponse
    {
        $seller = Create::handle(
            SellerFactory::make($request->validated())
        );
        return new JsonResponse(
            data: SellerResource::make($seller),
            status: Response::HTTP_OK
        );
    }
}
