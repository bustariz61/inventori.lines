<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class EntregaLineasExcel implements FromCollection
{
    protected $entrega;

    public function __construct($entrega)
    {
        $this->entrega = $entrega;
    }

    public function collection()
    {
        return $this->entrega;
    }
}
