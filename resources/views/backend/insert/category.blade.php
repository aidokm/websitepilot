@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    @if(Session::has('message'))
    <div class="col-sm-12">
    <div class="alert alert-success alert-dismissable">
      {{session::get('message')}}
      <a class="close" data-dismiss="alert"> &times; </a>
    </div>
    </div>
    @endif 

    <div class="col-sm-6"></div>
   
    <div class="col-sm-6"></div>
    
  <form action="{{url('addCategory')}}" method="post">
    {{csrf_field() }}
  <input type="hidden" name="tbl" id="" value="{{encrypt('categories')}}">
    <div class="col-md-6">
            <div class="form-group">
                <label for="meta-title">Menu Title</label>
            <input type="text" name="title" value="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select id="" class="form-control" name="status"">
                    <option>on</option>
                    <option>off</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Add Category</button>
            </div>
            <div class="col-sm-12">
                <p><strong>View All Categories</strong></p>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Menu Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=> $category)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$category->title}}</td>
                            <td>{{$category->status}}</td>
                            <td style="ml-2">
                                <a href="{{url('editCategory')}}/{{$category->id}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{url('deleteCategory')}}/{{$category->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>

@endsection