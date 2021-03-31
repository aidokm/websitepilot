@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
            <p><strong>View All Services</strong></p>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if (count($data)!=0)
                  @foreach ($data as $key=> $service)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$service->title}}</td>
                      <td>{{$service->icon}}</td>
                      <td>{{$service->description}}</td>
                      <td>{{$service->status}}</td>
                      <td style="width:100px;">
                          <a href="{{url('editService')}}/{{$service->id}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                          <a href="{{url('deleteService')}}/{{$service->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach 
                  @else
                  
                 
                  <tr>
                    <td colspan="4">No Services Found.</td>
                  </tr>
                  @endif
                    
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>
@endsection