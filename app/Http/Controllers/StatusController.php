<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $isActiveFilter = $request->query('is_active');

        $statuses = Status::when($isActiveFilter != '', function ($query) use ($isActiveFilter) {
                        return $query->where('is_active', $isActiveFilter);
                    })->get();

        return view('statuses.index', compact('statuses'));
    }


    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
    
        Status::create($data);
    
        return redirect()->route('statuses.index');
    }

    public function edit(Status $status)
    {
        return view('statuses.edit', compact('status'));
    }
    
    public function update(Request $request, Status $status)
    {
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
    
        $status->update($data);
    
        return redirect()->route('statuses.index');
    }
    
    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('statuses.index');
    }

}
