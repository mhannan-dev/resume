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
                <a href="{{ route('category.create') }}" class="float-right btn btn-success"><i
                        class="fa fa-plus-circle"></i>
                    Category </a>
                <h6 class="m-0 font-weight-bold text-primary">Category List</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%">SL</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th style="width: 5%">Type</th>
                                <th>Status</th>
                                <th style="width: 15%">Publish on</th>
                                <th class="width:15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($categories))
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $category['title'] }}</td>
                                        <td>{{ $category['slug'] }}</td>
                                        <td>
                                            @if ($category->type == '1')
                                                <span class="badge badge-warning">Blog</span>

                                            @else
                                                <span class="badge badge-success">Portfolio</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($category->status == '1')
                                                <span class="badge badge-success">Publish</span>

                                            @else
                                                <span class="badge badge-draft">Draft</span>
                                            @endif

                                        </td>
                                        <td>{{ $category->created_date }}</td>
                                        <td>
                                            <a title="Edit" href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>


                                            <form style="display: inline-block" class="form-delete" method="post"
                                                action="{{ route('category.destroy', $category->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No Category found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
