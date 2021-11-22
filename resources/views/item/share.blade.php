@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h4">{{ $item->name }}</div>
                    <div class="p-2">
                        <form action="/home/{{ $item->id }}/share" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")

                            <div class="modal-body d-flex flex-column align-content-between">
                                <div class="d-flex flex-column mt-2">
                                    <label>Share to users:</label>
                                    <select class="form-control col-lg-12 col-md-12 col-sm-4 col-xs-12" name="users[]" multiple="" id="Box1">
                                        @foreach(\App\Models\User::all() as $user)
                                            @if($user->id == $item->owner)
                                                @continue
                                            @endif

                                            @if($item->users->contains($user))
                                                <option value="{{ $user->id }}" selected="{{ $user->id }}"> {{ $user->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}"> {{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success mr-1">
                                        <i class="fas fa-check"></i>
                                        Save
                                    </button>
                                    <a href="/home" class="btn btn-danger">
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

