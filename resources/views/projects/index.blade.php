@extends('layouts.deflayout')

@section('title', 'Task Manager | Projects')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <!-- <h1>Projects</h1> -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th>{{$project->id}}</th>
                                    <td><a href="{{route('tasks.getProject', $project->id)}}">{{$project->name}}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!--/ .col-md-8 -->
                <div class="col-md-3">
                    <div class="well">
                        <form action="{{route('projects.store')}}" method="POST">
                            @csrf
                            <h3>New Project</h3>
                            <input type="text" name="name" placeholder="Name:" class="form-control">
                            <input type="submit" class="btn btn-block btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection