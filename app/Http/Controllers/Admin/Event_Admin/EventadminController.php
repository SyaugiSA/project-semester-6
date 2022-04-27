<?php

namespace App\Http\Controllers\Admin\Event_Admin;


use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\event;
use App\Models\photo_event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class EventadminController extends Controller
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
        $data = event::all();
        return view('admin.Eventt.Listevent', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Eventt.add_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'judul' => 'required|string|max:200',
            'tanggal' => 'required|date_format:d/m/Y',
            'deskripsi' => 'required|string|max:300',
        ]);

        $event = event::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d'),
            'deskripsi' => $request->deskripsi,
        ]);
        $event->save();
        $id_event = $event->id;



        // $photo = $request->file('images')->extension();

        // dd($request->image);
        // if ($request->hasfile('images')) {
        //     $images = $request->file('images');
        //     dd($images);
        //     // dd($photo);
        //     foreach( $images as $image) {
        //         $length = 25;
        //         $name = Str::random($length);
        //         $newFileName = auth()->user()->id . '-' . $name . '.' . $image;
        //         $this->validate($request, ['image' => 'required|file|max:5000']);
        //         $path = Storage::putFileAs('public/photo-event/', $request->file('image'), $newFileName);            //pindah foto ke folder profile-photo di storage
        //         // Storage::putFileAs('profile-photo/', $request->image ,$newFileName);


        //         //simpan nama ke database

        //         $save = photo_event::create([
        //             'photo_event_path' => 'photo-event/' . $newFileName,
        //             'event_id' => $id_event,
        //         ]);
        //         $save->save();
        //     }
        // }




        $request->validate([
            'images' => 'required|max:5000',
        ]);

        //   dd($request->File('images'));
        if ($request->hasfile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $length = 20;
                $name = auth()->user()->id . '-' . str::random($length) . '.' . $image->extension();
                $path = $image->storeAs('photo-event', $name, 'public');

                photo_event::create([
                    'photo_event_path' => $path,
                    'event_id' => $id_event,
                ]);
            }
        }



        Alert::success('Tambah Data', 'Data Berhasil Di Tambah');
        return redirect('/admin/event');
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
        $edit = event::findorfail($id);
        return view('admin.Eventt.edit_event', compact('edit'));
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
            'judul' => 'required|string|max:200',
            'tanggal' => 'required|date_format:d/m/Y',
            'deskripsi' => 'required|string|max:300',
        ]);

        $event = event::find($id);
        if ($event) {
            $event->judul = $request->judul;
            $event->tanggal =  Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d');
            $event->deskripsi = $request->deskripsi;

            $event->update();
            $id_event = $event->id;
        }


        $request->validate([
            'images' => 'required|max:5000',
        ]);

        //   dd($request->File('images'));

        $data_update = event::findorfail($id);
        $photo = $data_update->photo()->get('photo_event_path');
        // dd($photo);


        foreach ($photo as $p) {
            // dd($p);
            //    $remove = str::remove('"','}', $p);
            Storage::disk('local')->delete('public/photo-event/' . basename($p['photo_event_path']));
            // dd(basename($p['photo_event_path']));
        }


        if ($request->hasfile('images')) {

            $images = $request->file('images');
            $length = 20;
            
            $photos_data = event::findorfail($id);
            $photos_edit = $photos_data->photo()->get('id');    // Ambil list id photo event
            $photo_event_index = 0; // index id pada list
        
            foreach ($images as $image) {
                $name = auth()->user()->id . '-' . str::random($length) . '.' . $image->extension();
                $path = $image->storeAs('photo-event', $name, 'public');
        
                // Update photo event berdasarkan id pada photo list di photos_edit
                photo_event::where('id', $photos_edit[$photo_event_index]->id)
                ->update([
                    'photo_event_path' => $path,
                    'event_id' => $id_event,
                ]);
        
                $photo_event_index += 1; // Update index list
        
            }
        }
        
        
        

        Alert::success('Edit Data', 'Data Berhasil Di Edit');
        return redirect('/admin/event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $data = event::findorfail($id);
        $photo = $data->photo()->get('photo_event_path');
        // dd($photo);


        foreach ($photo as $p) {
            // dd($p);
            //    $remove = str::remove('"','}', $p);
            Storage::disk('local')->delete('public/photo-event/' . basename($p['photo_event_path']));
            // dd(basename($p['photo_event_path']));
        }

        $data->delete();
        Alert::success('Menghapus data', 'Data Berhasil Di Hapus');
        return redirect('/admin/event');
    }
}
