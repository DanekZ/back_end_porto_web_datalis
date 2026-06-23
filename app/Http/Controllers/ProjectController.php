<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * GET /api/projects
     * Query params: ?category=web|data&featured=true
     */
    public function index(Request $request)
    {
        $query = Project::orderBy('sort_order')->orderBy('created_at', 'desc');

        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->has('featured') && $request->featured === 'true') {
            $query->where('featured', true)->limit(3);
        }

        $projects = $query->get()->map(fn($p) => $this->format($p));

        return response()->json([
            'data'  => $projects,
            'total' => $projects->count(),
            'counts' => [
                'all'  => Project::count(),
                'web'  => Project::where('category', 'web')->count(),
                'data' => Project::where('category', 'data')->count(),
            ],
        ]);
    }

    /**
     * GET /api/projects/{id}
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);

        return response()->json([
            'data' => $this->format($project),
        ]);
    }

    /** Normalisasi field agar konsisten ke frontend */
    private function format(Project $p): array
    {
        return [
            'id'          => $p->id,
            'title'       => $p->title,
            'description' => $p->description,
            'thumbnail'   => $p->thumbnail,
            'images'      => $p->images ?? [],
            'tech_stack'  => $p->tech_stack ?? [],
            'category'    => $p->category,
            'github_url'  => $p->github_url,
            'demo_url'    => $p->demo_url,
            'status'      => $p->status,
            'featured'    => $p->featured,
            'created_at'  => $p->created_at,
        ];
    }
}
