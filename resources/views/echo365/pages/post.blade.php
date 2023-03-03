@extends('echo365.layouts.master')
@section('title', $post->title)
@section('content')
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4">{{ $post->title }}</h2>
                    <nav class="breadcrumb mb-4 border-top border-bottom">
                        <ol class="breadcrumb m-0 py-2">
                            <li class="breadcrumb-item"><a href="{{ route('echo365.home') }}">Home</a></li>
                            <li class="breadcrumb-item">
                                <a href="">
                                    {{ $post->rSubCategory->subcategory_name }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="mb-4">
                        <img src="{{ asset('uploads/' . $post->image) }}" alt="{{ $post->image }}" class="img-fluid">
                    </div>
                    <div class="py-2 border-top border-bottom d-flex text-muted mb-4">
                        <div class="item me-4">
                            <b><i class="bi bi-person-fill"></i></i></b>
                            <a href=""  class="text-dark text-decoration-none">
                                @if ($post->author_id)
                                    {{ $post->rAuthor->name }}
                                @elseif($post->admin_id)
                                    {{ $post->rAdmin->name }}
                                @endif
                            </a>
                        </div>
                        <div class="item me-4">
                            <b><i class="bi bi-pencil-square"></i></i></b>
                            <a href="" class="text-dark text-decoration-none">{{ $post->rSubCategory->subcategory_name }}</a>
                        </div>
                        <div class="item me-4">
                            <b><i class="bi bi-clock-fill"></i></b>
                            {{ date('d-M-Y', strtotime($post->updated_at)) }}
                        </div>
                        <div class="item">
                            <b><i class="bi bi-eye-fill"></i></b>
                            {{ $post->visitors }}
                        </div>
                    </div>
                    <div class="main-text">
                        <p>{!! nl2br($post->detail) !!}</p>
                    </div>
                    <div class="tag-section">
                        <h2>Tags</h2>
                        <div class="tag-section-content">
                            @foreach ($post->rTag as $tag)
                                <a href="#"><span class="badge bg-success">{{ $tag->tag }}</span></a>
                            @endforeach
                        </div>
                    </div>
                    @if ($post->is_share)
                        <div class="share-content">
                            <h2>Share</h2>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    @endif

                    @if ($post->is_comment)
                        <div class="comment-fb">
                            <h2>Comment</h2>
                            <div id="disqus_thread"><iframe id="dsq-app5690" name="dsq-app5690" allowtransparency="true"
                                    frameborder="0" scrolling="no" tabindex="0" title="Disqus" width="100%"
                                    src="https://disqus.com/embed/comments/?base=default&amp;f=arefindev-com&amp;t_u=file%3A%2F%2F%2FC%3A%2Fxampp%2Fhtdocs%2FNew%2520folder%2Ffront_end_html%2Fpost.html&amp;t_d=News%20Portal%20Website&amp;t_t=News%20Portal%20Website&amp;s_o=default#version=32cb46cdaa31315fb4bfbf5dac80fb16"
                                    style="width: 1px !important; min-width: 100% !important; border: none !important; overflow: hidden !important; height: 75px !important;"
                                    horizontalscrolling="no" verticalscrolling="no"></iframe></div>
                            <script>
                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document,
                                        s = d.createElement('script');
                                    s.src = 'https://arefindev-com.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                        </div>
                    @endif
                    <div class="related-news">
                        <div class="related-news-heading">
                            <h2>Related News</h2>
                        </div>
                        <div class="related-post-carousel owl-carousel owl-theme owl-loaded owl-drag">

                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-323px, 0px, 0px); transition: all 0s ease 0s; width: 970px;">
                                    <div class="owl-item" style="width: 293.005px; margin-right: 30px;">
                                        <div class="item">
                                            <div class="photo">
                                                <img src="uploads/n6.jpg" alt="">
                                            </div>
                                            <div class="category">
                                                <span class="badge bg-success">International</span>
                                            </div>
                                            <h3><a href="">Haaland scores before going off injured in Dortmund win
                                                    and it is very real</a></h3>
                                            <div class="date-user">
                                                <div class="user">
                                                    <a href="">Paul David</a>
                                                </div>
                                                <div class="date">
                                                    <a href="">10 Jan, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 293.005px; margin-right: 30px;">
                                        <div class="item">
                                            <div class="photo">
                                                <img src="uploads/n6.jpg" alt="">
                                            </div>
                                            <div class="category">
                                                <span class="badge bg-success">International</span>
                                            </div>
                                            <h3><a href="">Haaland scores before going off injured in Dortmund win
                                                    and it is very real</a></h3>
                                            <div class="date-user">
                                                <div class="user">
                                                    <a href="">Paul David</a>
                                                </div>
                                                <div class="date">
                                                    <a href="">10 Jan, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 293.005px; margin-right: 30px;">
                                        <div class="item">
                                            <div class="photo">
                                                <img src="uploads/n6.jpg" alt="">
                                            </div>
                                            <div class="category">
                                                <span class="badge bg-success">International</span>
                                            </div>
                                            <h3><a href="">Haaland scores before going off injured in Dortmund win
                                                    and it is very real</a></h3>
                                            <div class="date-user">
                                                <div class="user">
                                                    <a href="">Paul David</a>
                                                </div>
                                                <div class="date">
                                                    <a href="">10 Jan, 2022</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav">
                                <div class="owl-prev"><i class="fas fa-angle-left"></i></div>
                                <div class="owl-next disabled"><i class="fas fa-angle-right"></i></div>
                            </div>
                            <div class="owl-dots">
                                <div class="owl-dot"><span></span></div>
                                <div class="owl-dot active"><span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
