<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use App\Documento;
class Rpt1 implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($fi,$ff,$tipo,$us) {
        $this->fi = $fi;
        $this->ff = $ff;
        $this->tipo=$tipo;
        $this->user=$us;
    }
    public function view(): View
    {
        //dd($this->ff);
        $ini=Carbon::parse($this->fi)->format('Y-m-d');
        $fin=Carbon::parse($this->ff)->format('Y-m-d');
        $categoria=$this->tipo;
        $userfind=$this->user;
        //dd($fin);
        $data=Documento::whereBetween('created_at', [$ini,$fin])->where(['categoria_id'=>$categoria,'user_id'=>$userfind])->orderBy('created_at', 'ASC')->get();
        //dd($data);
        return view('server.reports.excel.rpt1', [
            'invoices' => $data
        ]);
    }
}
