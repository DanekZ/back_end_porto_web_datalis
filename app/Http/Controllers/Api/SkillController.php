<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills  = Skill::orderBy('sort_order')->get();
        $grouped = $skills->groupBy('category')->map(
            fn($group) =>
            $group->map(fn($s) => [
                'id'       => $s->id,
                'name'     => $s->name,
                'icon'     => $s->icon,
                'color'    => $s->color,
            ])->values()
        );

        return response()->json(['data' => $grouped]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string',
            'category'   => 'required|in:web,data,other',
            'icon'       => 'nullable|string',
            'color'      => 'nullable|string',
            'sort_order' => 'integer',
        ]);

        $skill = Skill::create($data);
        return response()->json(['data' => $skill], 201);
    }


    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update($request->all());
        return response()->json(['data' => $skill]);
    }


    public function destroy($id)
    {
        Skill::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted.']);
    }
}