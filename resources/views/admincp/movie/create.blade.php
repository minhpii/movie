@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-header">Thêm phim</a></div>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <div class="card-body">
                        <form action="{{ route('movie.store') }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label for="">Title</label>
                                <input type="text" name="title" id="slug" onkeyup="ChangeToSlug()"
                                    class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" id="convert_slug" class="form-control"
                                    placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mt-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="mt-3">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">---Category---</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="">Genre </label><br>
                                @foreach ($genre as $gen)
                                    <input type="checkbox" name="genre_id[]" value="{{ $gen->id }}">
                                    <label for="">{{ $gen->title }}</label>
                                @endforeach
                            </div>

                            <div class="mt-3">
                                <label for="">Country</label>
                                <select name="country_id" class="form-control">
                                    <option value="">---Country---</option>
                                    @foreach ($country as $co)
                                        <option value="{{ $co->id }}">{{ $co->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status">

                                <label for="">Phim hot</label>
                                <input type="checkbox" name="phimhot">

                                <label for="">Chất lượng</label>
                                <select name="resolution">
                                    <option value="0">SD</option>
                                    <option value="1">HD</option>
                                    <option value="2">CAM</option>
                                    <option value="3">FullHD</option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="">Phụ đề</label>
                                <select name="phude">
                                    <option value="0">VietSub</option>
                                    <option value="1">Thuyết Minh</option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="">Thời lượng phim</label>
                                <input type="text" name="thoiluong" class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Tag Phim</label>
                                <textarea name="tag" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="mt-3">
                                <label for="">Trailer</label>
                                <input type="text" name="trailer" class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Số Tập</label>
                                <input type="text" name="sotap" class="form-control" placeholder="...">
                            </div>

                            <button type="submit" class="btn btn-primary float-end">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
