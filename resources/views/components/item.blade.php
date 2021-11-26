<div class="d-flex my-2 p-2 border border-secondary rounded bg-light text-dark">
{{--    <div class="col-1 align-self-center">--}}
{{--        <input type="checkbox">--}}
{{--        --}}{{-- TODO: checkbox ToDo item (add category "Done")--}}
{{--    </div>--}}
    <div class="col-11">
        <p class="font-weight-bold h4">
            @if($item->is_done)
                <del class="text-secondary font-italic"><a href="/home/{{ $item->id }}">{{ $item->id }} {{ $item->name }}</a> </del>
            @else
                <a href="/home/{{ $item->id }}">{{ $item->id }} {{ $item->name }}</a>
            @endif

            <div class="text-secondary font-weight-bold">
                @if($item->owner_id != $user->id)
                    Shared with me by  {{ \App\Models\User::all()->find($item->owner)->name }}
                @endif
            </div>
        <p class="text-secondary font-italic">
            {{$item->created_at}}
        </p>
        <div>
            @if($item->is_done)
                <del class="text-secondary font-italic">{{ $item->text }}</del>
            @else
                {{ $item->text }}
            @endif
        </div>
        <div class="mt-1 pt-1 border-top text-secondary">
            categories:
            @foreach($item->categories as $category)
                {{ $category->name }}
            @endforeach
        </div>
    </div>
    @if($item->owner_id == $user->id)
        <div class="d-flex flex-column align-content-between align-self-center">
            <a class="btn btn-outline-dark mt-1" title="Edit" href="/home/{{ $item->id }}/edit">
                <i class="fas fa-pen"></i>
            </a>
            <a class="btn btn-outline-primary mt-1" title="Share" href="/home/{{ $item->id }}/share">
                <i class="fas fa-share"></i>
            </a>
            <a class="btn btn-outline-danger mt-1" title="Delete" href="/home/{{ $item->id }}/delete">
                <i class="fas fa-trash"></i>
            </a>
        </div>
    @else
        <div class="d-flex flex-column align-content-between align-self-center">
            <a class="btn disabled btn-outline-secondary mt-1" title="Edit" href="/home/{{ $item->id }}/edit">
                <i class="fas fa-pen"></i>
            </a>
            <a class="btn disabled btn-outline-secondary mt-1" title="Share" href="/home/{{ $item->id }}/share">
                <i class="fas fa-share"></i>
            </a>
            <a class="btn disabled btn-outline-secondary mt-1" title="Delete" href="/home/{{ $item->id }}/delete">
                <i class="fas fa-trash"></i>
            </a>
        </div>
    @endif
</div>
