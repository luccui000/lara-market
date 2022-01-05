<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $user = QueryBuilder::for(subject: User::class)
            ->where('email', strval(data_get($request->validated(), 'email')))
            ->first();
        if (! $user || ! Hash::check(data_get($request->validated(), 'password'), $user->password)) {
            return new JsonResponse(
                data: ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]),status: Response::HTTP_BAD_REQUEST
            );
        }
        $token = $user->createToken('developer');
        return new JsonResponse(
            data: [
                'token' => $token->plainTextToken
            ],
            status: Response::HTTP_OK
        );
    }
    public function verifiedToken(LoginRequest $request)
    {
        $user = QueryBuilder::for(subject: User::class)
            ->where('email', $request->validated()->email)
            ->first();

        dd($user);
    }
}
