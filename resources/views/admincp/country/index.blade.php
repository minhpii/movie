@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">Liệt kê quốc gia
                        <a href="{{ route('country.create') }}" class="btn btn-primary float-end">Thêm quốc gia</a>
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
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($country as $cou)
                                    <tr>
                                        <td>{{ $cou->id }}</td>
                                        <td>{{ $cou->title }}</td>
                                        <td>{{ $cou->status == 0 ? 'Ẩn' : ' Hiện' }}</td>
                                        <td>
                                            <a href="{{ route('country.edit', [$cou->id]) }}"><button
                                                    class="btn btn-success">Sửa</button></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('country.destroy', [$cou->id]) }}" method="post">
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
