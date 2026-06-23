<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * GET /api/skills
     * Mengembalikan skills dikelompokkan per category
     */
    public function index()
    {
        $skills = Skill::orderBy('sort_order')->get();

        $grouped = $skills->groupBy('category')->map(
            fn($group) =>
            $group->map(fn($s) => [
                'id'          => $s->id,
                'name'        => $s->name,
                'proficiency' => $s->proficiency,
            ])->values()
        );

        return response()->json([
            'data' => $grouped,
        ]);
    }
}
