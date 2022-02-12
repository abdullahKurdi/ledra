@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-2">
        @include('partial.backend.sidebare')
    </div>
    <div class="col-md-10">
        <div class="create">
            <div class="row">
                <div class="col-12 mt-4">
                    <h3>Edit Our purpose</h3>
                </div>
            </div>
            {!! Form::model($value ,['route'=>['admin.purpose.update',$value->id],'method'=>'PUT']) !!}
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('title','Title') !!}
                    {!! Form::text('title',old('title' ,$value->title),['class'=>'form-control']) !!}
                    @error('title')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('description','Description') !!}
                    {!! Form::textarea('description',old('description',$value->description),['class'=>'form-control' , 'rows'=>4]) !!}
                    @error('description')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="col-12 form-group">
                    {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection

