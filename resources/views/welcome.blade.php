@extends('layouts.app')



@section('content')
<div class="signup-list">
    <p>VMB signup pagina<br></p>

    <p>Aanwezig:</p>
        @foreach ($deelnemers as $deelnemer)

        <li>{{ $deelnemer->naam }}</li>
        @endforeach
</div>
@endsection
    </body>
</html>
