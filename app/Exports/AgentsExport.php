<?php

namespace App\Exports;

use App\agents;
use Maatwebsite\Excel\Concerns\FromCollection;

class AgentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return agents::all();
        //return agents::select('invoice_number', 'invoice_Date', 'Due_date','Section', 'product', 'Amount_collection','Amount_Commission', 'Rate_VAT', 'Value_VAT','Total', 'Status', 'Payment_Date','note')->get();

    }
}
