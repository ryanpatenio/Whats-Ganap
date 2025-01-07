<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">ADD New Ganap</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" id="addForm">
                @csrf
            <div class="col">
                <div class="form-group mb-2">              
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" required>                   
                </div>
                <div class="form-group">              
                    <label for="">Content</label>
                   <textarea name="content" id="" class="form-control" cols="30" rows="10"></textarea>                  
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>