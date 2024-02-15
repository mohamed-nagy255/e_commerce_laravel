  <!-- Modal -->
  <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('category.destroy') }}" method="POST">
                  @method('delete')
                  @csrf
                  <div class="modal-body">
                      <input type="hidden" name="id" id="id">
                      <input type="hidden" name="image" id="image">
                      <strong>
                          Are You Sure To Delete Category?
                      </strong>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Delete Category</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
