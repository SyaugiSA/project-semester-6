<?php

namespace App\Http\Controllers\Admin\Photo_Masjid;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\photoGalery;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class PhotoController extends Controller
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
        $photo = photoGalery::all();
        return view('admin.Photo_Masjid.galeryPhoto',compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.Photo_Masjid.addPhoto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $photo = $request->image;
        $photo = $request->file('image')->extension();
        if ($request->image != null) {
            // dd($photo);
            $length = 25;
            $name = Str::random($length);
            $newFileName = auth()->user()->id . '-' . $name . '.' . $photo;
            $this->validate($request, ['image' => 'required|file|max:5000']);
            $path = Storage::putFileAs('public/photo-masjid/', $request->file('image'), $newFileName);            //pindah foto ke folder profile-photo di storage
            // Storage::putFileAs('profile-photo/', $request->image ,$newFileName);


            //simpan nama ke database

           $save = photoGalery::create([
                'photo_galery_path' => 'photo-masjid/' . $newFileName,
            ]);
            $save->save();

            Alert::success('Tambah Foto', 'Tambah Foto Berhasil');
            return redirect('/admin/photos');
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

     
        // $data = photoGalery::findorfail($id);
        // $image_path = public_path('/photo_masjid/') . $data->photo_galery_path;
        //     if($image_path != ''){
        //             @unlink($image_path);
        //     }
            
        // $data->delete();
        $data = photoGalery::findorfail($id);
        Storage::disk('local')->delete('public/photo-masjid/'.basename($data->photo_galery_path));
         $data->delete();
        
        Alert::success('Menghapus Foto', 'Foto Berhasil Di Hapus');
        return redirect('/admin/photos');
        
        
    }
}
