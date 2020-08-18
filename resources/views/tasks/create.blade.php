@extends('layouts.deflayout')

@section('title', 'Admin | Add Task')

@section('name', 'Add Task')

@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form action="{{route('tasks.store')}}" method="POST">
                            @csrf
                            
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control">

                            <label for="slug">Slug:</label>
                            <input type="text" name="slug" class="form-control">

                            <label for="priority">Priority:</label>
                            <select name="priority" id="" class="form-control">
                                <option value="#1">#1</option>
                                <option value="#2">#2</option>
                                <option value="#3">#3</option>
                                <option value="#4">#4</option>
                                <option value="#5">#5</option>
                            </select>

                            <label for="project_id">Project:</label>
                            <select name="project_id" class="form-control">
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>

                            <hr>
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                            <p></p>
                            <input type="submit" class="btn btn-lg btn-success btn-block">
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection