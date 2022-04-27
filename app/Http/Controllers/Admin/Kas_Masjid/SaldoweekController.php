<?php

namespace App\Http\Controllers\Admin\Kas_Masjid;

use App\Models\saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SaldoweekController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Kas_Masjid.saldo');
    }


    public function datasaldo()
    {
        $saldo = saldo::join('users', 'users.id', '=', 'saldos.user_id')->orderBy('tanggal','asc')->get(['users.name', 'saldos.*']);
        return response()->json([
            'saldo' => $saldo,
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
            'saldo' => 'required',
            'tanggal' => 'required',
        ], [
            'keterangan.required' => 'Keterangan Harus Di Isi',
            'saldo.required' => 'Saldo Harus Di Isi',
            'tanggal.required' => 'Tanggal Harus Di Isi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),

            ]);
        } else {
            // menghilangkan string selain angka
            $angka = $request->saldo;
            $result = preg_replace("/[^0-9]/", "", $angka);
            // Format Tanggal Masuk

            $data_masuk = new saldo;
            $data_masuk->keterangan = $request->input('keterangan');
            $data_masuk->saldo = $result;
            // $data_masuk->tanggal = $request->input('tanggal');
            $data_masuk->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d');
            $data_masuk->user_id = Auth::user()->id;
            $data_masuk->save();
            return response()->json([
                'status' => 200,
                'message' => 'Tambah Data Saldo Berhasil',

            ]);
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
        $edit_data_saldo = saldo::find($id);
        if ($edit_data_saldo) {
            return response()->json([
                'status' => 200,
                'data_edit_saldo' => $edit_data_saldo,

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
            'saldo' => 'required',
            'tanggal' => 'required',
        ], [
            'keterangan.required' => 'Keterangan Harus Di Isi',
            'saldo.required' => 'saldo Harus Di Isi',
            'tanggal.required' => 'Tanggal Harus Di Isi',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {

            // menghilangkan string selain angka
            $angka = $request->saldo;
            $result = preg_replace("/[^0-9]/", "", $angka);
            // Format Tanggal Masuk  

            $data_edit = saldo::find($id);
            if ($data_edit) {
                $data_edit->keterangan = $request->input('keterangan');
                $data_edit->saldo = $result;
                // $data_edit->tanggal = $request->input('tanggal');
                $data_edit->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d');
                $data_edit->user_id = Auth::user()->id;
                $data_edit->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Edit Data Saldo Berhasil',
                ]);
            } else {
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
        $data_delete = saldo::find($id);
        $data_delete->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Hapus Data Berhasil',
        ]);
    }
}
