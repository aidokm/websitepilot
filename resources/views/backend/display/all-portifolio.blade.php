@extends('backend.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
            <p><strong>View All Categories</strong></p>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Portifolio Title</th>
                        <th>Slug</th>
                        <th>Portifolio Category</th>
                        <th>Portifolio Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if (count($data)!=0)
                  @foreach ($data as $key=> $portifolio)
                  <tr>
                      <td>{{++$key}}</td>
                      <td>{{$portifolio->title}}</td>
                      <td>{{$portifolio->slug}}</td>
                      <td>{{$portifolio->category}}</td>
                      <td> @if($portifolio->image)
                        <img src="{{url('public/portifolios')}}/{{$portifolio->image}}" width="50"/>
                        @endif</td>
                      <td>{{$portifolio->status}}</td>
                      <td style="width:100px;">
                          <a href="{{url('editPc')}}/{{$portifolio->id}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                          <a href="{{url('deletePc')}}/{{$portifolio->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
