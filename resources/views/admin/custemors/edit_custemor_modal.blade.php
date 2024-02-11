    <!-- Modal -->
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Custemor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('custemor.update') }}" method="POST" autocomplete="off"> 
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        {{-- First Row --}}
                        <div class="input-group">
                            <div class="mb-3 col-6">
                                <label for="name" class="form-label">Custemor Name</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    aria-describedby="emailHelp" placeholder="Enter Admin Name">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="email" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter Admin Email">
                            </div>
                        </div>
                        {{-- Second Row --}}
                        <div class="input-group">
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword"
                                    placeholder="Enter Password">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                <input name="confirm-password" type="password" class="form-control"
                                    id="exampleInputPassword1" placeholder="Confirm Password">
                            </div>
                        </div>
                        {{-- Therd Row --}}
                        <div class="input-group">
                            <div class="mb-3 col-6">
                                <label for="address" class="form-label">Address</label>
                                <input name="address" type="text" class="form-control" id="address"
                                    placeholder="Enter Custemor Address">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input name="phone" type="text" class="form-control"
                                    id="phone" placeholder="Enter Custemor Phone">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">update custemor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
