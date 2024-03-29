<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->query('type')){
            $projects= Project::where('type_id', $request->query('type'))->paginate(4);
        }else{
            $projects = Project::paginate(4);
        };
        
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['technologies', 'type'])->first();
        return response()->json(
            [
                'success' => true,
                'results' => $project
            ]
        );
    }

}
