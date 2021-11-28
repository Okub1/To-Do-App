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
                                   placeholder="Any"
                            >
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <label for="cat[]">Categories</label>
                            <select class="form-control" name="cat[]" multiple="" id="cat[]">
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <label for="shared">Shared</label>
                            <select class="form-control" name="shared" id="shared">
                                <option value="0">Both</option>
                                <option value="1">By me</option>
                                <option value="2">With me</option>
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
