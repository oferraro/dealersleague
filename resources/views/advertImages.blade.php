@foreach($advert_media as $media)
    <div>
        {{$media->media->attributes()['type']}} - {{$media->media->attributes()['caption']}}
        - {{$media->media->attributes()['modified']}}
        <div class="slider">
            @foreach ($media->media as $file)
                <div>
                    <img style="max-height: 250px; text-align: center" src="{{$file}}" title="Funky roots">
                </div>
            @endforeach
        </div>
    </div>
@endforeach
