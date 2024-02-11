  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete role</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <strong>
                      Are You Sure To Delete Role?
                  </strong>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <form action="{{ route('roles.destroy') }}" method="POST">
                    @method('delete')
                    @csrf
                        <input type="text" name="id" id="id">
                      <button type="submit" class="btn btn-danger">Delete Role</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
