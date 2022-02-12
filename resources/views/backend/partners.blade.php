@extends('layouts.admin')

@section('content')
    <div class="container-fluid pr-3 pl-0">
        <div class="row">
            <div class="col-md-2">
                @include('partial.backend.sidebare')
            </div>
            <div class="col-md-10">
                <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <a href="{{route('admin.partners.create')}}" class="btn btn-primary">Add New Partner</a>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-responsive-lg">
                                <thead>
                                <tr>
                                    <th scope="col">Partner name</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($services as $service)
                                    <tr>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->created_at->format('Y,M,D')}}</td>
                                        <td>
                                            <a href="{{route('admin.partners.edit',$service->id)}}"class="btn btn-success btn-sm mb-1"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0);" onclick="if(confirm('Are you sure to delete this emp')){document.getElementById('post-delete-{{$service->id}}').submit()}else{return false}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            <form action="{{route('admin.partners.destroy',$service->id)}}"  method="post" id="post-delete-{{$service->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="4"> No Record Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
