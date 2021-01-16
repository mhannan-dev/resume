@extends('admin.master')
@section('content')
    <div class="container-fluid">



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('experience.index') }}" class="float-right btn btn-success"><i class="fa fa-left-arrow"></i>
                    Back</a>
                <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>

            </div>
            <div class="card-body">
                 <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @include('admin.pages.experience._form', ['buttonText' => 'Save'])
                    
                </form>
            </div>
        </div>

    </div>
@endsection
