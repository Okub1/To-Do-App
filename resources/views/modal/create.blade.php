<form action="/home/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New To-Do</h4>
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
                                   required
                            >
                        </div>
                        <div class="mt-2">
                            <label for="text">Text</label>
                            <textarea class="border border-secondary p-2 w-100"
                                      name="text"
                                      id="text"
                                      required
                            ></textarea>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <label>Categories</label>
                            <select class="form-control" name="cat[]" multiple="">
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse mt-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="owner" id="owner" value="{{ $user }}">
</form>
