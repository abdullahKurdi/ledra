@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{asset('backend/js/summernote/summernote-bs4.min.css')}}">
@endsection

@section('content')

<div class="row">
    <div class="col-md-2">
        @include('partial.backend.sidebare')
    </div>
    <div class="col-md-10">
        <div class="create">
            <div class="row">
                <div class="col-12 mt-4">
                    <h3>Edit work section</h3>
                </div>
            </div>
            {!! Form::model($aboutSection ,['route'=>['admin.work.section.update',$aboutSection->id],'method'=>'PUT']) !!}
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('title','Title') !!}
                    {!! Form::text('title',old('title' ,$aboutSection->title),['class'=>'form-control']) !!}
                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
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
