<?php

namespace App\Exports;

use App\Models\Brand;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BrandExport extends Export 
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

        $records = $query->orderBy('created', 'DESC')->get();

        $reults = [];
        if (!$records->isEmpty()) {
            foreach ($records as $record) {
                $reults[] = [
                    'name'              => $record->name,
                    'sort'              => $record->sort,
                    'created'          => $record->dformat($record->created)
                ];
            }
        }
        return $reults;
    }

    public function headings(): array
    {
        return [
            'Brand Name',
            'Sort',
            'Created'
        ];
    }
}
