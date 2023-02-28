@extends('echo365.layouts.master')
@section('title', 'Home')
@section('content')
    @if ($tickers->ticker_status == 'show')
        <section class="my-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="webTicker">
                            @foreach ($posts as $post)
                                <li>
                                    <a href="{{ route('echo365.post', $post->id) }}" class="text-dark text-wrap bg-body-secondary fs-5">
                                        {{ $post->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- home banner  --}}
    @include('echo365.section.home-banner')

    @if ($home_ad_data->above_search_ad_status == 'show')
        <div class="ad-section-2 above-search-ad">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if ($home_ad_data->above_search_ad_url == '')
                            <img src="{{ asset('uploads/' . $home_ad_data->above_search_ad) }}" alt="above-serach-ad"
                                class="img-fluid">
                        @else
                            <a href="{{ $home_ad_data->above_search_ad_url }}"><img
                                    src="{{ asset('uploads/' . $home_ad_data->above_search_ad) }}" alt="above-serach-ad"
                                    class="img-fluid rounded"></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif



    {{-- search content   --}}
    @include('echo365.section.home-search')

    {{-- home content   --}}
    @include('echo365.section.home-content')


    {{-- video content  --}}
    @include('echo365.section.home-video')

    @if ($home_ad_data->above_footer_ad_status == 'show')
        <div class="ad-section-3 above-footer-ad">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if ($home_ad_data->above_footer_ad_url == '')
                            <img src="{{ asset('uploads/' . $home_ad_data->above_footer_ad) }}" alt="above-footer-ad"
                                class="img-fluid">
                        @else
                        @endif
                        <a href="{{ $home_ad_data->above_footer_ad_url }}"><img
                                src="{{ asset('uploads/' . $home_ad_data->above_footer_ad) }}" alt="above-footer-ad"
                                class="img-fluid"></a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
