<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = artikel::get();
        return view('admin.Artikel.Listartikel', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Artikel.add_artikel');
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
            DB::transaction(function () use($request) {
                $artikel = new artikel();
                $artikel->fill($request->all());
                $artikel->save();
            });

            return redirect()->route('artikel.index')->with(['success'=>'Berhasil menambahkan artikel']);
        } catch(Exception $e){
            report($e->getMessage());

            return redirect()->back()->withErrors(['error'=>'Terjadi error'])->withInput();
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
        $data = artikel::select($id)->first();

        return view('admin.Artikel.edit_artikel', $data);
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
                $artikel = new artikel();
                $artikel->select('id', $id)->first();
                $artikel->fill($request->all());
                $artikel->save();
            });

            return redirect()->route('artikel.index')->with(['success'=>'Berhasil memperbarui artikel']);
        } catch (Exception $e){
            report($e->getMessage());

            return redirect()->back()->withErrors(['error'=>'Gagal memperbarui artikel']);
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
        $artikel = new artikel();
        $artikel->delete();

        return redirect()->route('artikel.index')->with(['success'=>'Artikel berhasil dihapus']);
    }
}
