<?php

namespace App\Exports;

use App\Models\Rekappangkal;
use Maatwebsite\Excel\Concerns\FromCollection;

class PangkalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rekappangkal::all();
    }
}
