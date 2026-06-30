<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('sort_order')
            ->orderBy('year', 'desc')
            ->get()
            ->map(fn($e) => [
            'id'          => $e->id,
            'year'        => $e->year,
            'title'       => $e->title,
            'role'        => $e->role,
            'description' => $e->description,
            'type'        => $e->type,
            'start_date'  => $e->start_date,
            'end_date'    => $e->end_date,
        ]);
        
        return response()->json(['data' => $experiences]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year'        => 'required|string',
            'title'       => 'required|string',
            'role'        => 'required|string',
            'description' => 'required|string',
            'type'        => 'in:work,education,training',
            'start_date'  => 'nullable|string',
            'end_date'    => 'nullable|string',
            'sort_order'  => 'integer',
        ]);

        $experience = Experience::create($data);
        return response()->json(['data' => $experience], 201);
    }

    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->update($request->all());
        return response()->json(['data' => $experience]);
    }

    public function destroy($id)
    {
        Experience::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted.']);
    }
}