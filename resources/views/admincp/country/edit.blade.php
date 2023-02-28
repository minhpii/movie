@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-header">Sửa quốc gia</div>
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
                        <form action="{{ route('country.update', [$country->id]) }}" method="Post">
                            @method('PUT')
                            @csrf
                            <div class="mt-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $country->title }}" id="slug"
                                    onkeyup="ChangeToSlug()" class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" value="{{ $country->slug }}" id="convert_slug"
                                    class="form-control" placeholder="...">
                            </div>

                            <div class="mt-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="5" class="form-control">{{ $country->description }}</textarea>
                            </div>

                            <div class="mt-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{ $country->status == 1 ? 'checked' : '' }}>
                            </div>

                            <button type="submit" class="btn btn-success float-end">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
