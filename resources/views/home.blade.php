@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bvn verification') }}</div>

                <div class="card-body">
                    @include('includes.messages')
                    @include('includes.bvn-verification')
                    
                    @can ('view details')
                        <p>dfadsf</p>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
