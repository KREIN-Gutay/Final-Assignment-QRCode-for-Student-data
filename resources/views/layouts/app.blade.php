<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | QR System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --blush: #f9e8ee;
            --rose: #e8a0b4;
            --deep-rose: #c96b8a;
            --mauve: #9b5b74;
            --cream: #fdf6f9;
            --text-dark: #3b2535;
            --text-mid: #7a5068;
            --gold: #d4a373;
            --white: #ffffff;
            --shadow-soft: 0 4px 24px rgba(201, 107, 138, 0.12);
            --shadow-card: 0 8px 40px rgba(155, 91, 116, 0.10);
        }

        * { box-sizing: border-box; }

        body {
            background-color: var(--cream);
            font-family: 'DM Sans', sans-serif;
            color: var(--text-dark);
            min-height: 100vh;
            background-image:
                radial-gradient(ellipse at 20% 0%, rgba(232, 160, 180, 0.18) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 100%, rgba(212, 163, 115, 0.12) 0%, transparent 60%);
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--mauve) 0%, var(--deep-rose) 100%);
            box-shadow: 0 4px 20px rgba(155, 91, 116, 0.25);
            padding: 1rem 0;
            border-bottom: 2px solid rgba(255,255,255,0.15);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            color: #fff !important;
        }

        .navbar-brand i {
            color: var(--gold);
            filter: drop-shadow(0 0 6px rgba(212,163,115,0.5));
        }

        .nav-tagline {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.6);
            letter-spacing: 0.15em;
            text-transform: uppercase;
            font-weight: 300;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 20px;
            background: var(--white);
            box-shadow: var(--shadow-card);
            overflow: hidden;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--deep-rose), var(--mauve));
            border: none;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 0.03em;
            box-shadow: 0 4px 15px rgba(201, 107, 138, 0.35);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--mauve), var(--deep-rose));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(201, 107, 138, 0.45);
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--gold), #c4893d);
            border: none;
            border-radius: 50px;
            color: #fff;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(212, 163, 115, 0.35);
            transition: all 0.3s ease;
        }
        .btn-warning:hover { transform: translateY(-2px); color: #fff; }

        .btn-dark {
            background: var(--mauve);
            border: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-dark:hover { background: var(--text-dark); transform: translateY(-2px); }

        .btn-light {
            background: var(--blush);
            border: none;
            border-radius: 50px;
            color: var(--mauve);
            font-weight: 500;
        }
        .btn-light:hover { background: var(--rose); color: #fff; }

        .btn-secondary {
            background: var(--blush);
            border: none;
            border-radius: 50px;
            color: var(--mauve);
            font-weight: 500;
        }

        /* Form controls */
        .form-control, .form-select {
            border: 1.5px solid #f0d9e3;
            border-radius: 12px;
            padding: 0.6rem 1rem;
            background: #fdfafc;
            color: var(--text-dark);
            transition: border-color 0.2s, box-shadow 0.2s;
            font-size: 0.92rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--rose);
            box-shadow: 0 0 0 3px rgba(232, 160, 180, 0.22);
            background: #fff;
        }

        .form-label {
            color: var(--mauve);
            font-weight: 600;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 0.35rem;
        }

        /* Table */
        .table thead th {
            background: var(--blush);
            color: var(--mauve);
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            border: none;
            padding: 1rem 1rem;
        }
        .table tbody tr {
            border-bottom: 1px solid #fae8f0;
            transition: background 0.2s;
        }
        .table tbody tr:hover { background: #fdf2f6; }
        .table td { padding: 0.85rem 1rem; vertical-align: middle; border: none; }

        /* Outline buttons in table */
        .btn-outline-primary {
            border-color: var(--rose);
            color: var(--deep-rose);
            border-radius: 8px;
        }
        .btn-outline-primary:hover { background: var(--deep-rose); border-color: var(--deep-rose); }

        .btn-outline-warning {
            border-color: var(--gold);
            color: var(--gold);
            border-radius: 8px;
        }
        .btn-outline-warning:hover { background: var(--gold); border-color: var(--gold); color: #fff; }

        .btn-outline-danger {
            border-radius: 8px;
        }

        /* Alert */
        .alert-danger {
            background: #fdeef3;
            border: 1px solid #f5c2d3;
            border-radius: 14px;
            color: var(--mauve);
        }

        /* Student photo */
        .student-photo {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 50%;
            border: 2.5px solid var(--rose);
            box-shadow: 0 2px 8px rgba(201,107,138,0.2);
        }

        /* Badge */
        .badge.bg-primary {
            background: linear-gradient(135deg, var(--rose), var(--deep-rose)) !important;
            border-radius: 50px;
            font-weight: 500;
            letter-spacing: 0.04em;
            padding: 0.45em 1em;
        }

        /* Page title */
        .page-title {
            font-family: 'Playfair Display', serif;
            color: var(--mauve);
            font-weight: 700;
        }

        /* Decorative petal */
        .petal-accent {
            display: inline-block;
            width: 8px;
            height: 8px;
            background: var(--rose);
            border-radius: 50%;
            margin-right: 8px;
            box-shadow: 0 0 0 3px rgba(232,160,180,0.25);
        }

        /* Section card header */
        .card-header-custom {
            background: linear-gradient(135deg, var(--blush), #fceef5);
            border-bottom: 1px solid #f5d6e6;
            padding: 1.25rem 1.5rem;
        }

        /* QR cell */
        td svg { border-radius: 8px; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--blush); }
        ::-webkit-scrollbar-thumb { background: var(--rose); border-radius: 10px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark mb-4">
        <div class="container">
            <div>
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('students.index') }}">
                    <i class="bi bi-flower1 fs-5"></i>
                    STUDENT REGISTRY
                </a>
                <div class="nav-tagline ps-1">QR Student Management System</div>
            </div>
        </div>
    </nav>
    <div class="container pb-5">
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center gap-2 mb-4"
                 style="background:#f0faf4;border:1px solid #a8dfc0;border-radius:14px;color:#2d7a52;">
                <i class="bi bi-check-circle-fill text-success"></i>
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>