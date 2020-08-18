<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use Illuminate\Support\Facades\Session;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks= Task::orderBy('priority', 'asc')->paginate(20);
        return view('tasks.index', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects= Project::all();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'title'=> 'required|max:255',
            'slug'=> 'required|alpha_dash|max:255',
            'priority'=> 'required',
            'project_id'=>'required|integer',
            'description'=> 'required'
        ]);

        //store in db
        $task= new Task;
        $task->title = $request->title;
        $task->slug= $request->slug;
        $task->priority= $request->priority;
        $task->project_id= $request->project_id;
        $task->description= $request->description;

        $task->save();

        Session::flash('success', 'Task successfully added');

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service= Task::where('slug', '=', $slug)->first();
        return view('tasks.show', ['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects= Project::all();
        $task= Task::find($id);
        return view('tasks.edit', ['projects'=>$projects, 'task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        $task= Task::find($id);

        $this->validate($request, [
            'title'=> 'required|max:255',
            'slug'=> 'required|alpha_dash|max:255',
            'priority'=> 'required',
            'project_id'=>'required|integer',
            'description'=> 'required'
        ]);

        //store in db
        $task= Task::find($id);
        $task->title = $request->title;
        $task->slug= $request->slug;
        $task->priority= $request->priority;
        $task->project_id= $request->project_id;
        $task->description= $request->description;

        $task->save();

        Session::flash('success', 'Task successfully updated');

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task= Task::find($id);

        $task->delete();

        Session::flash('success', 'Task deleted successfully');

        return redirect()->route('tasks.index');
    }

    public function getProject($id) {
        $project= Project::find($id);


        return view('projects.show', ['project'=>$project]);
    }
}
