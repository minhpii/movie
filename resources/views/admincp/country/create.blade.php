@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-header">Thêm quốc gia</div>
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
                        <form action="{{ route('country.store') }}" method="Post">
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
                                <label for="">Description</label>
                                <textarea name="description" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="mt-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status">
                            </div>

                            <button type="submit" class="btn btn-primary float-end">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
