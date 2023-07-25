<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use App\User;
class Rpt2 implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($fi,$ff,$rol) {
        $this->fi = $fi;
        $this->ff = $ff;
        $this->rol = $rol;
    }
    public function view(): View
    {
        //dd($this->ff);
        $ini=Carbon::parse($this->fi)->format('Y-m-d');
        $fin=Carbon::parse($this->ff)->format('Y-m-d');
        $tipo=$this->rol;
        //dd($fin);
        $data=User::whereBetween('created_at', [$ini,$fin])->where('tipo',$tipo)->orderBy('created_at', 'ASC')->get();
        //dd($data);
        return view('server.reports.excel.rpt2', [
            'invoices' => $data
        ]);
    }
}
