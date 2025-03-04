<?php

namespace App\Exports;

use App\Models\Attendances;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AttendancesExport implements FromView
{
    public $month;
    public $year;

    public function __construct($month = null, $year = null)
    {
        $this->month = $month;
        $this->year = $year;
    }


    public function view(): View
    {
        $query = Attendances::query();

        if ($this->month && $this->year) {
            $query->whereYear('created_at', $this->year)
                  ->whereMonth('created_at', $this->month);
        }

        return view('dashboard.menu.presensi.export.exel.index', [
            'attendances' => $query->get()
        ]);
    }
}
