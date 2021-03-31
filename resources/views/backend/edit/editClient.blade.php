@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Client</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Edit Client</li>
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

<form action="{{url('updateClient')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
    {{csrf_field() }}
  <input type="hidden" name="tbl" id="" value="{{encrypt('Clients')}}">
  <input type="hidden" name="id" value={{$data->id}}>
    <div class="col-md-6">
        <div class="form-group">
            <p> <input type="file"  accept="image/*" name="image" id="file" onchange="loadfile(event)"
             style="display:none;"></p>
             <p> <label for="file" style="cursor:pointer;">Featured Image</label></p>
           
             </div>
             @if ($data->image)
            <p><img id="output" src="{{url('public/clients')}}/{{$data->image}}"></p>
             @else
             <p><img id="output" width="200"></p>
             @endif
            </div>
                 <div class="form-group">
                     <label for="">Link</label>
                 <input type="text" name="link" value="{{$data->link}}" class="form-control">
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
                <button class="btn btn-success">Update Client</button>
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
<style>
    .table{
        background: #333;
        color: #fff;
    }
</style>

@endsection