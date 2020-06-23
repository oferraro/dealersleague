


@foreach ($offices as $office)
<div>
    <h2>Office {{$office->office->attributes()['id']}} - {{$office->office->office_name}}</h2>
</div>
<div style="border: 1px solid black; padding: 25px 15px">
    <div style="text-align: center">
        <h3>
            <b>Name</b>
            {{$office->office->name->title}}
            {{$office->office->name->forename}}
            {{$office->office->name->surname}}
            - {{$xml->broker->adverts->attributes()["number"]}}
        </h3>
    </div>
    <div>
        <b>Address</b>
        <svg class="bi bi-map" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15.817.613A.5.5 0 0 1 16 1v13a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 14.51l-4.902.98A.5.5 0 0 1 0 15V2a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0l4.902.98 4.902-.98a.5.5 0 0 1 .415.103zM10 2.41l-4-.8v11.98l4 .8V2.41zm1 11.98l4-.8V1.61l-4 .8v11.98zm-6-.8V1.61l-4 .8v11.98l4-.8z"/>
        </svg>
        {{$office->office->address}},
        {{$office->office->town}},
        {{$office->office->country->attributes()['code'] ? ", " . $office->office->country->attributes()['code'] : ''}}
        {{$office->office->postcode}}
    </div>
    <div>Phone: {{$office->office->daytime_phone}}</div>
    <div>Fax: {{$office->office->fax}}</div>
    <div>Mobile: {{$office->$office->mobile}}</div>
    <div>
        <a href="mailto:{{$office->office->email}}">Email: {{$office->office->email}}</a>
    </div>
    <div>
        <a href="{{$office->office->website}}">Web: {{$office->office->website}}</a>
    </div>
</div>
@endforeach
