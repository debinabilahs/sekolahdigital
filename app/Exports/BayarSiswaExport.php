<?php

namespace App\Exports;

use App\Models\Bayarsiswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class BayarSiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bayarsiswa::all();
    }
}
