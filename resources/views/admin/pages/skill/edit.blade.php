@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('skill.index') }}" class="float-right btn btn-success"><i class="fa fa-left-arrow"></i>
                    Back</a>
                <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>

            </div>
            <div class="card-body">
                 <form action="{{ route('skill.update', $skill->id) }}" method="post">
                    @method('put')
                    @include('admin.pages.skill._form', ['buttonText' => 'Update'])
                    
                </form>
            </div>
        </div>

    </div>
@endsection
