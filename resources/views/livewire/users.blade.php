<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Users</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                        </div>
                </div>
            </div>
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>Thomas Hardy</td>
                        <td>thomashardy@mail.com</td>
                        <td>89 Chiaroscuro Rd, Portland, USA</td>
                        <td>(171) 555-2222</td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                                    class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                    class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr> --}}
                    @forelse ($users as $user)
                    <tr>
                        <td style="width: 124px">{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="width: 200px">{{ $user->phone }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <a href="#editUserModal" class="edit" data-toggle="modal" wire:click.prevent="edit({{$user->id}})"><i
                                    class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a  href="#deleteEmployeeModal" class="delete" data-toggle="modal" wire:click.prevent="delete({{$user->id}})"><i
                                    class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No data</td>
                    </tr>
                    @endforelse



                </tbody>
            </table>
        </div>
    </div>
    @include('livewire.create')
    @include('livewire.update')

</div>
  <!-- Add Modal HTML -->

