@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">All Posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">All Posts</li>
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

            <div class="col-sm-12">{{--
                <p><strong>View All Categories</strong></p> --}}
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Menu Title</th>
                            <th>Featured Image</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=> $post)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$post->title}}</td>
                            <td>
                                @if($post->image)
                                <img src="{{('public/contents')}}/{{$post->image}}" width="50"/>
                                @endif
                            </td>
                            <td>{{$post->category}}</td>
                            <td>{{$post->status}}</td>
                            <td>
                                <a href="{{url('editPost')}}/{{$post->id}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{url('deletePost')}}/{{$post->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>

@endsection