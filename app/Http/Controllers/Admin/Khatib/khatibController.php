<?php

namespace App\Http\Controllers\Admin\Khatib;
use Illuminate\Support\Str;
use App\Models\khatib;
use Illuminate\Http\Request;
use App\Models\jadwal_khatib;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class khatibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $khatib = jadwal_khatib::all();
        return view('admin.Khatib.listKhatib',compact('khatib'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Khatib.add_khatib');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'khatib_profile_path' => 'nullable|max:5000',
            'tanggal' => 'nullable|date_format:d/m/Y',

        ]);

        if ($request->hasfile('images')) {
            $images = $request->file('images');

            $length = 20;
            $name = auth()->user()->id . '-' . str::random($length) . '.' . $images->extension();
            $path = $images->storeAs('photo-khatib', $name, 'public');


            $khatib = khatib::create([
                'nama' => $request->nama,
                'khatib_profile_path' => $path,
            ]);
            $khatib->save();
            $id_khatib = $khatib->id;




            $tanggal = jadwal_khatib::create([
                'tanggal' => $request->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d'),
                'khatib_id' => $id_khatib,
            ]);
            $tanggal->save();

            
        }else{
            
            $khatib = khatib::create([
                'nama' => $request->nama,
            ]);
            $khatib->save();
            $id_khatib = $khatib->id;




            $tanggal = jadwal_khatib::create([
                'tanggal' => $request->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d'),
                'khatib_id' => $id_khatib,
            ]);
            $tanggal->save();
        }
        Alert::success('Tambah Data', 'Data Berhasil Di Tambah');
            return redirect('/admin/khatib');
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
