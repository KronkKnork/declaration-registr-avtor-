@extends('layouts.app')

@section('btn')
    @if (Auth::user()->is_manager)
        <a class=" btn btn-outline-secondary float-md-right border-0" href="manager">Check Declaration</a>
    @else
        <a class="btn btn-outline-secondary float-md-right border-0" href="declaration">Write Declaration</a>
    @endif
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Message</div>

                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (Auth::user()->is_manager)
                            <br>
                            You are logged in manager!
                            <a class="btn btn-outline-secondary float-md-right" style="border-color: #dfdfdf" href="manager">Check Declaration</a>
                        @else
                            <br>
                            You are logged in!
                            <a class="btn btn-outline-secondary float-md-right" style="border-color: #dfdfdf" href="declaration">Write Declaration</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
