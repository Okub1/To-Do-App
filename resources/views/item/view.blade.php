@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h4">{{ $item->name }}</div>
                    <div class="p-2">
                        <div class="d-flex justify-content-around p-1 my-1">
                            <p class="d-flex p-1">
                                {{ $item->text }}
                            </p>
                        </div>
                        <div class="p-1">
                            <div class="mt-1 pt-1 border-top text-secondary">
                                categories:
                                @foreach($item->categories as $category)
                                    {{ $category->name }}
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="/home" class="btn btn-primary">
                                <i class="fas fa-chevron-left"></i>
                                Back
                            </a>
                        </div>
{{--                        TODO: add edit, share and delete buttons--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
