<?php

namespace App\Http\Controllers\Admin\Laporan;





use Error;
use Carbon\Carbon;
use App\Models\saldo;
use App\Models\kas_masjid;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LapkasmasjidController extends Controller
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
        return view('admin.Laporan.Kas-Masjid.laporanKas_Masjid');
    }

       public function DownloadSemuapdf(){
        $saldo = saldo::orderBy('tanggal','asc')->first();
        if (!$saldo) {
            $saldo = (array)$saldo;
            $saldo['saldo'] = 0;
            $saldo = (object)$saldo;
        }
        $data = kas_masjid::all();
            return view('admin.Laporan.Kas-Masjid.download-pdf',compact('data','saldo'));
        }

   public function DownloadPeriode(Request $request){
            // dd(["Tanggal Awal = ".$request->tglawal, "Tanggal Akhir = ".$request->tglakhir]);
            // if($tglawal != "" && $tglakhir != ""){
            // $from = Carbon::createFromFormat('d-m-Y', $tglawal)->format('Y/m/d');
            // $to =  Carbon::createFromFormat('d-m-Y', $tglakhir)->format('Y/m/d');

            // $dataPeriode = kas_masjid::whereBetween('tanggal', [$from, $to])->orderBy('tanggal', 'asc')->get();
            // return view('admin.Laporan.Kas-Masjid.download-pdf-periode', compact('dataPeriode'));
            // }
            
                 $request->validate([
            'tglawal' => 'required',
            'tglakhir' => 'required',
        ],[
            'tglawal.required' => 'Tanggal Awal Harus Di Isi',
            'tglakhir.required' => 'Tanggal Akhir Harus Di Isi'
        ]);
            
           if( $request->tglawal != null && $request->tglakhir != null){
            $from = Carbon::createFromFormat('d-m-Y', $request->tglawal)->format('Y/m/d');
            $to = Carbon::createFromFormat('d-m-Y', $request->tglakhir)->format('Y/m/d');
            $saldo = saldo::where('tanggal', 'asc')->first();
            if (!$saldo) {
                $saldo = (array)$saldo;
                $saldo['saldo'] = 0;
                $saldo = (object)$saldo;
            }
            // dd($saldo);
            $dataPeriode = kas_masjid::whereBetween('tanggal',[$from,$to])->orderBy('tanggal','asc')->get();
                return view('admin.Laporan.Kas-Masjid.download-pdf-periode',compact('dataPeriode','saldo'));
           }
        


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
        //
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
