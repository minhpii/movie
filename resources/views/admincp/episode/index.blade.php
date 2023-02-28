@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">Liệt kê tập phim
                        <a href="{{ route('episode.create') }}" class="btn btn-primary float-end">Thêm tập phim</a>
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
                                    <th>Movie</th>
                                    <th>Link phim</th>
                                    <th>Tập phim</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($episode as $epi)
                                    <tr>
                                        <td>{{ $epi->id }}</td>
                                        <td>{{ $epi->movie->title }}</td>
                                        <td>{!! $epi->linkphim !!}</td>
                                        <td>{{ $epi->episode }}</td>
                                        <td>
                                            <a href="{{ route('episode.edit', $epi->id) }}"><button
                                                    class="btn btn-success">Sửa</button></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('episode.destroy', $epi->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa?')"
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
