@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Member</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class=""><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Edit Member</li>
          <li class="breadcrumb-item" ><i class="fa fa-arrow-left"></i><a href="{{url('allMembers')}}">All Members</a></li>
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

<form action="{{url('updateMember')}}/{{$maindata->id}}" method="post" enctype="multipart/form-data">
    {{csrf_field() }}
  <input type="hidden" name="tbl" id="" value="{{encrypt('teams')}}">
  <input type="hidden" name="id" id="" value={{$maindata->id}}>
    <div class="col-md-6">
            <div class="form-group">
                <label for="meta-title">Member Name</label>
            <input type="text" name="name" value="{{$maindata->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="meta-title">Designation</label>
            <input type="text" name="designation" value="{{$maindata->designation}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Intro</label>
                 <textarea name="intro" class="form-control" id="" cols="30" rows="10">{{$maindata->intro}}</textarea>
            </div>
            <div class="form-group">
                <p> <input type="file"  accept="image/*" name="image" id="file" onchange="loadfile(event)"
                 style="display:none;"></p>
                 <p> <label for="file" style="cursor:pointer;">Profile Image</label></p>

                 </div>
                 @if ($maindata->image)
                <p><img id="output" src="{{url('public/teams')}}/{{$maindata->image}}"></p>
                 @else
                 <p><img id="output" width="200"></p>
                 @endif
                </div>
            <div class="form-group">
              <label for="">Status</label>
              <select id="" class="form-control" name="status">
                <option>{{$maindata->status}}</option>
                  @if($maindata->status == 'off')
                <option>on</option>
                @else
                <option>off</option>
                @endif
            </select>
        </div>
            <div class="form-group">
                <button class="btn btn-success">Edit Member</button>
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