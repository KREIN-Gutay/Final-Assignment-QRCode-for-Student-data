@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="mb-4">
            <h3 class="page-title mb-0"><span class="petal-accent"></span>Edit Student</h3>
            <p class="small mt-1" style="color:#b07a95;">Update the information for {{ $student->full_name }}.</p>
        </div>

        <div class="card shadow-sm p-4">
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    <strong>Please fix the following:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-3 pb-2" style="border-bottom:1px dashed #f0d9e3;">
                    <p class="mb-0 fw-semibold" style="color:#9b5b74;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;">
                        <i class="bi bi-person-badge me-1"></i> Academic Info
                    </p>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Student ID</label>
                        <input type="text" name="student_id" class="form-control" value="{{ $student->student_id }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Year Level</label>
                        <select name="year_level" class="form-select">
                            @foreach(['1st Year','2nd Year','3rd Year','4th Year'] as $year)
                                <option {{ $student->year_level == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Course / Program</label>
                        <input type="text" name="course" class="form-control" value="{{ $student->course }}" required>
                    </div>
                </div>

                <div class="mb-3 pb-2 mt-2" style="border-bottom:1px dashed #f0d9e3;">
                    <p class="mb-0 fw-semibold" style="color:#9b5b74;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;">
                        <i class="bi bi-person-heart me-1"></i> Personal Info
                    </p>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Birthdate</label>
                        <input type="date" name="birthdate" class="form-control" value="{{ $student->birthdate }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $student->phone }}" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
                    </div>
                </div>

                <div class="mb-3 pb-2 mt-2" style="border-bottom:1px dashed #f0d9e3;">
                    <p class="mb-0 fw-semibold" style="color:#9b5b74;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.1em;">
                        <i class="bi bi-image me-1"></i> Profile Photo
                    </p>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label class="form-label">Change Photo <span class="text-muted fw-normal">(leave blank to keep current)</span></label>
                        <input type="file" name="photo" class="form-control" accept="image/*">
                        @if($student->photo)
                            <div class="mt-2 d-flex align-items-center gap-2">
                                <img src="{{ asset('storage/'.$student->photo) }}" class="rounded-circle" style="width:50px;height:50px;object-fit:cover;border:2px solid #e8a0b4;">
                                <span class="small" style="color:#b07a95;">Current photo</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-warning px-5 py-2">
                        <i class="bi bi-check-circle me-2"></i>Update Student
                    </button>
                    <a href="{{ route('students.index') }}" class="btn btn-light px-4 py-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection