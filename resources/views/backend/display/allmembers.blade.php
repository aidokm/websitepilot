@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
            <p><strong>View All Team Members</strong></p>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if (count($data)!=0)
                  @foreach ($data as $key=> $team)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$team->name}}</td>
                      <td>{{$team->designation}}</td>
                      <td>
                        @if($team->image)
                        <img src="{{('public/teams')}}/{{$team->image}}" width="50"/>
                        @endif
                    </td>
                    <td>{{$team->intro}}</td>
                      <td>{{$team->status}}</td>
                      <td style="width:100px;">
                          <a href="{{url('editMember')}}/{{$team->id}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                          <a href="{{url('deleteMember')}}/{{$team->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach 
                  @else
                  
                 
                  <tr>
                    <td colspan="4">No Portifolios Found.</td>
                  </tr>
                  @endif
                    
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>
@endsection