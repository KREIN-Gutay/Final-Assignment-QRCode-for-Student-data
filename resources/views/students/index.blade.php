@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="page-title mb-0"><span class="petal-accent"></span>Student Records</h3>
        <p class="text-muted small mb-0 mt-1" style="color:#b07a95!important;">All registered students with QR passes</p>
    </div>
    <a href="{{ route('students.create') }}" class="btn btn-primary shadow-sm px-4 py-2">
        <i class="bi bi-plus-circle me-2"></i>Add Student
    </a>
</div>

<div class="card mb-4" style="border-radius:16px;">
    <div class="card-body p-3">
        <form action="{{ route('students.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col">
                <div class="input-group">
                    <span class="input-group-text" style="background:#fdf2f6;border:1.5px solid #f0d9e3;border-right:none;border-radius:12px 0 0 12px;color:#c96b8a;">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search"
                        style="border:1.5px solid #f0d9e3;border-left:none;border-radius:0 12px 12px 0;background:#fdf2f6;"
                        class="form-control"
                        placeholder="Search by ID, Name, or Course..."
                        value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary px-4">Search</button>
            </div>
            @if(request('search'))
            <div class="col-auto">
                <a href="{{ route('students.index') }}" class="btn btn-light px-3">Clear</a>
            </div>
            @endif
        </form>
    </div>
</div>

<div class="card" style="border-radius:20px;">
    <div class="card-header-custom d-flex align-items-center justify-content-between" style="border-radius:20px 20px 0 0;">
        <span style="font-family:'Playfair Display',serif;font-weight:600;color:#9b5b74;font-size:0.95rem;">
            <i class="bi bi-people-fill me-2" style="color:#e8a0b4;"></i>
            {{ $students->count() }} Student{{ $students->count() != 1 ? 's' : '' }} Found
        </span>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Photo</th>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th class="text-center">QR Pass</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td class="ps-4">
                        <img src="{{ $student->photo ? asset('storage/'.$student->photo) : 'https://ui-avatars.com/api/?name='.urlencode($student->first_name).'&background=f9e8ee&color=c96b8a&bold=true' }}"
                             class="student-photo">
                    </td>
                    <td>
                        <span class="fw-bold" style="color:#c96b8a;font-size:0.9rem;">{{ $student->student_id }}</span>
                    </td>
                    <td>
                        <div class="fw-semibold" style="color:#3b2535;">{{ $student->full_name }}</div>
                        <div class="small" style="color:#b07a95;">{{ $student->email }}</div>
                    </td>
                    <td><span style="color:#7a5068;">{{ $student->course }}</span></td>
                    <td>
                        <span class="badge" style="background:#faeaf1;color:#c96b8a;border-radius:50px;font-weight:500;font-size:0.75rem;padding:0.4em 0.8em;">
                            {{ $student->year_level }}
                        </span>
                    </td>
                    <td class="text-center">{!! $student->qr !!}</td>
                    <td class="text-end pe-4">
                        <div class="btn-group gap-1">
                            <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-primary" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Delete"
                                    onclick="return confirm('Remove this student?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <i class="bi bi-flower3 fs-1" style="color:#e8a0b4;"></i>
                        <p class="mt-2" style="color:#b07a95;">No students found.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection