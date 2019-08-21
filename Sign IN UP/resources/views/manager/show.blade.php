@extends('layouts.app')
{{--box-shadow: 0 -20px 20px -25px #333;--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active text-dark" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Check</a>
                            <a class="nav-item nav-link text-success" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Answered</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @forelse ($declarations->where('check', 0) as $declaration)
                                    <div class="card " style="box-shadow: 0 -20px 20px -25px #333;">
                                        <div class="card-header">
                                            <div class="float-lg-left font-weight-bold">{{ $declaration->User->name }}</div> <div class="float-md-right">*ID {{ $declaration->id }}</div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $declaration->name_declaration }}</h5>
                                            <p class="card-text ">{{ $declaration->declaration }}</p>
                                            <p class="card-text ">Email: <i>{{ $declaration->User->email }}</i></p>
                                            @if ($declaration->url_image == '0')
                                                <button class="btn btn-outline-secondary" disabled>NO file</button>
                                            @else
                                                <a href="{{ $declaration->url_image }}" class="btn btn-outline-secondary">URL file</a>
                                            @endif
                                            <a href="{{ route('manager.store', ['id' => $declaration->id]) }}" class="btn btn-outline-success float-md-right">Answered the declaration</a>
                                        </div>
                                        <div class="card-footer text-muted">
                                                {{ date('d F Y', strtotime($declaration->created_at)) }}
                                        </div>
                                    </div>
                                    <br>
                                @empty
                                    <p class="card-header text-dark text-center">Not declaration</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @forelse ($declarations->where('check', 1) as $declaration)
                                    <div class="card border-success" style="box-shadow: 0 -20px 20px -25px #333;">
                                        <div class="card-header">
                                            <div class="float-lg-left font-weight-bold">{{ $declaration->User->name }}</div> <div class="float-md-right">*ID {{ $declaration->id }}</div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $declaration->name_declaration }}</h5>
                                            <p class="card-text ">{{ $declaration->declaration }}</p>
                                            <p class="card-text ">Email: <i>{{ $declaration->User->email }}</i>
                                                @if ($declaration->url_image == '0')
                                                    <button class="btn btn-outline-secondary float-md-right" disabled>NO file</button>
                                                @else
                                                    <a href="{{ $declaration->url_image }}" class="btn btn-outline-secondary float-md-right">URL file</a>
                                            @endif
                                        </div>
                                        <div class="card-footer text-muted">
                                            {{ date('d F Y', strtotime($declaration->created_at)) }}
                                        </div>
                                    </div>
                                    <br>
                                @empty
                                    <p class="card-header text-dark text-center">Not declaration</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
