@extends('admin.master')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">
            @include('admin.partials._messages')
        </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('blog.create') }}" class="float-right btn btn-success"><i class="fa fa-plus-circle"></i>
                    Post</a>
                <h6 class="m-0 font-weight-bold text-primary">Post List</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%">SL</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th style="width: 5%">Status</th>
                                <th style="width: 15%">Publish on</th>
                                <th class="width:15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($posts))
                                @foreach ($posts as $key => $post)

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>asdfdsf</td>
                                    <td>asdfdsf</td>
                                    <td>asdfdsf</td>
                                </tr>
                                @endforeach
                           @endif
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
