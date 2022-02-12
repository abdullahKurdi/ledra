@extends('layouts.admin')

@section('content')
    <div class="container-fluid pr-3 pl-0">
        <div class="row ">
            <div class="col-md-2">
                @include('partial.backend.sidebare')
            </div>
            <div class="col-10">
                <div class="create">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <h3>Edit Work information</h3>
                        </div>
                    </div>
                    {!! Form::open(['route'=>['admin.work.update'],'method'=>'put']) !!}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('description','Description') !!}
                            {!! Form::text('description',old('description',$about->description),['class'=>'form-control','rows'=>'3']) !!}
                            @error('description')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-12 form-group">
                            {!! Form::submit('update',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <hr>
                    <h2>Sections Info</h2>
                    <div class="row mb-3">
                        <div class="col-12 mb-3 mt-3">
                            <a href="{{route('admin.work.create')}}" class="btn btn-primary">Add New Section</a>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-responsive-lg">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($aboutSections as $aboutSection)
                                    <tr>
                                        <td>{{$aboutSection->title}}</td>

                                        <td>{{$aboutSection->created_at->format('Y,M,D')}}</td>
                                        <td>
                                            <a href="{{route('admin.work.section.edit',$aboutSection->id)}}"class="btn btn-success btn-sm mb-1"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0);" onclick="if(confirm('Are you sure to delete this emp')){document.getElementById('post-delete-{{$aboutSection->id}}').submit()}else{return false}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            <form action="{{route('admin.work.section.destroy',$aboutSection->id)}}"  method="post" id="post-delete-{{$aboutSection->id}}">
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


                    <hr>
                    <h2>Sections list info</h2>
                    <div class="row mb-3">
                        <div class="col-12 mb-3 mt-3">
                            <a href="{{route('admin.work.list.create')}}" class="btn btn-primary">Add new item</a>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-responsive-lg">
                                <thead>
                                <tr>
                                    <th scope="col">description</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($list as $item)
                                    <tr>
                                        <td>{{$item->description}}</td>

                                        <td>{{$item->created_at->format('Y,M,D')}}</td>
                                        <td>
                                            <a href="{{route('admin.work.list.section.edit',$item->id)}}"class="btn btn-success btn-sm mb-1"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0);" onclick="if(confirm('Are you sure to delete this emp')){document.getElementById('post-delete-{{$item->id}}').submit()}else{return false}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            <form action="{{route('admin.work.list.section.destroy',$item->id)}}"  method="post" id="post-delete-{{$item->id}}">
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
    </div>

@endsection
