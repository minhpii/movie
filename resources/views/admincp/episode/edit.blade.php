@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-header">Sửa tập phim</a></div>
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
                        <form action="{{ route('episode.update', $episode->id) }}" method="Post">
                            @method('PUT')
                            @csrf
                            <div class="mt-3">
                                <label for="">Movie</label>
                                <select name="movie_id" class="form-control movie_id">
                                    <option value="">---Country---</option>
                                    @foreach ($movie as $mo)
                                        <option
                                            value="{{ $mo->id }}"{{ $episode->movie_id == $mo->id ? 'selected' : '' }}>
                                            {{ $mo->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="">Link phim</label>
                                <input type="text" name="linkphim" value="{{ $episode->linkphim }}" class="form-control"
                                    placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Tập phim</label>
                                <select name="episode" class="form-control" id="episode">
                                    <option
                                        value="{{ $episode->id }}"{{ $episode->episode == $episode->id ? 'selected' : '' }}>
                                        {{ $episode->episode }}</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success float-end">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
