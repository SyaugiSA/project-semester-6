<?php

namespace App\Http\Controllers\Admin\Takmir_Masjid;

use App\Http\Controllers\Controller;
use App\Models\jabatan;
use App\Models\takmir;
use App\Models\takmir_jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TakmirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    

    public function index()
    {
        // $jabatan = takmir_jabatan::get('id');

        $takmir = takmir::all();

        
        // dd($takmir);
        return view('admin.Takmir_Masjid.listTakmir',compact('takmir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Takmir_Masjid.add_takmir');
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
            'nama' => 'required|string|min:3|max:100',
            'alamat' => 'required|string|min:3|max:400',
            'nomor' => 'required|string|numeric|min:12',
            'jabatan'=> 'in:ketua takmir,wakil ketua,bendahara,sekretaris,kebersihan,humas,imam,ustadz,muadzin,penasehat,khatib,remas,ubudiyah,pelindung',
        ],[
            'jabatan.in' => 'Bidang Harus Di isi'
        ]);

        // $jabatan = jabatan::create([
        //     'jabatan' => $request->jabatan,
        // ]);
        // $jabatan->save();

        $jabatan = jabatan::where('jabatan', $request->jabatan)->pluck('id')[0];
       
        
        // dd($jabatan);
        $takmir = takmir::create([
            'nama'=>$request->nama,
            'alamat' =>$request->alamat,
            'nomor' => $request->nomor,
            'jabatan_id' => $jabatan,
        ]);
        $takmir->save();



        

        Alert::success('Tambah Data Takmir', 'Data Berhasil Di Tambah');
        return redirect('/admin/takmir');



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
        $edit = takmir::find($id);
        return view('admin.Takmir_Masjid.edit_takmir',compact('edit'));
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
        $request->validate([
            'nama' => 'required|string|min:3|max:100',
            'alamat' => 'required|string|min:3|max:400',
            'nomor' => 'required|string|numeric|min:12',
            'jabatan'=> 'in:ketua takmir,wakil ketua,bendahara,sekretaris,kebersihan,humas
            ,imam,ustadz,muadzin,penasehat,khatib,remas,ubudiyah,pelindung',
        ],[
            'jabatan.in' => 'Bidang Harus Di isi'
        ]);

        $jabatan = jabatan::where('jabatan', $request->jabatan)->pluck('id')[0];
       
        
        // dd($jabatan);

        $takmir = takmir::find($id)->update([
            'nama'=>$request->nama,
            'alamat' =>$request->alamat,
            'nomor' => $request->nomor,
            'jabatan_id' => $jabatan,
        ]);

        Alert::success('Edit Data', 'Data Berhasil Di Edit');
        return redirect('/admin/takmir')->with('edit', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete =  takmir::find($id);
            $delete->delete();
            Alert::success('Menghapus Data', 'Data Berhasil Di Hapus');
            return redirect('/admin/takmir');
    }
}
