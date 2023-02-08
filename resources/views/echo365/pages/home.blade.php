@extends('echo365.layouts.master')
@section('title', 'Home')
@section('content')
    {{-- home banner  --}}
    @include('echo365.section.home-banner')

    <div class="ad-section-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href=""><img src="uploads/ad-1.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    {{-- search content   --}}
    @include('echo365.section.search-content')

    {{-- search content   --}}
    @include('echo365.section.home-content')


    {{-- video content  --}}
    @include('echo365.section.video-content')
@endsection
