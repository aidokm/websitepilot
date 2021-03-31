@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit service</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Edit service</li>
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

  <form action="{{url('addService')}}" method="post" enctype="multipart/form-data">
    {{csrf_field() }}
  <input type="hidden" name="tbl" id="" value="{{encrypt('services')}}">
  <input type="hidden" name="id" value={{$data->id}}>
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
                <label for="">Icon</label>
                <input type="text" name="icon" value={{$data->icon}} class="form-control" id="">
            </div>
            <div class="form-group">
              <label for="">Status</label>
              <select id="" class="form-control" name="status">
                  <option>{{$data->status}}</option>
                  @if($data->status =="off")
                <option>on</option>
                @else
                <option>off</option>
                @endif
            </select>
        </div>
            <div class="form-group">
                <button class="btn btn-success">Add Service</button>
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