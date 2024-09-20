<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function register(UserRegisterRequest $request): UserResource
    {
        // cek validasi
        $data = $request->validated();

        // cek jika username sudah ada di DB
        if(User::where('username', $data['username'])->exists()){
            //ada di database
        }

        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return new UserResource($user);
    }
}
