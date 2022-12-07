<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Exception;

class SubCategoryController extends Controller
{
    public function index()
    {
        try {
            $data = SubCategory::with(['Category'])->where('status', 1)->get();

            if ($data->isEmpty())
                return $this->notFoundRes();

                // foreach($records as $record){
                //     $data[] = [
                //     '_id'=>$record->_id,
                //     'name'=>$record->name,
                //     'discription'=>$record->discription,
                //     'sort'=>$record->sort,
                //     'status'=>$record->status,
                //     'category_id'=>$record->category_id,
                //     'category_name'=> !empty($record->Category->name)?$record->Category->name:'',
                //     'banner'=>$record->banner,
                //     'icon'=>$record->icon,
                //     'created'=> $record->created,
                //     'updated'=>$record->updated
                // ];
                // }

            return $this->recordsRes($data);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $record = SubCategory::with(['Category'])->find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
