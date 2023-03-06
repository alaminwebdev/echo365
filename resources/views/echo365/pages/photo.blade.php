@extends('echo365.layouts.master')
@section('title', 'Photos')
@section('content')
    <section class="subcategory-content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center pb-4 mb-4 border-bottom">
                                    <h3 class="fst-italic ">
                                        Photos
                                    </h3>
                                </div>
                            </div>
                            @foreach ($photos as $photo)
                                <div class="col-lg-6 col-md-12 col-sm-6">
                                    <div class="px-4 py-5 mb-4  text-white latest-post rounded"
                                        style="background-image: url('{{ asset('uploads/' . $photo->photo) }}');">
                                        <div class="px-0 pt-4">
                                            <p class="fs-5 fst-italic">
                                                <a href="{{ asset('uploads/' . $photo->photo) }}" class="text-white post-link magnific"  title="{{ $photo->caption }}">
                                                    {{ Str::limit($photo->caption, 50, '...') }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $photos->onEachSide(2)->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- @include('echo365.section.sidebar-content') --}}
                </div>
            </div>
        </div>
    </section>
@endsection
