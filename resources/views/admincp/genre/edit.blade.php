@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-header">Sửa thể loại</div>
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
                        <form action="{{ route('genre.update', [$genre->id]) }}" method="Post">
                            @method('PUT')
                            @csrf
                            <div class="mt-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $genre->title }}" id="slug"
                                    onkeyup="ChangeToSlug()" class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" value="{{ $genre->slug }}" id="convert_slug"
                                    class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="5" class="form-control">{{ $genre->description }}</textarea>
                            </div>

                            <div class="mt-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{ $genre->status == 1 ? 'checked' : '' }}>
                            </div>

                            <button type="submit" class="btn btn-success float-end">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
