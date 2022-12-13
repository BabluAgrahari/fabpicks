<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        // $query = Feedback::with('User')->get()->query();
        $query = Feedback::query();

            if (!empty($request->review))
            $query->where('review', 'LIKE', "%$request->review%");

            if (!empty($request->quality))
            $query->where('quality', 'LIKE', "%$request->quality%");

            if (!empty($request->price))
            $query->where('price', 'LIKE', "%$request->price%");

            if (!empty($request->value))
            $query->where('value', 'LIKE', "%$request->value%");

        $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
        $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

        $request->request->remove('page');
        $request->request->remove('perPage');
        $data['filter']  = $request->all();
        return view('crm/feedback/list',$data);
    }
}