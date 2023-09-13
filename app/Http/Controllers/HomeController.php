<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\PasswordDiary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function index()
    {
        $diary = PasswordDiary::get();
        return Inertia::render('Dashboard', ['diary' => $diary]);
    }

    public function addpassword(Request $request)
    {
        if($request->url){
        $hasla = PasswordDiary::create($request->all());
        $hasla->token = Hash::make($request->token);
        $hasla->password = Crypt::encrypt($request->password); //AES Encryption
        $hasla->save();
        $diary = PasswordDiary::get();
        return Inertia::render('Dashboard', ['diary' => $diary]);
        } else
        {
            $diary = PasswordDiary::get();
            return Inertia::render('Dashboard', ['diary' => $diary]);
        }
    }

    public function showpassword(Request $request)
    {
        $diary = PasswordDiary::get();
        if(Hash::check($request->passwordauth,Auth::user()->password))
        {
            $dziennik = clone $diary;
            foreach ($dziennik as $value) {
            $value->password = Crypt::decrypt($value->password);
            }
        return Inertia::render('Dashboard2', ['diary' => $dziennik]);
        } else return Inertia::render('Dashboard', ['diary' => $diary]);
    }
}
