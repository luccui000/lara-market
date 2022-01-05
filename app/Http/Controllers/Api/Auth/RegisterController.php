<?php

namespace App\Http\Controllers\Api\Auth;

use App\Actions\Users\Create;
use App\Factories\UserFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $user = Create::handle(
            UserFactory::make($request->validated())
        );
        $token = $user->createToken('developer')->plainTextToken;
        return new JsonResponse(
            data: [
                'token' => $token
            ],
            status: Response::HTTP_CREATED
        );
    }
}
