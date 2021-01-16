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
                <a href="{{ route('skill.create') }}" class="float-right btn btn-success">
                    <i class="fa fa-plus-circle"></i>
                    skill </a>
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }} List</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Platform</th>
                                <th>Publish on</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($skills))
                                @foreach ($skills as $key => $skill)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $skill['title'] }}</td>        
                                        <td>
                                            @if ($skill->choose_platform =='programming_language' )
                                                Programming language
                                            @elseif ($skill->choose_platform =='library' ) 
                                                Library
                                            @elseif ($skill->choose_platform =='framework' ) 
                                                Framework
                                            @elseif ($skill->choose_platform =='database' ) 
                                                Database
                                                @elseif ($skill->choose_platform =='web_design' ) 
                                                Web design
                                            @endif
                                        </td>        
                                        <td>{{ $skill->created_date }}</td>
                                        <td>
                                            <a title="Edit" href="{{ route('skill.edit', $skill->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                        
                                            <form style="display: inline-block" class="form-delete" method="post"
                                                action="{{ route('skill.destroy', $skill->id) }}">
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
                                    <td colspan="5" class="text-danger"> Opps!! {{ $title }} Not found</td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
