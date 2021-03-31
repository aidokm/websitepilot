@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add new posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Add new posts</li>
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

  <form action="{{url('addPost')}}" method="post" enctype="multipart/form-data">
    {{csrf_field() }}
  <input type="hidden" name="tbl" id="" value="{{encrypt('contents')}}">
    <div class="col-md-6">
            <div class="form-group">
                <label for="meta-title">Title</label>
            <input type="text" name="title" value="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                 <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <p> <input type="file"  accept="image/*" name="image" id="file" onchange="loadfile(event)"
                 style="display:none;"></p>
                 <p> <label for="file" style="cursor:pointer;">Featured Image</label></p>
                <p><img id="output" width="200"></p>
                 </div>
            <div class="form-group">
              <label for="">Category</label>
              <select id="" class="form-control" name="category">
             @foreach ($cats as $cat)
              <option>{{$cat->title}}</option> 
             @endforeach
                
            </select>
            </div>
            <div class="form-group">
                <label for="">Button Link</label>
                <input type="text" name="link" class="form-control" id="">
            </div>
            <div class="form-group">
              <label for="">Status</label>
              <select id="" class="form-control" name="status"">
                <option>on</option>
                <option>off</option>
            </select>
        </div>
            <div class="form-group">
                <button class="btn btn-success">Add Posts</button>
            </div>
    </div>
      </form>
  </section>
  <script>
    var loadfile = function(event){
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>


@endsection