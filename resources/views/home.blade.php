@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My To-Do items</div>
                    <div class="d-flex justify-content-around p-1 my-1">
                        <a class="btn btn-primary col-5" href="#" data-toggle="modal" data-target="#ModalCreate" role="button">
                            <i class="fas fa-plus"></i>
                            New To-Do
                        </a>
                        <a class="btn btn-primary col-5" href="#" role="button">
                            <i class="fas fa-filter"></i>
                            Filter
                        </a>
                    </div>
                    <div class="card-body pt-0">
                        @foreach($items as $item)
                            <x-item :item="$item" :user="$user"></x-item>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("modal.create")
@endsection
