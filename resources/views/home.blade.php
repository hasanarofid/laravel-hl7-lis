@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  @php
                  
                    //   dd($message);
                  @endphp
                  <p> <b>SEGMENT : </b> : <i>{{ $message->toString() }}</i> </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
