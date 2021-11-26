@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h4">{{ $item->name }}</div>
                    <div class="p-2">
                        <form action="{{ route('deleteItem', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("DELETE")

                            <div class="modal-body d-flex flex-column align-content-between">
                                <div>
                                    Are you sure you want to delete this To-Do?
                                </div>
                                <div class="mt-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success mr-1">
                                        <i class="fas fa-check"></i>
                                        Yes
                                    </button>
                                    <a href="{{ url('/home') }}" class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                        No
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

