@extends('declaration.declarationIndex')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Message</div>
                        <p class="successful">Your declaration has been sent to the Manager. The following declaration can be sent only after 24 hours!!!</p>
                        <a class="btn btn-outline-secondary successful" style="border-color: #dfdfdf" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
