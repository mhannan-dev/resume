@extends('admin.master')
@section('content')
    <div class="container-fluid">



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>

            </div>
            <div class="card-body">
                 <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                    @include('admin.pages.blog._form', ['buttonText' => 'Save'])
                </form>
            </div>
        </div>

    </div>
@endsection
