@extends('layouts.deflayout')

@section('title', 'Task Manager | Projects')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{$project->name}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tasks</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="col-md-10">
                            <tr>
                                <th>S/N</th>
                                <th>Task</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($project->tasks as $task)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{$task->title}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{$task->priority}}</td>
                                <td><a href="" class="btn btn-small btn-success">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection