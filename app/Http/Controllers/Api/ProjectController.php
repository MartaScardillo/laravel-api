<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request) {

        $results = Project::with('type', 'technologies')->paginate(20);

        return response()->json([
            'projects' => $results,
            'success' => true
        ]);

    }
    public function show($slug) {

        $project = Project::with('type','technologies')->where('slug',$slug)->first();

        return response()->json([
            'project' => $project
        ]);
    }
}
