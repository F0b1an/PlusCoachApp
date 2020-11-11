<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('admin.tasks.index')
            ->with('tasks',$tasks);
    }
    
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        return view('admin.tasks.show')
            ->with('task', $task);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'description'=> 'required',
	    ]);

	    $task = new Task([
	        'name' => $request->get('name'),
	        'description'=> $request->get('description'),
            'task_date'=> $request->get('task_date'),
	        'status'=> ''
	    ]);
	    $task->save();

	    return redirect(route('tasks.index'))->with('success', 'Task has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('admin.tasks.edit')
        		->with('task', $task);
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
        $request->validate([
        'name'=>'required',
        'description'=> 'required',
        'status' => 'required'
	    ]);

	    $task = Task::find($id);
	    $task->name = $request->get('name');
	    $task->description = $request->get('description');
	    $task->status = $request->get('status');
	    $task->save();

	    return redirect(route('tasks.index'))->with('success', 'Status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
     	$task->delete();
     	return redirect(route('tasks.index'))->with('success', 'Task has been deleted Successfully');
    }
}
