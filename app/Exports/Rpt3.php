<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use App\Archivo;
class Rpt3 implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($fi,$ff) {
        $this->fi = $fi;
        $this->ff = $ff;
    }
    public function view(): View
    {
        //dd($this->ff);
        $ini=Carbon::parse($this->fi)->format('Y-m-d');
        $fin=Carbon::parse($this->ff)->format('Y-m-d');
        //dd($fin);
        $data=Archivo::whereBetween('created_at', [$ini,$fin])->orderBy('created_at', 'ASC')->get();
        //dd($data);
        return view('server.reports.excel.rpt3', [
            'invoices' => $data
        ]);
    }
}
