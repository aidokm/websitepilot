@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Edit posts</li>
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

  <form action="{{url('updatePost')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
    {{csrf_field() }}
  <input type="hidden" name="tbl" id="" value="{{encrypt('contents')}}">
  <input type="hidden" name="id" id="" value="{{($data->id)}}">
    <div class="col-md-6">
            <div class="form-group">
                <label for="meta-title">Title</label>
            <input type="text" name="title" value="{{$data->title}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                 <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$data->description}}</textarea>
            </div>
            <div class="form-group">
                <p> <input type="file"  accept="image/*" name="image" id="file" onchange="loadfile(event)"
                 style="display:none;"></p>
                 <p> <label for="file" style="cursor:pointer;">Featured Image</label></p>

                 </div>
                 @if ($data->image)
                <p><img id="output" src="{{('public/contents')}}/{{$data->image}}"></p>
                 @else
                 <p><img id="output" width="200"></p>
                 @endif
                </div>
            <div class="form-group">
              <label for="">Category</label>
              <select id="" class="form-control" name="category">
              <option>{{$data->category}}</option>
             @foreach ($cats as $cat)
             @if($cat->title != $data->category)
              <option>{{$cat->title}}</option>
              @endif
             @endforeach

            </select>
            </div>
            <div class="form-group">
                <label for="">Button Link</label>
            <input type="text" name="link" class="form-control" value= "{{$data->link}}"id="">
            </div>
            <div class="form-group">
              <label for="">Status</label>
              <select id="" class="form-control" name="status"">
              <option>{{$data->status}}</option>
                  @if($data->status =='off')
                  <option>on</option>
                  @else
                  <option>off</option>
                  @endif
              </select>
          </div>
            <div class="form-group">
                <button class="btn btn-success">Update Posts</button>
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