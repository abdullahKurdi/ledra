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
                    <h3>Edit Service</h3>
                </div>
            </div>
            {!! Form::model($service ,['route'=>['admin.service.update',$service->id],'method'=>'PUT','files'=>true]) !!}
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',old('name' ,$service->name),['class'=>'form-control']) !!}
                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-md-12">
                    {!! Form::label('description','Description') !!}
                    {!! Form::textarea('description',old('description',$service->description),['class'=>'form-control' , 'rows'=>4]) !!}
                    @error('description')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="file-loading pt-4">
                        {!! Form::file('img',['id'=>'service-images']) !!}

                    </div>
                    @error('img')<span class="text-danger">{{$message}}</span>@enderror
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
@section('script')
    <script src="{{asset('backend/js/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function(){
           // $('.summernote').summernote({
           //     placeholder: 'Hello stand alone ui',
           //     tabsize: 2,
           //     height: 120,
           //     toolbar: [
           //         ['style', ['style']],
           //         ['font', ['bold', 'underline', 'clear']],
           //         ['color', ['color']],
           //         ['para', ['ul', 'ol', 'paragraph']],
           //         ['table', ['table']],
           //         ['insert', ['link', 'picture', 'video']],
           //         ['view', ['fullscreen', 'codeview', 'help']]
           //     ]
           // });
            $('#service-images').fileinput({
                theme:"fa",
                maxFileCount:1,
                allowedFileTypes:['image'],
                showCancel:true,
                showRemove:false,
                showUpload:false,
                overwriteInitial:true,
                initialPreview:[
                    @if($service->img)
                            "{{asset('images/'.$service->img)}}",
                    @endif
                ],
                initialPreviewAsData:true,
                initialPreviewFileType:'image',
                {{--initialPreviewConfig:[--}}
                {{--    @if($service->img)--}}
                {{--    {caption:"{{$service->img}}",width:"120px",url:"{{route('admin.service.pic.destroy',[$service->id ,'_token'=>csrf_token()])}}" ,key:"{{$service->id}}"},--}}
                {{--    @endif--}}
                {{--]--}}
            })
        });
    </script>

@endsection
