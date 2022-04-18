  <!-- Add Modal HTML -->
  <div wire:ignore.self id="addUserModal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <form>
                  @csrf
                  <div class="modal-header">
                      <h4 class="modal-title">Add User</h4>
                      <button type="button" class="close" data-dismiss="modal"
                          aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="first_name" class="form-control" wire:model="first_name">
                          @error('first_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="last_name" class="form-control" wire:model="last_name">
                          @error('last_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" wire:model="email">

                          @error('email')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror

                      </div>
                      <div class="form-group">
                          <label>Phone</label>
                          <input type="text" name="phone" class="form-control" wire:model="phone">
                          @error('phone')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror

                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" wire:model="password">
                          @error('password')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror

                      </div>
                  </div>
                  <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                      <input type="submit" class="btn btn-success" wire:click.prevent="store()" value="Add">
                  </div>
              </form>
          </div>
      </div>
  </div>
