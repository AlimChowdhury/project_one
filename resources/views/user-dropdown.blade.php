@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">User Location Filter</h2>

        {{-- Filter Dropdowns --}}
        <div class="row mb-3">
            {{-- Division --}}
            <div class="col-md-4">
                <select name="division_id" id="division_id" class="form-control">
                    <option value="">Select Division</option>
                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- District --}}
            <div class="col-md-4">
                <select name="district_id" id="district_id" class="form-control">
                    <option value="">Select District</option>
                </select>
            </div>

            {{-- Upazila --}}
            <div class="col-md-4">
                <select name="upazila_id" id="upazila_id" class="form-control">
                    <option value="">Select Upazila</option>
                </select>
            </div>

            <div class="col-md-4">
                <input type="date" name="created_date" id="created_date" class="form-control">
            </div>

        </div>

        {{-- User Table --}}
        <div id="userTable">
            @include('partials.user-table', ['users' => $users])
        </div>

    </div>

    <script>
        $(document).ready(function () {
            function filterUsers() {
                let divisionId = $('#division_id').val();
                let districtId = $('#district_id').val();
                let upazilaId = $('#upazila_id').val();
                let createdDate = $('#created_date').val();

                // console.log("Filtering with:", { divisionId, districtId, upazilaId }); 

                $.get("{{ route('filter.users') }}", {
                    division_id: divisionId,
                    district_id: districtId,
                    upazila_id: upazilaId,
                    created_date: createdDate
                }, function (html) {
                    $('#userTable').html(html);
                });
            }

            // Division change
            $('#division_id').on('change', function () {
                let divisionId = $(this).val();
                $('#district_id').html('<option value="">Loading...</option>');
                $('#upazila_id').html('<option value="">Select Upazila</option>');

                if (divisionId) {
                    $.get('{{ url("filter-get-districts") }}/' + divisionId, function (data) {
                        $('#district_id').empty().append('<option value="">Select District</option>');
                        data.forEach(function (district) {
                            $('#district_id').append(`<option value="${district.id}">${district.name}</option>`);
                        });
                        filterUsers();
                    });
                } else {
                    filterUsers();
                }
            });

            // District change
            $('#district_id').on('change', function () {
                let districtId = $(this).val();
                $('#upazila_id').html('<option value="">Loading...</option>');

                if (districtId) {
                    $.get('{{ url("filter-get-upazilas") }}/' + districtId, function (data) {
                        $('#upazila_id').empty().append('<option value="">Select Upazila</option>');
                        data.forEach(function (upazila) {
                            $('#upazila_id').append(`<option value="${upazila.id}">${upazila.name}</option>`);
                        });
                        filterUsers();
                    });
                } else {
                    filterUsers();
                }
            });

            // Upazila change
            $('#upazila_id').on('change', function () {
                filterUsers();
            });

            //date filter
            $('#created_date').on('change', function () {
                filterUsers();
            });

        });
    </script>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endpush