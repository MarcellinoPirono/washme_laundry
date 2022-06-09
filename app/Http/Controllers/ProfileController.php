<?php

namespace App\Http\Controllers;

use App\Models\Users;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pengaturan', [
            "title" => "Pengaturan"
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $id = auth()->user()->id;
        // $Users = DB::table('users')->where('username', $data)->get();
        // dd($validate);

        $requestData = $request->all();
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/' . $path;

        $Users = Users::find($id);
        // dd($Users);
        $Users->username = $request->input('username');
        $Users->password = Hash::make($request->input('password'));
        $Users->foto_profil = $requestData["image"];
        // dd($Users);
        $Users->update();
        // dd($Users, $requestData);
        return redirect('/pengaturan')->with('success', 'Data berhasil diedit!');
    }
}
