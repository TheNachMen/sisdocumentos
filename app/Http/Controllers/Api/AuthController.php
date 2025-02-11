<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class AuthController extends Controller
{
    public function register(Request $request){
        //inicializa un array con estado por defecto como falsa
        $response = ["success" => false];
        
        //recuperar los datos enviados(nombre, email, contraseña)
        $input =$request->all();
        
        //hashear la contraseña 
        $input["password"] = bcrypt($input["password"]);
        
        //creamos el usuario
        $user = User::create($input);
        //Asignamos el rol de Admnistrados creado en RoleSeeder.php
        $user->assignRole("Administrador");
        
        //cambia el estado a verdadero
        $response["success"] = true;
        //genera un token de acceso personal
        $response["token"] = $user->createToken("doc.app")->plainTextToken;

        //devuelve la respuesta como un objeto JSON incluyendo el estado y el token generado
        return response()->json($response,200);
    }
    public function login(Request $request){
        //inicializa un array con estado por defecto como falsa
        $response = ["success"=>false];

        //validacion de los datos entrantes
        $validator = Validator::make($request->all(), [
            "email"=> "required|email",
            "password"=> "required"
        ]);
        //verificar si la validacion fallo
        if($validator->fails()){
            $response = ["error"=>$validator->errors()];
            return response()->json($response,200);
        }
        //intenta autenticar al usuario utilizando los datos recibidos
        if(auth()->attempt(['email'=>$request->email, 'password'=> $request->password])) {
            //recupera el objeto del usuario autenticado
            $user = auth()->user();
            //verificar si tiene el rol de administrador 
            $user->hasRole('Administrador'); 
            //se crea un token de sanctum para el usuario
            $response['token'] = $user->createToken('documento.app')->plainTextToken;
            $response['user'] = $user;
            $response['sucess'] = true;
        }
        //retornamos la respuesta en JSON
        return response()->json($response,200);
    }

    public function logout(Request $request){
        $response = ['success'=>false];
        //borra los token del usuario para cerrar la sesion
        auth()->user()->tokens()->delete();
        $response = [
            'success'=>true,
            'message'=>'Sesion cerrada'
        ]; 
        return response()->json($response,200);
    }
}
