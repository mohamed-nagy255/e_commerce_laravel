    <!-- Modal -->
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class=" modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.update') }}" method="POST" autocomplete="off">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        {{-- First Row --}}
                        <div class="input-group">
                            <div class="mb-3 col-6">
                                <label for="name" class="form-label">Admin Name</label>
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
                                <input name="confirm-password" type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Confirm Password">


                            </div>
                        </div>
                        {{-- Therd Row --}}
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" aria-label="Default select example" id="role">
                                <option selected>Select Role To Admin</option>
                                @foreach ($roles as $role)
                                    @if ($role !== 'OWNER')
                                        <option value="{{ $role }}">
                                            {{ $role }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
