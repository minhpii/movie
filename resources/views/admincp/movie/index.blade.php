@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">Liệt kê phim
                        <a href="{{ route('movie.create') }}" class="btn btn-primary float-end">Thêm phim</a>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-bordered" id="tablemovie">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Genre</th>
                                    <th>Country</th>
                                    <th>Image</th>
                                    <th>Phim HOT</th>
                                    <th>Chất lượng</th>
                                    <th>Phụ đề</th>
                                    <th>Năm phim</th>
                                    <th>Topviews</th>
                                    <th>Số Tập</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($movie as $mov)
                                    <tr>
                                        <td>{{ $mov->id }}</td>
                                        <td>{{ $mov->title }}</td>
                                        <td>{{ $mov->category->title }}</td>
                                        <td>
                                            @foreach ($mov->movie_genre as $mo_co)
                                                <span class="badge text-bg-dark">{{ $mo_co->title }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $mov->country->title }}</td>
                                        <td>
                                            <img src="{{ asset('upload/movie/' . $mov->image) }}" width="50px"
                                                height="50px" alt="">
                                        </td>
                                        <td>{{ $mov->phimhot == 0 ? 'Không' : ' Có' }}</td>
                                        <td>
                                            @if ($mov->resolution == 0)
                                                SD
                                            @elseif ($mov->resolution == 1)
                                                HD
                                            @elseif ($mov->resolution == 2)
                                                CAM
                                            @elseif ($mov->resolution == 3)
                                                FullDH
                                            @else
                                                Trailer
                                            @endif
                                        </td>
                                        <td>{{ $mov->phude == 0 ? 'VietSub' : ' Thuyết Minh' }}</td>
                                        <td>
                                            <select name="year" class="select-year" id="{{ $mov->id }}">
                                                <option value="{{ $mov->id }}">{{ $mov->year }}</option>
                                                @php
                                                    $datetime = getdate();
                                                    $year = $datetime['year'];
                                                    for ($i = 2000; $i <= $year; $i++) {
                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                    }
                                                @endphp

                                            </select>
                                        </td>
                                        <td>
                                            <select name="topview" class="select-topview" id="{{ $mov->id }}">
                                                @if ($mov->topview == 0)
                                                    <option value="0" selected>Ngày</option>
                                                    <option value="1">Tuần</option>
                                                    <option value="2">Tháng</option>
                                                @elseif($mov->topview == 1)
                                                    <option value="0">Ngày</option>
                                                    <option value="1" selected>Tuần</option>
                                                    <option value="2">Tháng</option>
                                                @else
                                                    <option value="0">Ngày</option>
                                                    <option value="1">Tuần</option>
                                                    <option value="2" selected>Tháng</option>
                                                @endif

                                            </select>
                                        </td>
                                        <td>{{ $mov->sotap }}</td>
                                        <td>{{ $mov->status == 0 ? 'Ẩn' : ' Hiện' }}</td>
                                        <td>
                                            <a href="{{ route('movie.edit', $mov->id) }}"><button
                                                    class="btn btn-success">Sửa</button></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('movie.destroy', $mov->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button onclick="return confirm('bạn có muốn xóa?');"
                                                    class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
