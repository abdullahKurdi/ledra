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
                            <a href="{{route('admin.value.create')}}" class="btn btn-primary">Add New Our Value</a>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-responsive-lg">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($value as $val)
                                    <tr>
                                        <td>{{$val->title}}</td>
                                        <td>{{$val->description}}</td>
                                        <td>{{$val->created_at->format('Y,M,D')}}</td>
                                        <td>
                                            <a href="{{route('admin.value.edit',$val->id)}}"class="btn btn-success btn-sm mb-1"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0);" onclick="if(confirm('Are you sure to delete this emp')){document.getElementById('post-delete-{{$val->id}}').submit()}else{return false}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            <form action="{{route('admin.value.destroy',$val->id)}}"  method="post" id="post-delete-{{$val->id}}">
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
