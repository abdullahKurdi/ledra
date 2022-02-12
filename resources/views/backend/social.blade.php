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
                            <h3>Edit Social information</h3>
                        </div>
                    </div>
                    {!! Form::open(['route'=>['admin.social.update'],'method'=>'put']) !!}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('facebook','facebook') !!}
                            {!! Form::text('facebook',old('facebook',$social->facebook),['class'=>'form-control']) !!}
                            @error('facebook')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('instagram','instagram') !!}
                            {!! Form::text('instagram',old('instagram',$social->instagram),['class'=>'form-control']) !!}
                            @error('instagram')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('twitter','twitter') !!}
                            {!! Form::text('twitter',old('twitter',$social->twitter),['class'=>'form-control']) !!}
                            @error('twitter')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('whatsapp','whatsapp') !!}
                            {!! Form::text('whatsapp',old('whatsapp',$social->whatsapp),['class'=>'form-control']) !!}
                            @error('whatsapp')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('linkedin','linkedin') !!}
                            {!! Form::text('linkedin',old('linkedin',$social->linkedin),['class'=>'form-control']) !!}
                            @error('linkedin')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('snapchat','snapchat') !!}
                            {!! Form::text('snapchat',old('snapchat',$social->snapchat),['class'=>'form-control']) !!}
                            @error('snapchat')<span class="text-danger">{{$message}}</span>@enderror
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
