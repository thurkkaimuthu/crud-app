<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use App\Models\appuser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class appuserController extends Controller
{
    public function index(){
        return view('AppUser.index');
    }
    public function login(){
        return view('AppUser.login');
    }
    public function register(){
        return view('AppUser.register');
    }
    public function addUser(Request $request){
        $data = $request->validate(
            [
                'name' => 'required',
                'password' => 'required|min:6',
                'age' => 'required',
                'city_present' => 'required',
                'city_permanent' => 'required',
                'country' => 'required'
            ]
            );
            $newUser = appuser::create($data);
            return redirect(route('AppUser.index'));
    }

        public function verifyuser(Request $request){
            $request->validate([
                'name' => 'required|string',
                'password' => 'required',
            ]);
        
            $user = appuser::where('name', $request->input('name'))->first();
            
            if ($user && $user->password === $request->input('password')) {
                return redirect(route('AppUser.dummy'));
            }
    
            return back()->withErrors([
                'login_error' => 'Invalid username or password.',
            ]);
        }

        public function dummy(){
            return view('AppUser.dummy');
        }
    

}
