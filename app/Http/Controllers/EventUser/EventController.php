<?php

namespace App\Http\Controllers\EventUser;

use App\Http\Controllers\Controller;
use App\Models\event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index(){

        $data = event::where('tanggal','>' ,Carbon::now())->orderby('tanggal','asc')->paginate(1);
        $event = event::orderby('tanggal','asc')->paginate(4);
        return view('User.About Us.event',compact('data','event'));
    }

    


    public function Show($id){
        // dd($id);
        $data = event::where('id',$id)->get();
        // dd($data);
        $event = event::orderby('tanggal','asc')->paginate(4);


        
        return view('User.About Us.event',compact('data','event'));
    }











}
