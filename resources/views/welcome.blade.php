@extends('layouts.app')

@section('content')
<div class="signup-list">
    <p>VMB signup pagina<br></p>

    <p>Aanwezig:</p>
</div>
    <div class="bullet-list">
        <ul>
            @foreach ($deelnemers as $deelnemer)
        
            <li>{{ $deelnemer->naam }}</li>
            @endforeach
        </ul>
    </div>

@endsection
    </body>
</html>
