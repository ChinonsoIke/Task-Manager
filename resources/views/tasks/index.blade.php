@extends('layouts.deflayout')

@section('title', 'Admin | Tasks')

@section('name', 'Tasks')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2 create">
                    <a href="{{route('tasks.create')}}" class="btn btn-primary">Add New Task</a>
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
                                        <th>Created At</th>
                                        <th>Priority</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{$task->title}}</td>
                                        <td>{{$task->description}}</td>
                                        <td>{{date('M j, Y', strtotime($task->created_at))}}</td>
                                        <td>{{$task->priority}}</td>
                                        <td><a href="{{route('tasks.edit', $task->id)}}" class="btn btn-small btn-success">Edit</a><hr>
                                            <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-small btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $tasks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection