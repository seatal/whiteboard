@extends('admin.master-layout')

@section('content')
    <div class="container-fluid">
        @if(session()->has('success'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <ul class="nav nav-pills" id="ow-donut">
                            <li><a href="{{ route('students.create') }}"><b>Add New Student</b></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        {!! Form::open(['url' => 'admin/students/search/', 'method' => 'get', 'class' => 'form-horizontal','id' => 'merchants-search-form']) !!}
                        <div class="input-group">
                            {!! Form::text('search_data', isset($search_data) ? $search_data : null, array('class' => 'form-control', 'placeholder' => 'Search Filters...')) !!}
                            <span class="input-group-btn">{!! Form::submit('Go', array('class' => 'btn append-btn btn-primary')) !!}</span>
                        </div><!-- /input-group -->
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>Email</th>
                        <th>Subjects</th>
                        <th>School</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)

                        <tr>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>
                                @foreach($student->subjects as $subject)
                                    <label class="label label-primary">{{$subject->name}}</label>
                                @endforeach
                            </td>
                            <td>{{$student->school_name}}</td>
                            <td>{{$student->studentClass->class_name}}</td>
                            <td>
                                @if($student->status)
                                    <label class="label text-success">Active</label>
                                @else
                                    <label class="label text-danger">In-Active</label>
                                @endif
                            </td>

                            <td>
                                @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                                <a href="{{route("students.edit",$student->id)}}" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit student">
                                    <i class="fa fa-edit large"></i>
                                </a>
                                @endif
                                <a href="{{route("students.show",$student->id)}}" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="View Detail">
                                    <i class="fa fa-eye large"></i>
                                </a>
                                <a href="{{url("admin/students/payments/{$student->id}")}}" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Payment Detail">
                                    <i class="fa fa-credit-card large"></i>
                                </a>
                                <a href="{{url("admin/students/sessions/{$student->id}")}}" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Sessions Detail">
                                    <i class="fa fa-clock-o large"></i>
                                </a>
                                @if(auth()->user()->isSuperAdmin())
                                    <form action="{{route("students.destroy",$student->id)}}" method="post" style="display:inline-block">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Do you want to delete this student')"> <i class="fa fa-trash large" data-toggle="tooltip" data-placement="top" title="Delete This Student"></i></button>
                                        {!! csrf_field() !!}
                                    </form>
                                @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="pull-right link">{!! $students->render() !!}</div>
            </div>
        </div>





    </div>

@endsection