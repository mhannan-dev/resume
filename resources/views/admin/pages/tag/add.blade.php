@extends('admin.master')
@section('content')
    <div class="container-fluid">



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('category.index') }}" class="float-right btn btn-success">
                    <i class="fa fa-left-arrow"></i>
                    Back</a>
                <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>

            </div>
            <div class="card-body">
                 <form action="{{ route('tag.store') }}" method="post">
                    @include('admin.pages.tag._form', ['buttonText' => 'Save'])
                    
                </form>
            </div>
        </div>

    </div>
@endsection
