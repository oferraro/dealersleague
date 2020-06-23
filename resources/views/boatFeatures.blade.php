
@foreach($advert->boat_features as $feature)

    @include('keyValues', ['keyValues' => $feature->dimensions])
    @include('keyValues', ['keyValues' => $feature->build])
    @include('keyValues', ['keyValues' => $feature->galley])
    @include('keyValues', ['keyValues' => $feature->engine])
    @include('keyValues', ['keyValues' => $feature->navigation])
    @include('keyValues', ['keyValues' => $feature->accommodation])
    @include('keyValues', ['keyValues' => $feature->safety_equipment])
    @include('keyValues', ['keyValues' => $feature->rig_sails])
    @include('keyValues', ['keyValues' => $feature->electronics])
    @include('keyValues', ['keyValues' => $feature->equipment])
    @include('keyValues', ['keyValues' => $feature->other_equipment])
    @include('keyValues', ['keyValues' => $feature->equip_inflatable])

@endforeach


