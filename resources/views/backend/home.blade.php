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
                            <h3>Edit Home information</h3>
                        </div>
                    </div>
                    {!! Form::open(['route'=>['admin.home.update'],'method'=>'put']) !!}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('title','Title') !!}
                            {!! Form::text('title',old('title',$home->title),['class'=>'form-control']) !!}
                            @error('title')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('description','description') !!}
                            {!! Form::textarea('description',old('description',$home->description),['class'=>'form-control' ,'rows'=>4]) !!}
                            @error('description')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-12 form-group">
                            {!! Form::submit('update',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
