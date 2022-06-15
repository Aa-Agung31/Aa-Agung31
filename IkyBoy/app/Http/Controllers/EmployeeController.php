<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = employee::all();
        return view('dataproduct', compact('data'));
    }
    public function tambahproduct()
    {
        return view('tambahproduct');
    }
    public function insertproduct(request $request)
    {
        $data = Employee::create($request->all());
        if($request->hasfile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('product')->with('success','Data Berhasil Di Tambahkan');
    }
    public function tampilkanproduct($id)
    {
        $data = Employee::find($id);
        return view('tampilkanproduct', compact('data'));
    }
    public function updateproduct(request $request, $id)
    {
        $data = Employee::find($id);
        $data -> update($request->all());
        return redirect()->route('product')->with('success','Data Berhasil Di Update');
    }
    public function deleteproduct($id)
    {
        $data = Employee::find($id);
        $data -> delete();
        return redirect()->route('product')->with('success','Data Berhasil Di Hapus');
    }
}

