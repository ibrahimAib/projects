<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $selected0;
    public $selected1;
    public $selected2;
    public function index()
    {
        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data['user_id'] = auth()->id();
        Project::create($data);
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $selected0 = $this->selected0;
        $selected0 = '';

        $selected1 = $this->selected1;
        $selected1 = '';

        $selected2 = $this->selected2;
        $selected2 = '';
        switch ($project->status) {
            case 0:
                $selected0 = 'selected';
                break;
            case 1:
                $selected1 = 'selected';
                break;
            case 2:
                $selected2 = 'selected';
                break;
        }
        return view('projects.show', compact('project', 'selected0', 'selected1', 'selected2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project;
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);
        return back();
    }


    public function status(Request $request, Project $project)
    {
        $project->update([
            'status' => request('status'),
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        // echo "<script> alert('{{$project}}') </script>";
        return redirect('/projects');
    }
}
