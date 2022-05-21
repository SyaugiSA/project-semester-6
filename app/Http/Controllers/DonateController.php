<?php

namespace App\Http\Controllers;

use App\Models\donasi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = donasi::get();
        return view('User.halaman.donate', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::transaction(function() use($request){
                $donate = new donasi();
                $donate->fill($request->all());
                $donate->is_actived = $request->has('is_active')?1:0;
                $donate->save();
            });

            return redirect()->route('donate.index')->with(['success'=>'Berhasil menambahkan donasi']);
        }catch (Exception $e){
            report($e->getMessage());
            return redirect()->back()->withErrors(['error'=>'Terjadi kesalahan'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = donasi::select('id', $id)->first();
        return view('User.halaman.donation-detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = donasi::select('id', $id)->first();
        return view('', $data);
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
        try{
            DB::transaction(function() use($request, $id){
                $donate = new donasi();
                $donate->select('id', $id);
                $donate->fill($request->all());
                $donate->is_actived = $request->has('is_active')?1:0;
                $donate->save();
            });

            return redirect()->route('donate.index')->with(['success'=>'Behasil memperbarui donasi']);
        } catch (Exception $e){
            report($e->getMessage());
            return redirect()->back()->withErrors(['error'=>'Terjadi Error'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donate = new donasi();
        $donate->select('id', $id);
        $donate->delete();

        return redirect()->route('donate.index')->with(['success'=>'Berhasil menghapus donasi']);
    }
}
