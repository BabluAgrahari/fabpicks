<?php

namespace App\Exports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BrandExport extends Export implements FromArray, WithHeadings
{
    protected $request;

    public function __construct($request)
    {
        parent::__construct();
        $this->request = $request;
    }

    public function array(): array
    {
        $request = (object)$this->request;

        $query = Brand::query();

        if (!empty($request->name))
            $query->where('name', 'LIKE', "%$request->name%");

        if (!empty($request->sort))
            $query->where('sort', $request->sort);

        $records = $query->dateRange($request->date_range)->latest()->get();

        $result = [];
        if (!$records->isEmpty()) {
            foreach ($records as $record) {
                $result[] = [
                    'name'          => $record->name,
                    'sort'          => $record->sort,
                    'description'   => $record->description,
                    'created'       => $record->dFormat($record->created)
                ];
            }
        }
        return $result;
    }

    public function headings(): array
    {
        return [
            'Brand Name',
            'Sort',
            'Description',
            'Created'
        ];
    }
}
