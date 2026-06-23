<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Models\Skill;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('category')->get()->groupBy('category');
        $projects = Project::with('images')->latest()->take(3)->get();

        return view('portfolio.index', compact('skills', 'projects'));
    }

    public function projects()
    {
        $projects = Project::with('images')
            ->latest()
            ->get()
            ->groupBy('category');

        return view('portfolio.projects', compact('projects'));
    }

    public function projectDetail(Project $project)
    {
        $project->load('images');
        return view('portfolio.project-detail', compact('project'));
    }

    public function experience()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        return view('portfolio.experience', compact('experiences'));
    }
}