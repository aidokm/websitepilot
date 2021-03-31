@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Portifolio Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Portifolio Categories</li>
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
    
  <form action="{{url('updatePortcat')}}/{{$data->id}}" method="post">
    {{csrf_field() }}
  <input type="hidden" name="tbl" id="" value="{{encrypt('portcats')}}">
  <input type="hidden" name="id" id="" value="{{$data->id}}">
    <div class="col-md-6">
            <div class="form-group">
                <label for="meta-title">Menu Title</label>
            <input type="text" name="title" value="{{$data->title}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select id="" class="form-control" name="status">
                <option>{{$data->status}}</option>
                    @if($data->status =='off')
                    <option>on</option>
                    @else
                    <option>off</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Update Category</button>
            </div>
    </div>

@endsection