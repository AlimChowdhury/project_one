@extends('layouts.app')

@section('content')

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
        class="p-4 border rounded shadow-sm bg-light" style="max-width: 600px; margin: auto;">
        @csrf
        @method('PUT')

        <h4 class="mb-4 text-center">Update Your Profile</h4>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone }}" class="form-control"
                placeholder="Enter your phone number">
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio" id="bio" class="form-control" rows="4"
                placeholder="Write something about yourself">{{ Auth::user()->bio }}</textarea>
        </div>

        <div class="mb-3">
            <label for="profile_picture" class="form-label">Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture" class="form-control">
        </div>

        <select name="division_id" id="division_id" class="form-control">
            <option value="">Select Division</option>
            @foreach($divisions as $division)
                <option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected' : '' }}>
                    {{ $division->name }}
                </option>
            @endforeach
        </select>

          

        <select name="district_id" id="district_id" class="form-control mt-2">
            <option value="">Select District</option>
        </select>

        <select name="upazila_id" id="upazila_id" class="form-control mt-2">
            <option value="">Select Upazila</option>
        </select>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Update Profile</button>
        </div>
    </form>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#division_id').on('change', function () {
            let divisionId = $(this).val();
            $('#district_id').html('<option value="">Loading...</option>');
            $('#upazila_id').html('<option value="">Select Upazila</option>');

            if (divisionId) {
                $.get('/get-districts/' + divisionId, function (data) {
                    $('#district_id').empty().append('<option value="">Select District</option>');
                    data.forEach(function (district) {
                        $('#district_id').append(`<option value="${district.id}">${district.name}</option>`);
                    });
                });
            }
           
        });

        $('#district_id').on('change', function () {
            let districtId = $(this).val();
            $('#upazila_id').html('<option value="">Loading...</option>');

            if (districtId) {
                $.get('/get-upazilas/' + districtId, function (data) {
                    $('#upazila_id').empty().append('<option value="">Select Upazila</option>');
                    data.forEach(function (upazila) {
                        $('#upazila_id').append(`<option value="${upazila.id}">${upazila.name}</option>`);
                    });
                });
            }
        });        
    });
</script>