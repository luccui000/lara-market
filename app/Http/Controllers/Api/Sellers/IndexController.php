<?php

namespace App\Http\Controllers\Api\Sellers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\SellerResource;
use App\Models\Seller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $seller = QueryBuilder::for(Seller::class)->get();

        return new JsonResponse(
            data: SellerResource::collection($seller),
            status: Response::HTTP_OK
        );
    }
}
