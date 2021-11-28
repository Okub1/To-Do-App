<form method="GET" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalFilter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Filter To-Dos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex flex-column align-content-between">
                    <div>
                        <div>
                            <label for="name">Name</label>
                            <input class="border border-secondary p-2 w-100"
                                   type="text"
                                   name="name"
                                   id="name"
                                   value="{{ request("name") }}"
                                   placeholder="Any"
                            >
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <label for="categories">Categories</label>

                            <div class="border my-1">
                                Testing:
                                <br>
                                {{ request("cat.0") }}
                                {{ request("cat.1") }}
                                {{ request("cat.2") }}

                                @foreach(\App\Models\Category::all() as $category)
                                    <p>{{ $category->id }}</p>
                                @endforeach


                                @foreach(\App\Models\Category::all() as $category)
                                    @php
                                        $i = 0
                                    @endphp
                                    @foreach(request("cat") as $selected)
                                        @if($selected == $category->id)
                                            <p>yes {{ $category->name }}</p>
                                        @else
                                            <p> {{ $category->name }}</p>
                                            @break
                                        @endif
                                        {{ $i++ }}
                                    @endforeach
                                @endforeach
                            </div>

                            <select class="form-control" name="cat[]" multiple="" id="categories">
                                @php
                                    $i = 0
                                @endphp
                                @foreach(\App\Models\Category::all() as $category)
                                    @if(request("cat.$i") == $category->id)
                                        <option value="{{ $category->id }}"
                                                selected> {{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endif
                                    {{ $i++ }}
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <label for="shared">Shared</label>
                            <select class="form-control" name="shared" id="shared">
                                @switch(request("shared"))
                                    @case(0)
                                    <option value="0" selected>Both</option>
                                    <option value="1">By me</option>
                                    <option value="2">With me</option>
                                    @break
                                    @case(1)
                                    <option value="0">Both</option>
                                    <option value="1" selected>By me</option>
                                    <option value="2">With me</option>
                                    @break
                                    @case(2)
                                    <option value="0">Both</option>
                                    <option value="1">By me</option>
                                    <option value="2" selected>With me</option>
                                    @break
                                @endswitch
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i>
                            Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
