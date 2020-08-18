<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if(Session::has('success'))
                <div class="alert alert-success col-md-8 col-md-offset-4" role="alert">
                    <strong>Success:</strong> {{ Session::get('success')}}
                </div>
            @endif

            @if (count($errors) > 0) 
                <div class="row">
                    <div class="alert alert-danger col-md-8 col-md-offset-4" role="alert">
                        <strong>Errors:</strong>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

