<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\saldo;
use App\Models\kas_masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }
    public function index()
    {   
        // $saldo = saldo::whereBetween('tanggal', [Carbon::now()->subDay(6)->format('Y-m-d'), Carbon::now()->format('Y-m-d')])->get();
         $saldo = saldo::orderBy('tanggal','asc')->first();
        if (!$saldo) {
            $saldo = (array)$saldo;
            $saldo['saldo'] = 0;
            $saldo = (object)$saldo;
        }
        //  $home = kas_masjid::whereBetween('tanggal', [Carbon::now()->subDay(6)->format('Y-m-d'), Carbon::now()->format('Y-m-d')])->orderBy('tanggal', 'asc')->get();
         $home = kas_masjid::all();
         $user = User::all();                
        //  dd($saldo);
         return view('admin.partials.home',compact('home','user','saldo'));
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
