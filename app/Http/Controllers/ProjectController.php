<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Get the list of project
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getList()
    {
        $projects = Project::all();
        return view("admin.project.list", ['projects' => $projects]);
    }

    /**
     * Create an project
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return view("admin.project.createUpdate");
    }

    /**
     * Edit an project
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit(Project $project)
    {
        return view("admin.project.createUpdate", ['projects' => $project]);
    }

    /**
     * Create or Update the Project into the Database
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function postUpdate(Request $request)
    {
        //If ID exist project exist
        if (isset($request->id) && $request->id > 0) {
            $project = Project::find($request->id);

            if ($project) {
                if ($project->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'short_description' => $request->shortDescription
                ])) {
                    return Response(['error' => false, 'message' => 'Project updated'], 200);
                }
            } else {
                return Response(['error' => true, 'message' => 'Project not found'], 404);
            }
        } else {
            //Create the project
            if (Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'short_description' => $request->shortDescription
            ])) {
                return Response(['error' => false, 'message' => 'Project created'], 200);
            } else {
                return Response(['error' => true, 'message' => 'There was an issue while creating the project'], 404);
            }
        }

        return Response(['error' => true, 'message' => 'Looks like you took the wrong turn...'], 404);
    }
}
