<?php

namespace App\Http\Controllers\Admin\Kas_Masjid;

use Carbon\Carbon;
use App\Models\User;
use App\Models\kas_masjid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
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
        // $pemasukan = kas_masjid::all();
      
        return view('admin.Kas_Masjid.pemasukan');
        
    }

    public function datapemasukan()
    {
       
        $pemasukan = kas_masjid::join('users', 'users.id', '=', 'kas_masjids.user_id')->where('jenis', "masuk")->orderBy('tanggal','asc')->get(['users.name','kas_masjids.*']);
      
        return response()->json([
            'pemasukan' => $pemasukan,
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
        
        $validator = validator::make($request->all(), [
            'keterangan' => 'required|max:100',
            'pemasukan' => 'required',
            'tanggal' => 'required',
        ], [
            'keterangan.required' => 'Keterangan Harus Di Isi',
            'pemasukan.required' => 'Pemasukan Harus Di Isi',
            'tanggal.required' => 'Tanggal Harus Di Isi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),

            ]);
        } else {
            // menghilangkan string selain angka
            $angka = $request->pemasukan;
            $result = preg_replace("/[^0-9]/", "", $angka);
            // Format Tanggal Masuk

            $data_masuk = new kas_masjid;
            $data_masuk->keterangan = $request->input('keterangan');
            $data_masuk->pemasukan = $result;
            $data_masuk->pengeluaran = 0;
            // $data_masuk->tanggal = $request->input('tanggal');
            $data_masuk->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d');
            $data_masuk->jenis = 'masuk';
            $data_masuk->user_id = Auth::user()->id;
            $data_masuk->save();
            return response()->json([
                'status' => 200,
                'message' => 'Tambah Data Pemasukan Berhasil',

            ]);
        }
        // return redirect('/kas-masjid/pemasukan');






        // return kas_masjid::create([
        //         'keterangan' => $request['keterangan'],
        //         'pemasukan' => $result,
        //         'pengeluaran' => '0',
        //         'tanggal' => $request['tanggal'],
        //         'jenis' => 'masuk',
        //     ]);

        // Alert::success('Tambah Data', 'Berhasil Menambah Data');


        // kas_masjid::create($request->all());

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
        $edit_data_pemasukan = kas_masjid::find($id);
        if ($edit_data_pemasukan) {
            return response()->json([
                'status' => 200,
                'data_edit' => $edit_data_pemasukan,

            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ditemukan',

            ]);
        }
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
        $validator = validator::make($request->all(), [
            'keterangan' => 'required|max:100',
            'pemasukan' => 'required',
            'tanggal' => 'required',
        ], [
            'keterangan.required' => 'Keterangan Harus Di Isi',
            'pemasukan.required' => 'Pemasukan Harus Di Isi',
            'tanggal.required' => 'Tanggal Harus Di Isi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {

            // menghilangkan string selain angka
            $angka = $request->pemasukan;
            $result = preg_replace("/[^0-9]/", "", $angka);
                // Format Tanggal Masuk  
            
            $data_edit = kas_masjid::find($id);         
            if ($data_edit) {                  
                $data_edit->keterangan = $request->input('keterangan');
                $data_edit->pemasukan = $result;
                $data_edit->pengeluaran = 0;
                // $data_edit->tanggal = $request->input('tanggal');
                $data_edit->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d');
                $data_edit->jenis = 'masuk';
                $data_edit->user_id = Auth::user()->id;
                $data_edit->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Edit Data Pemasukan Berhasil',
                ]);
            } else 
            {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',

                ]);
            }
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
        $data_delete = kas_masjid::find($id);
        $data_delete->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Hapus Data Berhasil',
            ]);
        
    }
}
