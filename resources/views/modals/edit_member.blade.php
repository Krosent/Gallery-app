<div class="modal fade" id="editMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Header</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/manage/edit/member">
                    <div class="form-group">
                        <label for="family-code">Number</label>
                        <input type="text" class="form-control" id="number" aria-describedby="Number Change" placeholder="Enter the number">
                    </div>

                    <div class="form-group">
                            <label for="father-field">Nick</label>
                            <input type="text" class="form-control" id="nick" aria-describedby="Nick Change" placeholder="Enter nick">
                        </div>

                    <div class="form-group">
                            <label for="mother-field">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="Name Change" placeholder="Enter name">
                        </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>