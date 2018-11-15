<a href="/">Main</a>
Als je dit ziet zit je in admin

@foreach ($deelnemers as $deelnemer)
    <ul> {{ $deelnemer }}
        <form action="/admindelete/{{$deelnemer->id}}/delete" method="POST" >
            <input type="hidden" name="_method" value="DELETE" />
            {{ csrf_field() }}
            <button type="submit">Verwijder</button>
        </form> </ul>
@endforeach

