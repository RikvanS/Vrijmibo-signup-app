@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vrijmibo aanmeld formulier</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
<div class="signup-main">
    <form action="/" method="POST" class="signup-form">
        {{ csrf_field() }}
        <div class="form-content">
            <button type="submit">Bevestig</button>
        </div>
    </form>
    <br>
    <form action="/delete" method="POST" class="signup-form">
        {{ csrf_field() }}
        <div class="form-content">
            <button type="submit">Meld af</button>
        </div>
    </form>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
