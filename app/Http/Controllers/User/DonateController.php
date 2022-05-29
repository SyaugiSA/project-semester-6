<?php

namespace App\Http\Controllers\User;

use App\Models\donasi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Str;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = donasi::all();
        return view('User.halaman.donate', compact('data'));
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

        
        // menghilangkan string selain angka
        $angka = $request->jumlah;
        $result = preg_replace("/[^0-9]/", "", $angka);

        
        if ($request->pic != null) {
            $photo = $request->file('pic');
            $ext = $photo->extension();
            // $oldphoto = auth()->user()->profile_photo_path;
            // dd($oldphoto);
            // Storage::disk('local')->delete('public/profile-photo/'.basename($oldphoto));
            
            $length = 25 ;
            $name = Str::random($length);
            $newFileName = auth()->user()->id . '-'. $name .'.' .$ext;
            // $this->validate($request, ['image' => 'required|file|max:5000']);
            $path = $photo->storeAs('trans-photo', $newFileName, 'public');
            $transaksi = transaksi::create([
                'donasi_id' => $request->donate,
                'jumlah' => $result,
                'user_id' => auth()->user()->id,
                'bukti' => $path,
                'is_verified' => 0,
            ]);
        }
        return $transaksi;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = donasi::find($id)->first();
        $uID = auth()->user()->id;
        $user = user::find($uID);
        // dd($user);
        return view('User.halaman.donation-detail', compact('data','user'));
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
