@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Website Settings</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Website Settings</li>
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

    @if($data=='')
    <div class="col-sm-6"></div>
    @else
    <div class="col-sm-6"></div>
    @endif
  <form action="{{url('addSettings')}}" method="post" enctype="multipart/form-data">
    {{csrf_field() }}
  <input type="hidden" name="tbl" id="" value="{{encrypt('setups')}}">
    <div class="col-md-6">
    <div class="form-group">
       <p> <input type="file"  accept="image/*" name="image" id="file" onchange="loadfile(event)"
        style="display:none;"></p>
        <p> <label for="file" style="cursor:pointer;">Upload Image</label></p>
       <p><img id="output" src="{{url('public/setups')}}/{{$data->image}}"></p>
        </div>
            <div class="form-group">
                <label for="meta-title">Website Title</label>
            <input type="text" name="meta_title" value="{{$data->meta_title}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" value="{{$data->address}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Contact Number</label>
                <input type="text" name="contact" value="{{$data->contact}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="{{$data->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Social Profile links</label>
            </div>
            <div id="socialGroup">
                <div class="form-group socialField">
                    <input type="text" name="social[]" class="form-control">
                    <a href="#" class="btn btn-warning addField"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Add settings</button>
            </div>
    </div>
      </form>
  </section>
  <script>
    var loadfile = function(event){
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    $('.addField').click(function(){
        var newField = $(document.createElement('div')).attr('class','form-group');
        newField.after().html('<input type="text" name="social[]" class="form-control"></div>');
        newField.appendTo('#socialGroup');
    })
</script>
<style>
    .socialField{
        position: relative;
    }
    .addField{
        position: absolute;
        top:0;
        right:0;
    }
</style>

@endsection