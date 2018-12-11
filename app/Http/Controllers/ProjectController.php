<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.project.list", ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.project.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'short_description' => $request->shortDescription
            ])) {
                return Response(['error' => false, 'message' => 'Project created'], 200);
            } else {
                return Response(['error' => true, 'message' => "Project couldn't be created"], 500);
            }
        } catch (\Exception $e) {
            return Response(['error' => true, 'message' => "Project couldn't be created"], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return Response(['data' => $project], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("admin.project.update", ['projects' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        try {
            if ($project->update([
                'title' => $request->title,
                'description' => $request->description,
                'short_description' => $request->shortDescription
            ])) {
                return Response(['error' => false, 'message' => 'Project updated'], 200);
            } else {
                return Response(['error' => true, 'message' => "We couldn't update your project"], 500);
            }
        } catch (\Exception $e) {
            return Response(['error' => true, 'message' => "We couldn't update your project"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try{
            if($project->delete()){
                return Response(['error' => false, 'message' => 'Project Deleted!'], 200);
            } else {
                return Response(['error' => true, 'message' => 'We could not delete the project. Please try again...'], 500);
            }
        } catch (\Exception $e) {
            return Response(['error' => true, 'message' => 'We could not delete the project. Please try again...'], 500);
        }
    }
}
