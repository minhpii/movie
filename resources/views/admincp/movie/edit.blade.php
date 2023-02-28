@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-header">Sửa phim</a></div>
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
                        <form action="{{ route('movie.update', $movie->id) }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mt-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $movie->title }}" id="slug"
                                    onkeyup="ChangeToSlug()" class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" value="{{ $movie->slug }}" id="convert_slug"
                                    class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mt-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="5" class="form-control">{{ $movie->description }}</textarea>
                            </div>

                            <div class="mt-3">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">---Category---</option>
                                    @foreach ($category as $cat)
                                        <option
                                            value="{{ $cat->id }}"{{ $movie->category_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="">Genre </label><br>
                                @foreach ($genre as $gen)
                                    <input type="checkbox" name="genre_id[]" value="{{ $gen->id }}"
                                        {{ $movie_genre && $movie_genre->contains($gen->id) ? 'checked' : '' }}>
                                    <label for="">{{ $gen->title }}</label>
                                @endforeach
                            </div>

                            <div class="mt-3">
                                <label for="">Country</label>
                                <select name="country_id" class="form-control">
                                    <option value="">---Country---</option>
                                    @foreach ($country as $co)
                                        <option value="{{ $co->id }}"
                                            {{ $movie->country_id == $co->id ? 'selected' : '' }}>{{ $co->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{ $movie->status == 1 ? 'checked' : '' }}>

                                <label for="">Phim hot</label>
                                <input type="checkbox" name="phimhot" {{ $movie->phimhot == 1 ? 'checked' : '' }}>

                                <label for="">Chất lượng</label>
                                <select name="resolution">
                                    @if ($movie->resolution == 0)
                                        <option value="0" selected>SD</option>
                                        <option value="1">HD</option>
                                        <option value="2">CAM</option>
                                        <option value="3">FullHD</option>
                                        <option value="4">Trailer</option>
                                    @elseif ($movie->resolution == 1)
                                        <option value="0">SD</option>
                                        <option value="1" selected>HD</option>
                                        <option value="2">CAM</option>
                                        <option value="3">FullHD</option>
                                        <option value="4">Trailer</option>
                                    @elseif ($movie->resolution == 2)
                                        <option value="0">SD</option>
                                        <option value="1">HD</option>
                                        <option value="2" selected>CAM</option>
                                        <option value="3">FullHD</option>
                                        <option value="4">Trailer</option>
                                    @elseif ($movie->resolution == 3)
                                        <option value="0">SD</option>
                                        <option value="1">HD</option>
                                        <option value="2">CAM</option>
                                        <option value="3" selected>FullHD</option>
                                        <option value="4">Trailer</option>
                                    @else
                                        <option value="0">SD</option>
                                        <option value="1">HD</option>
                                        <option value="2">CAM</option>
                                        <option value="3">FullHD</option>
                                        <option value="4" selected>Trailer</option>
                                    @endif
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="">Phụ đề</label>
                                <select name="phude">
                                    @if ($movie->phude == 0)
                                        <option value="0" selected>VietSub</option>
                                        <option value="1">Thuyết Minh</option>
                                    @else
                                        <option value="0">VietSub</option>
                                        <option value="1" selected>Thuyết Minh</option>
                                    @endif
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="">Thời lượng phim</label>
                                <input type="text" name="thoiluong" value="{{ $movie->thoiluong }}"
                                    class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Tag Phim</label>
                                <textarea name="tag" rows="5" class="form-control">{{ $movie->tag }}</textarea>
                            </div>

                            <div class="mt-3">
                                <label for="">Trailer</label>
                                <input type="text" name="trailer" value="{{ $movie->trailer }}" class="form-control"
                                    placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Số Tập</label>
                                <input type="text" name="sotap" value="{{ $movie->sotap }}" class="form-control"
                                    placeholder="...">
                            </div>

                            <button type="submit" class="btn btn-primary float-end">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
