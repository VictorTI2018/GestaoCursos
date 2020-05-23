<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\User\UserRepository;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Tymon\JWTAuth\JWTAuth;

class LoginController extends Controller
{

    /** @var \App\Repository\User\UserRepository */
    protected $userRepository;

    /** @var \Tymon\JWTAuth\JWTAuth */
    protected $jwt;

    public function __construct(JWTAuth $jwt, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->jwt = $jwt;
    }

    /**
     * Validar credenciais
     *
     * @param Request $request
     * @return array
     */
    private function loginCredentials(Request $request): array
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "validator" => true,
                "message" => $validator->errors()
            ], 401);
        }
        return [
            'email' => $request->post('email'),
            'password' => $request->post('password')
        ];
    }

    /**
     * Autenticar Usuario
     *
     * @param Request $request
     * @return void
     */
    private function authenticate(Request $request)
    {
        $credentials = $this->loginCredentials($request);
        if (!($token = $this->jwt->attempt($credentials))) {
            return false;
        }
        return  $token;
    }

    /**
     * Retornar Usuario e token
     *
     * @param User $user
     * @param string $token
     * @return void
     */
    private function responseWithToken(User $user, $token = '')
    {
        return ['user' => $user, 'token' => $token];
    }

    public function login(Request $request)
    {
        $user = $this->userRepository->findByKey("email", $request->post("email"));
        $token = $this->authenticate($request);
        return  $this->responseWithToken($user, $token);
    }
}
