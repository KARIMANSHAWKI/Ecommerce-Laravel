    {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&& Creat &&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}

    <div class="modal fade" wire:ignore.self  id="createLivewire" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="form-group">
                            <label for="title_ar">Title : Ar</label>
                            <input type="text" class="form-control" name="title_ar" id="title_ar" wire:model="title_ar">
                            @error('title_ar') <p class="alert alert-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label for="title_en">Title : En</label>
                            <input type="text" class="form-control" name="title_en" id="title_en"  wire:model="title_en">
                            @error('title_en') <p class="alert alert-danger">{{ $message }}</p>@enderror

                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description"  wire:model="description">
                            @error('description') <p class="alert alert-danger">{{ $message }}</p>@enderror

                        </div>
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file" class="form-control-file" name="image" id="image" wire:model="image">
                            @error('image') <p class="alert alert-danger">{{ $message }}</p>@enderror

                        </div>

                        <button type="button" class="btn btn-success" id="newsForm"  wire:click.prevent="store">Add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
