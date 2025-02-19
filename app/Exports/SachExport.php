<?php

namespace App\Exports;

use App\Models\Sach;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class SachExport implements FromQuery
{
    use Exportable;

    protected $filterType;
    protected $filterValue;

    public function __construct($filterType, $filterValue)
    {
        $this->filterType = $filterType;
        $this->filterValue = $filterValue;
    }

    public function query()
    {
        $query = Sach::query();

        // Áp dụng bộ lọc theo thời gian nếu giá trị được truyền
        if ($this->filterType === 'year' && !empty($this->filterValue)) {
            $query->whereYear('created_at', $this->filterValue);
        } elseif ($this->filterType === 'month' && !empty($this->filterValue)) {
            $query->whereMonth('created_at', $this->filterValue);
        } elseif ($this->filterType === 'week' && !empty($this->filterValue)) {
            $query->whereRaw('WEEK(created_at) = ?', [$this->filterValue]);
        }

        return $query;
    }
}
