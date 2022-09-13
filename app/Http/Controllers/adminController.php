<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\kunjungan;
use Illuminate\Http\Request;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }


    public function riwayat()
    {
        return redirect()->route('requestkunjungan');
    }

    public function kunjungan()
    {
        $kunjungan = kunjungan::all();
        return view('admin.request_kunjungan', compact('kunjungan'));
    }

    public function showriwayat($id)
    {
        $where = array('id' => $id);
        $kunjungan = kunjungan::findOrFail($where);
        return view('admin.konfimasi', compact('kunjungan'));
    }

    public function updateriwayat(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);
        $where = array('id' => $id);
        $kunjungan = kunjungan::where($where)->first();
        $kunjungan->status = $request->status;
        $kunjungan->update();
        // dd($kunjungan);
        if ($kunjungan) {
            return redirect()->route('requestkunjungan')->with('status', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('requestkunjungan')->with('status', 'Data Gagal Diupdate');
        }
    }



}

