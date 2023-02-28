@extends('layout')

@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <div class="col-xs-12 carausel-sliderWidget">
            <div id="halim_related_movies-2xx" class="wrap-slider">
                <div class="section-bar clearfix">
                    <h3 class="section-title"><span>PHIM HOT</span></h3>
                </div>
                <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                    @foreach ($phimhot as $hot)
                        <article class="thumb grid-item post-38498">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('movie', $hot->slug) }}" title="">
                                    <figure><img class="lazy img-responsive"
                                            src="{{ asset('upload/movie/' . $hot->image) }}" alt=""
                                            title="{{ $hot->title }}"></figure>
                                    <span class="status">
                                        @if ($hot->resolution == 0)
                                            SD
                                        @elseif ($hot->resolution == 1)
                                            HD
                                        @elseif ($hot->resolution == 2)
                                            CAM
                                        @elseif ($hot->resolution == 3)
                                            FullDH
                                        @else
                                            Trailer
                                        @endif
                                    </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                        @if ($hot->phude == 0)
                                            VietSub
                                        @else
                                            Thuyết Minh
                                        @endif
                                    </span>
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title ">
                                            <p class="entry-title">{{ $hot->title }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <script>
                    jQuery(document).ready(function($) {
                        var owl = $('#halim_related_movies-2');
                        owl.owlCarousel({
                            loop: true,
                            margin: 4,
                            autoplay: true,
                            autoplayTimeout: 4000,
                            autoplayHoverPause: true,
                            nav: true,
                            navText: ['<i class="hl-down-open rotate-left"></i>',
                                '<i class="hl-down-open rotate-right"></i>'
                            ],
                            responsiveClass: true,
                            responsive: {
                                0: {
                                    items: 2
                                },
                                480: {
                                    items: 3
                                },
                                600: {
                                    items: 4
                                },
                                1000: {
                                    items: 4
                                }
                            }
                        })
                    });
                </script>
            </div>
            </section>
            <div class="clearfix"></div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            @foreach ($category_home as $cate_home)
                <section id="halim-advanced-widget-2">
                    <div class="section-heading">
                        <a href="danhmuc.php" title="Phim Bộ">
                            <span class="h-text">{{ $cate_home->title }}</span>
                        </a>
                    </div>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                        @foreach ($cate_home->movie->take(6) as $mov_home)
                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $mov_home->slug) }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('upload/movie/' . $mov_home->image) }}" alt=""
                                                title="{{ $mov_home->title }}">
                                        </figure>
                                        <span class="status">
                                            @if ($mov_home->resolution == 0)
                                                SD
                                            @elseif ($mov_home->resolution == 1)
                                                HD
                                            @elseif ($mov_home->resolution == 2)
                                                CAM
                                            @elseif ($mov_home->resolution == 3)
                                                FullDH
                                            @else
                                                Trailer
                                            @endif
                                        </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                            @if ($mov_home->phude == 0)
                                                VietSub
                                            @else
                                                Thuyết Minh
                                            @endif
                                        </span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $mov_home->title }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
                <div class="clearfix"></div>
            @endforeach
        </main>

        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
            <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
                <div class="section-bar clearfix">
                    <div class="section-title">
                        <span>Phim Sắp chiếu</span>
                    </div>
                </div>
                <section class="tab-content">
                    <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                        <div class="halim-ajax-popular-post-loading hidden"></div>
                        <div id="halim-ajax-popular-post" class="popular-post">
                            @foreach ($trailer as $trai)
                                <div class="item post-37176">
                                    <a href="{{ route('movie', $trai->slug) }}" title="{{ $trai->title }}">
                                        <div class="item-link">
                                            <img src="{{ asset('upload/movie/' . $trai->image) }}" class="lazy post-thumb"
                                                alt="" title="{{ $trai->title }}" />
                                            <span class="is_trailer">
                                                @if ($trai->resolution == 0)
                                                    SD
                                                @elseif ($trai->resolution == 1)
                                                    HD
                                                @elseif ($trai->resolution == 2)
                                                    CAM
                                                @elseif ($trai->resolution == 3)
                                                    FullDH
                                                @else
                                                    Trailer
                                                @endif
                                            </span>
                                        </div>
                                        <p class="title">{{ $trai->title }}</p>
                                    </a>
                                    <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                    <div style="float: left;">
                                        <span class="user-rate-image post-large-rate stars-large-vang"
                                            style="display: block;/* width: 100%; */">
                                            <span style="width: 0%"></span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <div class="clearfix"></div>


            </div>
        </aside>

        {{-- sidebar --}}
        @include('pages.include.sidebar')

        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
            <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
                <div class="section-bar clearfix">
                    <div class="section-title">
                        <span>Top Views</span>
                    </div>
                </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#ngay"
                            role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#thang"
                            role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div id="halim-ajax-popular-post-default" class="popular-post">
                        <span id="show_data_default"></span>
                    </div>
                    <div class="tab-pane fade show active" id="ngay" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div id="halim-ajax-popular-post" class="popular-post">
                            <span id="show_data"></span>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </aside>
    </div>
@endsection
