<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EntregaLineasExcel implements FromCollection, WithHeadings
{
    protected $entrega;
    protected $fields;
    protected $columnNames;

    public function __construct($entrega, $fields, $columnNames)
    {
        $this->entrega = $entrega;
        $this->fields = $fields;
        $this->columnNames = $columnNames;
    }

    public function collection()
    {
        return $this->entrega->map(function ($item) {
            return collect($item)->only($this->fields)->values()->toArray();
        });
    }
    
    public function headings(): array
    {
        return $this->columnNames;
    }
}
