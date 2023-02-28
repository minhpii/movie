@extends('layout')

@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{ route('loc') }}">## Lọc Phim
                                        ##</a></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>Lọc Phim</span></h1>
                </div>

                <div class="section-bar clearfix">
                    <div class="row">
                        <form action="{{ route('locphim') }}" method="GET">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="order" id="exampleFormControlSelect1">
                                        <option value="">--Sắp xếp--</option>
                                        <option value="date">Ngày đăng</option>
                                        <option value="year_release">Năm sản suất</option>
                                        <option value="name_a_z">Tên phim</option>
                                        <option value="watch_views">Lượt xem</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="genre" id="exampleFormControlSelect1">
                                        <option value="">--Thể loại--</option>
                                        @foreach ($genre as $gen_loc)
                                            <option value="{{ $gen_loc->id }}">{{ $gen_loc->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="country" id="exampleFormControlSelect1">
                                        <option value="">--Quốc gia--</option>
                                        @foreach ($country as $cou_loc)
                                            <option value="{{ $cou_loc->id }}">{{ $cou_loc->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="year" id="exampleFormControlSelect1">
                                        <option value="">--Năm phim--</option>
                                        @php
                                            $datetime = getdate();
                                            $year = $datetime['year'];
                                            for ($i = 2000; $i <= $year; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        @endphp
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-default btn-sm" value="Lọc Phim">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>

        {{-- sidebar --}}
        @include('pages.include.sidebar')
    </div>
@endsection
