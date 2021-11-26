@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h4">{{ $item->name }}</div>
                    <div class="p-2">
                        <form action="/home/{{ $item->id }}/edit" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")

                            <div class="modal-body d-flex flex-column align-content-between">
                                <div>
                                    <div>
                                        <label for="name">Name</label>
                                        <input class="border border-secondary p-2 w-100"
                                               type="text"
                                               name="name"
                                               id="name"
                                               value="{{ $item->name }}"
                                               required
                                        >
                                    </div>
                                    <div class="mt-2">
                                        <label for="text">Text</label>
                                        <textarea class="border border-secondary p-2 w-100"
                                                  name="text"
                                                  id="text"
                                                  rows="10"
                                                  required
                                        >{{ $item->text }}</textarea>
                                    </div>
                                    <div class="p-1">
                                        <div class="mt-1 pt-1 border-top text-secondary">
                                            categories:
                                            @foreach($item->categories as $category)
                                                {{ $category->name }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column mt-2">
                                        <label for="Box1">Categories</label>
                                        <select class="form-control overflow-hidden" name="cat[]" multiple="" id="Box1">
                                            @foreach(\App\Models\Category::all() as $category)
                                                @if($item->categories->contains($category))
                                                    <option value="{{ $category->id }}" selected="{{ $category->id }}"> {{ $category->name }}</option>
                                                @else
                                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success mr-1">
                                        <i class="fas fa-check"></i>
                                        Save
                                    </button>
                                    <a href="{{ url('/home') }}" class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            document.getElementById("Box1").focus();
        };
    </script>
@endsection
