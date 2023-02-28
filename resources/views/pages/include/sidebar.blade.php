<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim HOT</span>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($hot_sidebar as $sidebar)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $sidebar->slug) }}" title="{{ $sidebar->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('upload/movie/' . $sidebar->image) }}" class="lazy post-thumb"
                                        alt="" title="{{ $sidebar->title }}" />
                                    <span class="is_trailer">
                                        @if ($sidebar->resolution == 0)
                                            SD
                                        @elseif ($sidebar->resolution == 1)
                                            HD
                                        @elseif ($sidebar->resolution == 2)
                                            CAM
                                        @elseif ($sidebar->resolution == 3)
                                            FullDH
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{ $sidebar->title }}</p>
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
