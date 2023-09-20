<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Node\Stmt\TryCatch;
//use Illuminate\Routing\Controller as BaseController;

class UsersController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    public function show(Request $request){
        try {
            $users = User::all();
            return response()->json($users, 200);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while show for the users'], 500);
        }
    }

    public function search(Request $request, $id){
        try {
            $users = User::find($id);
            return response()->json($users, 200);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while search for the users'], 500);
        }
    }

    public function create(Request $request){
        try {

            $users = User::create(
                [ 'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))]
            );



            return response()->json($users, 201);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while create for the users'], 500);
        }
    }

    public function update(Request $request){
        try {
            $users = User::find( $request->id );
            $users->titulo = $request->input('name');
            $users->conteudo = $request->input('email');
            $users->conteudo = $request->input('password');

            return response()->json(['error'=>'Error while update for the users', 200]);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while show for the users'], 500);
        }
    }
    public function destroy(){
        try {
            echo 'Hello, World!';
        } catch (\Exception $e) {
            return response()->json(['error'=>'Error while show for the users'], 500);
        }
    }

}
