<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserLoginRequest;
use App\User;

class UserController extends Controller
{
    public function index(){
        $test = ['123'];
        return $this->sendMessage($test);
    }

    public function register(UserStoreRequest $request){
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        if ($user) {
            $user->accessToken = $user->createToken('authToken')->accessToken;
            return $this->sendMessage("Usuário cadastrado com sucesso", $user);
        }

        return $this->sendError("Erro ao cadastrar usuario");
    }

    public function login(UserLoginRequest $request){
        $data = $request->validated();
        if (!Auth::attempt($data))
        {
            return $this->sendError("Usuário ou senha incorretos");
        }
        $user = Auth::user();
        $user->accessToken = $user->createToken('authToken')->accessToken;
        return $this->sendMessage("Usuário autenticado com sucesso", $user);
    }
}
