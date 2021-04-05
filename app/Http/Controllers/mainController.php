<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\User;

class mainController extends Controller
{
    public function products(){
        return response()->json(Products::paginate(55));
    }

    public function productById($id){
        $notes = Products::find($id);
        if(is_null($notes)){
            return response()->json(['status code' => 404, 'status text' => 'Note not found', 'message' => 'Note not found'], 404);
        }
        return response()->json([$notes], 200);
    }

    public function search(Request $request){
        $search = $request->get('q');
        return Products::search($search)->get();
    }

    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('user.personal'));
        }
        $validateFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(User::where('email', $validateFields['email'])->exists()){
            return redirect(route('/'))->withErrors([
                'email' => 'Такой email уже зарегистрирован'
            ]);
        }

        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect(route('user.personal'));
        }

        return redirect(route('user.personal'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }
    public function init(){
        $user = Auth::user();
        return response()->json($user);
    }

    public function login(Request $request)
    {
        if(Auth::check()){
            return redirect()->intended(route('user.personal'));
        }
        $formFields = $request->only(['email', 'password']);
       if(Auth::attempt($formFields))
       {
           return redirect()->intended(route('user.personal'));
       }
       else{
            return redirect(route('/'))->withErrors([
                'email' => 'Ошибка при авторизации'
            ]);
       }
    }

    public function register(Request $request){
        $user = User::where('email', $request->email)->first();

        if(isset($user->id)){
            return response()->json(['error' => 'Username already exists']);
        }
        $user = new User();

        $user->username = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        return response()->json($user);
           
    }
    
    public function logout(Request $request){
        Auth::logout();
    }
}
