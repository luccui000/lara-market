<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;


class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $product = QueryBuilder::for(Product::class)
            ->join('categories' , 'products.category_id', 'categories.id')
            ->allowedFilters(['name', 'categories.name'])
            ->paginate();
        return new JsonResponse(
            ProductResource::collection($product),
            Response::HTTP_OK
        );
    }
}
