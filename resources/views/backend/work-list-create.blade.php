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
                    <h3>Create Work Section</h3>
                </div>
            </div>
            {!! Form::open(['route'=>'admin.work.list.store','method'=>'post']) !!}
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('description','description') !!}
                    {!! Form::text('description',old('description'),['class'=>'form-control']) !!}
                    @error('description')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('work_section_id','Section') !!}
                    {!! Form::select('work_section_id',[''=>'...'] + $sections->toArray(), old('work_section_id'),['class'=>'form-control']) !!}
                    @error('work_section_id')<span class="text-danger">{{$message}}</span>@enderror
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
