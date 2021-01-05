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
                            <a href="{{ route('blog.create') }}" class="float-right btn btn-success"><i class="fa fa-plus-circle"></i> Post</a>
                            <h6 class="m-0 font-weight-bold text-primary">Post List</h6> 
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                         @if(count($posts))
                                        @foreach ($posts as $key => $post)

                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>

                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5"> Opps!!,post Not found</td>
                                        </tr>
                                    @endif

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection
