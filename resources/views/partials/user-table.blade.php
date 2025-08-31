@if($users->isEmpty())
    <p>No users found.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Profile Picture</th>
                <th>Division</th>
                <th>District</th>
                <th>Upazila</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->profile_picture }}</td>
                    <td>{{ $user->division->name ?? '' }}</td>
                    <td>{{ $user->district->name ?? '' }}</td>
                    <td>{{ $user->upazila->name ?? '' }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary editBtn" data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}" data-phone="{{ $user->phone }}" data-bio="{{ $user->bio }}"
                            data-bs-toggle="modal" data-bs-target="#editUserModal">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" id="editName" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" id="editEmail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" id="editPhone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Bio</label>
                        <textarea name="bio" id="editBio" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.editBtn');
        const form = document.getElementById('editUserForm');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                document.getElementById('editName').value = this.dataset.name;
                document.getElementById('editEmail').value = this.dataset.email;
                document.getElementById('editPhone').value = this.dataset.phone;
                document.getElementById('editBio').value = this.dataset.bio;

                form.action = `/admin/users/${id}`;
            });
        });
    });
</script>