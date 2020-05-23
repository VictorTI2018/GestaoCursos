<?php

namespace App\Http\Controllers\User;

use App\Repository\User\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /** @var \App\Repository\User\UserRepository */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "validator" => true,
                "message" => $validator->errors()
            ], 401);
        }
        $data = $request->all();
        if ($this->userRepository->insert($data)) {
            return response()->json([
                "status" => true
            ], 200);
        }
    }
}
