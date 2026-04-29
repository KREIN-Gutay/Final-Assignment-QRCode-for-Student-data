@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg border-0" style="border-radius:24px;overflow:hidden;">

            {{-- Header banner --}}
            <div style="background:linear-gradient(135deg,#9b5b74,#c96b8a,#e8a0b4);padding:2.5rem 2rem 4rem;text-align:center;position:relative;">
                <div style="position:absolute;top:12px;left:16px;">
                    <a href="{{ route('students.index') }}" class="btn btn-sm" style="background:rgba(255,255,255,0.2);border:none;color:#fff;border-radius:50px;backdrop-filter:blur(4px);">
                        <i class="bi bi-arrow-left me-1"></i> Back
                    </a>
                </div>
                <div style="position:absolute;top:15px;right:16px;">
                    <button onclick="window.print()" class="btn btn-sm" style="background:rgba(255,255,255,0.2);border:none;color:#fff;border-radius:50px;backdrop-filter:blur(4px);">
                        <i class="bi bi-printer me-1"></i> Print
                    </button>
                </div>
                <p style="color:rgba(255,255,255,0.7);font-size:0.72rem;text-transform:uppercase;letter-spacing:0.15em;margin-bottom:0.5rem;">Student QR Pass</p>
                <h5 style="font-family:'Playfair Display',serif;color:#fff;font-size:1.4rem;margin:0;">{{ $student->full_name }}</h5>
                <span style="color:rgba(255,255,255,0.85);font-size:0.85rem;">{{ $student->student_id }}</span>
            </div>

            {{-- Photo overlapping banner --}}
            <div style="text-align:center;margin-top:-50px;position:relative;z-index:2;">
                <img src="{{ $student->photo ? asset('storage/' . $student->photo) : 'https://ui-avatars.com/api/?name='.urlencode($student->full_name).'&size=200&background=f9e8ee&color=c96b8a&bold=true' }}"
                    style="width:100px;height:100px;object-fit:cover;border-radius:50%;border:4px solid #fff;box-shadow:0 4px 20px rgba(201,107,138,0.3);">
            </div>

            <div class="p-4 pt-3 text-center">
                <span class="badge bg-primary mb-3">{{ $student->course }} &nbsp;·&nbsp; {{ $student->year_level }}</span>

                {{-- QR Code --}}
                <div style="background:linear-gradient(135deg,#fdf2f6,#faeaf1);border-radius:20px;padding:1.5rem;display:inline-block;margin-bottom:1.25rem;box-shadow:0 4px 16px rgba(201,107,138,0.12);">
                    {!! $qr !!}
                    <div style="font-size:0.72rem;color:#b07a95;margin-top:0.5rem;letter-spacing:0.08em;font-weight:600;">SCAN TO VERIFY</div>
                </div>

                {{-- Info grid --}}
                <div style="background:#fdf6f9;border-radius:16px;padding:1.25rem;text-align:left;">
                    <div class="row g-2">
                        <div class="col-6">
                            <div style="font-size:0.72rem;color:#b07a95;text-transform:uppercase;letter-spacing:0.08em;font-weight:600;">Email</div>
                            <div style="font-size:0.88rem;color:#3b2535;font-weight:500;">{{ $student->email }}</div>
                        </div>
                        <div class="col-6">
                            <div style="font-size:0.72rem;color:#b07a95;text-transform:uppercase;letter-spacing:0.08em;font-weight:600;">Phone</div>
                            <div style="font-size:0.88rem;color:#3b2535;font-weight:500;">{{ $student->phone }}</div>
                        </div>
                        <div class="col-6 mt-2">
                            <div style="font-size:0.72rem;color:#b07a95;text-transform:uppercase;letter-spacing:0.08em;font-weight:600;">Birthdate</div>
                            <div style="font-size:0.88rem;color:#3b2535;font-weight:500;">{{ $student->birthdate }}</div>
                        </div>
                        <div class="col-6 mt-2">
                            <div style="font-size:0.72rem;color:#b07a95;text-transform:uppercase;letter-spacing:0.08em;font-weight:600;">Gender</div>
                            <div style="font-size:0.88rem;color:#3b2535;font-weight:500;">{{ $student->gender }}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 d-flex gap-2 justify-content-center">
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning px-4">
                        <i class="bi bi-pencil me-1"></i> Edit
                    </a>
                    <a href="{{ route('students.index') }}" class="btn btn-light px-4">
                        <i class="bi bi-grid me-1"></i> All Students
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection