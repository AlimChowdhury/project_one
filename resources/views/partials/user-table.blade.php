@if($users->isEmpty())
    <p>No users found.</p>
@else
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <table class="table table-bordered mt-3">

     <div class="d-flex justify-content-between align-items-center mt-2">
        <div>
            <p class="mb-0">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users</p>
        </div>
        <div>
            {!! $users->links() !!}
        </div>
    </div>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Bio</th>
                <th>Profile Picture</th>
                <th>Division</th>
                <th>District</th>
                <th>Upazila</th>
                <th>Edit</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->bio }}</td>
                    <td>
                        @if($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" width="50">
                        @else
                            <span>No image</span>
                        @endif
                    </td>
                    <td>{{ $user->division->name ?? '' }}</td>
                    <td>{{ $user->district->name ?? '' }}</td>
                    <td>{{ $user->upazila->name ?? '' }}</td>
                    <td>
                        <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal"
                            data-bs-target="#editUserModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}" data-phone="{{ $user->phone }}" data-bio="{{ $user->bio }}">
                            Edit
                        </button>
                    </td>
                    <td>{{ $user->created_at->format('d M Y h:i A') }}</td>
                    <td>{{ $user->updated_at->format('d M Y h:i A') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
   



@endif

<!-- Edit Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editUserForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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
            </div>
        </form>
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
                form.action = `/admin/users/${id}`;
                document.getElementById('editName').value = this.dataset.name;
                document.getElementById('editEmail').value = this.dataset.email;
                document.getElementById('editPhone').value = this.dataset.phone;
                document.getElementById('editBio').value = this.dataset.bio;
            });
        });

        // Optional: reset form on modal close
        const modal = document.getElementById('editUserModal');
        modal.addEventListener('hidden.bs.modal', () => {
            form.reset();
            form.action = '';
        });
    });


    $(document).on('click', '#userTable .pagination a', function (e) {
        e.preventDefault();
        $('#loadingSpinner').show();

        let url = $(this).attr('href');
        $.get(url, {
            division_id: $('#division_id').val(),
            district_id: $('#district_id').val(),
            upazila_id: $('#upazila_id').val(),
            created_date: $('#created_date').val()
        }, function (html) {
            $('#userTable').html(html);
            $('#loadingSpinner').hide();
        });
    });

</script>
<!-- Bootstrap 5 JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>