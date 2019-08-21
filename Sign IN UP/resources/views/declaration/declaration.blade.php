@extends('declaration.declarationIndex')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Feedback</div>
                    @if(Session::has('flash message'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>
                                    You can't use feedback today!
{{--                                    {{ Session::get('flash_message') }}--}}
                                </li>
                            </ul>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['route' => 'declaration.store', 'files'=>'true']) !!}
                    {{ csrf_field() }}
                        <div class="col-md-10">
                            {{Form::label('name_declaration', 'The name of the declaration')}}
                        </div>
                        <div class="col-md-6">
                            {{Form::text('name_declaration',null, ['class' => 'form-control'])}}
                        </div>
{{--                        <div class="col-md-10">--}}
{{--                            {{Form::label('Email', 'Email (Mail for reply)')}}--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            {{Form::text('Email',null, ['class' => 'form-control'])}}--}}
{{--                        </div>--}}
                        <div class="col-md-10">
                            {{Form::label('declaration', 'Declaration')}}
                        </div>
                        <div class="col-md-8">
                            {{Form::textarea('declaration',null, ['class' => 'form-control'])}}
                        </div>
                        <div class="custom-file">
                            {{Form::file('url_image',['class' => 'custom-file-input'],['id' => 'customFile'])}}
                            {{Form::label('url_image', 'Choose file (you can choose not to)',['class' => 'custom-file-label'])}}
                        </div>
                        <div class="col-md-5">
                            {{Form::submit('Send declaration',['class' => 'btn btn-secondary '],['id' => 'submitPost'])}}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
