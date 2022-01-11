<?php

namespace App\Http\Controllers\Api\Crawler;

use App\Crawlers\ProductCrawler;
use App\Enums\EcommerceWeb;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $url = $request->get('url');
        $hostUrl = parse_url($url)['host'];

        abort_if(!in_array($hostUrl, EcommerceWeb::toArray()), Response::HTTP_BAD_REQUEST);

        $dataScraper = ProductCrawler::craw($url, $hostUrl);
        dd($dataScraper->toArray());

        return new JsonResponse(
            data: [],
            status: Response::HTTP_OK
        );
    }
}
