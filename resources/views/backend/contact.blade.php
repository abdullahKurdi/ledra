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
                            <h3>Edit Contact information</h3>
                        </div>
                    </div>
                    {!! Form::open(['route'=>['admin.contact.update'],'method'=>'put']) !!}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('address','Address') !!}
                            {!! Form::text('address',old('address',$contact->address),['class'=>'form-control']) !!}
                            @error('address')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('phone','Phone') !!}
                            {!! Form::text('phone',old('phone',$contact->phone),['class'=>'form-control']) !!}
                            @error('phone')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('email','Email') !!}
                            {!! Form::text('email',old('email',$contact->email),['class'=>'form-control']) !!}
                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('latitude','Latitude') !!}
                            {!! Form::text('latitude',old('latitude',$contact->latitude),['class'=>'form-control']) !!}
                            @error('latitude')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('longitude','Longitude') !!}
                            {!! Form::text('longitude',old('longitude',$contact->longitude),['class'=>'form-control']) !!}
                            @error('longitude')<span class="text-danger">{{$message}}</span>@enderror
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
