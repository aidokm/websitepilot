@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add new Client</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Add new Client</li>
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

  <form action="{{url('addClient')}}" method="post" enctype="multipart/form-data">
    {{csrf_field() }}
  <input type="hidden" name="tbl" id="" value="{{encrypt('Clients')}}">
    <div class="col-md-6">
            <div class="form-group">
                <p> <input type="file"  accept="image/*" name="image" id="file" onchange="loadfile(event)"
                 style="display:none;"></p>
                 <p> <label for="file" style="cursor:pointer;">Featured Image</label></p>
                <p><img id="output" width="200"></p>
                 </div>
                 <div class="form-group">
                     <label for="">Link</label>
                     <input type="text" name="link" class="form-control">
                 </div>
            <div class="form-group">
              <label for="">Status</label>
              <select id="" class="form-control" name="status"">
                <option>on</option>
                <option>off</option>
            </select>
        </div>
            <div class="form-group">
                <button class="btn btn-success">Add Client</button>
            </div>
    </div>
      </form>
      <div class="col-sm-6">
        <p><strong>View All Clients</strong></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data)!=0)
                @foreach ($data as $key=> $client)
                <tr>
                    <td>{{++$key}}</td>
                    <td><img src="{{url('public/clients')}}/{{$client->image}}"></td>
                    <td>{{$client->link}}</td>
                    <td>{{$client->status}}</td>
                    <td>
                        <a href="{{url('editClient')}}/{{$client->id}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{url('deleteClient')}}/{{$client->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <td colspan="4">No Clients found</td>
                @endif
            </tbody>
        </table>
    </div>
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