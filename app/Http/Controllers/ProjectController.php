<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function index(Request $request)
    {
        $projects = Project::all();
        return view('ltd.index', compact('projects'));
    }

    function show(Project $project)
    {
        return view('ltd.show', compact('project'));
    }
}