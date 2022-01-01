<?php

namespace App\Http\Controllers\Api\Products;

use App\Actions\Products\Update;
use App\Factories\ProductFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Products\UpdateRequest;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $id): JsonResponse
    {
        $product = QueryBuilder::for(
            Product::class
        )->findOrFail($id);

        $updatedProduct = Update::handle(
            $product,
            ProductFactory::make($request->validated())
        );

        return new JsonResponse(
            new ProductResource($updatedProduct),
            Response::HTTP_OK
        );
    }
}
