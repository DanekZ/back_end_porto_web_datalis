<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;

class ExperienceController extends Controller
{
    /**
     * GET /api/experiences
     */
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
            ]);

        return response()->json([
            'data' => $experiences,
        ]);
    }
}
