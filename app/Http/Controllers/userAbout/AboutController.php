<?php

namespace App\Http\Controllers\userAbout;

use App\Models\takmir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index(){
        $takmir = takmir::whereBetween('jabatan_id', [1, 4])-> orderby('id','asc')->get();
        

        // $ketua = takmir::with('jabatan')->get();
        $seksiKebersihan = takmir::where('jabatan_id',  '=' , '5')->get();
        $seksiHumas = takmir::where('jabatan_id','=','6')->get();
        $seksiImam = takmir::where('jabatan_id','=','7')->get();
        $seksiUstadz = takmir::where('jabatan_id','=','8')->get();
        $seksiMuadzin = takmir::where('jabatan_id','=','9')->get();
        $seksiPenasehat = takmir::where('jabatan_id','=','10')->get();
        $seksiKhatib = takmir::where('jabatan_id','=','11')->get();
        $seksiRemas = takmir::where('jabatan_id','=','12')->get();
        $seksiUbudiyah = takmir::where('jabatan_id','=','13')->get();
        $seksiPelindung = takmir::where('jabatan_id','=','14')->get();
        // dd($seksiKebersihan);
        return view('User.About Us.about',compact('takmir',
        'seksiKebersihan','seksiHumas','seksiImam',
        'seksiUstadz','seksiMuadzin','seksiPenasehat','seksiKhatib',
        'seksiRemas','seksiUbudiyah','seksiPelindung'));
    }
}
