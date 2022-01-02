<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $orders = QueryBuilder::for(subject: Order::class)
            ->with('customer')
            ->paginate();

        return new JsonResponse(
            OrderResource::collection(
                resource: $orders
            ),
            status: Response::HTTP_OK
        );
    }
}
