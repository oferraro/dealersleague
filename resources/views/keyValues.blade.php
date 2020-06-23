
@foreach($keyValues as $key => $value)
    <div>
        <div style="text-align: center">
            <h3>{{$key}}</h3>
        </div>
        @foreach ($value as $k => $v)
            @if (trim($v) != '')
                <div>
                    <b>{{$v->attributes()}}</b>: {{$v}}
                </div>
            @endif
        @endforeach
    </div>
@endforeach
