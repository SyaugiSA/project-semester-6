<?php

namespace App\Http\Controllers\Admin\Kas_Masjid;

use App\Models\saldo;
use App\Models\kas_masjid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $saldo = saldo::orderBy('tanggal','asc')->first();
        if (!$saldo) {
            $saldo = (array)$saldo;
            $saldo['saldo'] = 0;
            $saldo = (object)$saldo;
        }
        $rekap = kas_masjid::orderBy('tanggal','asc')->get();
        return view('admin.Kas_Masjid.rekap',compact('rekap','saldo'));
        
    }
    function datarekap(){
        $data_rkp = kas_masjid::orderBy('tanggal','asc')->get();
        return response()->json([
            'rekap' => $data_rkp 
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
