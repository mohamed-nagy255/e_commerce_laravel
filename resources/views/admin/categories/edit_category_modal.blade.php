    <!-- Modal -->
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class=" modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.update') }}" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="id" id="id">
                        <input type="text" name="image" id="image">
                        {{-- First Row --}}
                        <div class="input-group">
                            <div class="mb-3 col-12">
                                <label for="name" class="form-label">Category Name</label>
                                <input name="category_name" type="text" class="form-control" id="name"
                                    aria-describedby="emailHelp" placeholder="Enter Category Name">
                            </div>
                        </div>
                        {{-- Second Row --}}
                        <div class="input-group">
                            <div class="mb-3 col-12">
                                <label for="home" class="form-label">Home Page</label>
                                <select name="home_page" class="form-control" id="home">
                                    <option selected>Show Home Page ... !</option>
                                    <option value="0">NO</option>
                                    <option value="1">YES</option>
                                </select>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="imageInput" class="form-label">Image</label>
                                <input name="image" type="file" class="form-control" id="imageInput"
                                    accept="image/*">
                                <br>
                                <div class="d-flex" style="justify-content: center;">
                                    <img src="" id="preview-image" alt=""
                                        style="width: 100px;height: 100px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
