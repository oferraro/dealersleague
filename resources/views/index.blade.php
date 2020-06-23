<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div style="text-align: center; margin: 25px auto; text-decoration: underline">
                <h1>{{$xml->broker->attributes()}} - {{$xml->broker->broker_details->company_name}}</h1>
            </div>

            <div>
                @include('office', ['offices' => $xml->broker->offices])
                    <div style="border: 1px solid black; padding: 25px; margin-top: 10px">
                        @foreach ($xml->broker->adverts->advert as $advert)
                            <div>
                            <div>ref {{$advert->attributes()['ref']}} - Office id {{$advert->attributes()['office_id']}} -
                                <b>{{$advert->attributes()['status']}}</b>
                            </div>


                                @include('advertImages', ['advert_media' => $advert->advert_media])

                                <hr />
                                <div id="details-{{$advert->attributes()['ref']}}">
                                    {{$advert->advert_features}}
                                    <div>{{$advert->advert_features->boat_type}}</div>
                                    <div>{{$advert->advert_features->boat_category}}</div>
                                    <div>{{$advert->advert_features->new_or_used}}</div>
                                    <div>{{$advert->advert_features->condition}}</div>
                                    <div>{{$advert->advert_features->was_in_charter ? 'It was in charter' : ''}}</div>
                                    <div>
                                        <b>Country</b>: {{$advert->advert_features->vessel_lying->attributes()}}
                                        {{$advert->advert_features->vessel_lying}}
                                    </div>

                                    <div>
                                        <b>Price</b>: {{$advert->advert_features->asking_price}} {{$advert->advert_features->asking_price->attributes()['currency']}}
                                    </div>
                                    <div><b>Vat included</b> {{$advert->advert_features->asking_price->attributes()['vat_included']}}</div>
                                    <div><b>Eu Tax</b> {{$advert->advert_features->asking_price->attributes()['eu_tax']}}</div>
                                    <div><b>Vat stated</b> {{$advert->advert_features->asking_price->attributes()['vat_stated']}}</div>

                                    <div>{!!$advert->advert_features->marketing_descs->marketing_desc[0] !!}</div>
                                    <div><b>Manufacturer</b>: {{$advert->advert_features->manufacturer}}</div>
                                    <div><b>Model</b>: {{$advert->advert_features->model}}</div>
                                </div>

                                @include('boatFeatures')
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.slider').bxSlider();
        });
    </script>
</html>
