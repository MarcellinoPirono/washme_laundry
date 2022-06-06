<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataKasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data_kasir', [
            "title" => "Data Kasir",
            'users' => Users::where('is_admin', '0')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $Users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Users::find($id);
        $id->put();

        return redirect('data_kasir')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Users = Users::find($id);
        $Users->nama = $request->input('nama');
        $Users->username = $request->input('username');
        $Users->password = Hash::make($request->input('password'));
        $Users->gender = $request->input('gender');
        $Users->handphone = $request->input('handphone');
        $Users->alamat = $request->input('alamat');
        $Users->update();
        return redirect('/data_kasir')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // User::destroy($users->id);
        $Users = Users::find($id);
        $Users->delete();

        return redirect('data_kasir')->with('success', 'Data berhasil dihapus!');
    }
}
