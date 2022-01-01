<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends Controller
{
    public function __invoke(Request $request, $id): JsonResponse
    {
        $product = QueryBuilder::for(
            Product::class
        )->firstOrFail($id);

        return new JsonResponse(
            data: new ProductResource($product),
            status: Response::HTTP_OK
        );
    }
}
