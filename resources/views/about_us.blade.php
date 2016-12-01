@extends('_master')
@section('title', 'About Us')
@push('styles')
<style type="text/css">

</style>
@endpush

@push('scripts')
<script>

</script>
@endpush

@section('content')
   <div class="main-content">
    <div id="img-container-aboutus">
        <svg id="auLine"  width="100%" height="100%">
            <line class="line-path" x1="0" y1="13%" x2="91%" y2="56%" style="stroke:#B9B9B9;stroke-width:2" />
             Sorry, your browser does not support inline SVG.
        </svg>
        <img src="{{ asset('images/'.$aboutImage) }}" alt="About-Us" />
        <div class="director-content">
            <div id="left"></div>
            <div id="right">
            @foreach($content as $key => $director)
                <a class="profile-name" href="{{ $director->linkedin }}">
                    <h2 class="ui header">
                      {{ $director->director_name }}
                      <div class="sub header">{{ $director->director_position }}</div>
                    </h2>
                </a>
            @endforeach
            </div>
        </div>
    </div>
</div>  

@endsection