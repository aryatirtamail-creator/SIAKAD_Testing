<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Akademik') // Cyber Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Custom Cursor Buku Terbuka */
        html, body, a, button, div {
            cursor: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' fill='none' stroke='%2300f0ff' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'><path d='M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z' fill='%23030712'/><path d='M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z' fill='%23030712'/><path d='M6 8h2' stroke='%2338bdf8'/><path d='M16 8h2' stroke='%2338bdf8'/><path d='M6 12h2' stroke='%2338bdf8'/><path d='M16 12h2' stroke='%2338bdf8'/></svg>") 4 4, auto !important;
        }

        body {
            min-height: 100vh;
            background-color: #030712;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #f3f4f6;
            overflow-x: hidden;
            position: relative;
        }

        /* Moving Cyber Grid Background */
        .grid-container {
            position: fixed;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            perspective: 500px;
            z-index: 1;
            pointer-events: none;
        }

        .cyber-grid-3d {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(56, 189, 248, 0.1) 1.5px, transparent 1.5px),
                linear-gradient(90deg, rgba(56, 189, 248, 0.1) 1.5px, transparent 1.5px);
            background-size: 60px 60px;
            transform: rotateX(60deg);
            transform-origin: 50% 50%;
            animation: gridInfiniteMove 10s linear infinite;
        }

        @keyframes gridInfiniteMove {
            0% { background-position: 0 0; }
            100% { background-position: 0 60px; }
        }

        /* Layout Dashboard Grid */
        .dashboard-wrapper {
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
        }

        /* Sidebar Menu */
        .sidebar {
            background: rgba(17, 24, 39, 0.85);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(56, 189, 248, 0.2);
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .sidebar-brand {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: #38bdf8;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #6b7280;
            margin-bottom: 6px;
            margin-top: 10px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: #9ca3af;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }

        .menu-item:hover, .menu-item.active {
            color: #38bdf8;
            background: rgba(56, 189, 248, 0.08);
            border-color: rgba(56, 189, 248, 0.25);
        }

        /* Main Content Area */
        .main-content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 30px;
        }

        /* Header */
        .header {
            background: rgba(17, 24, 39, 0.6);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(56, 189, 248, 0.15);
            border-radius: 14px;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header-title {
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
        }

        .user-badge {
            font-size: 12px;
            color: #4ade80;
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.25);
            padding: 6px 12px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pulse-dot {
            width: 6px;
            height: 6px;
            background-color: #4ade80;
            border-radius: 50%;
            box-shadow: 0 0 8px #4ade80;
        }

        /* Content Box */
        .content-card {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(56, 189, 248, 0.2);
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            flex-grow: 1;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 16px;
        }

        .crud-page {
            color: #e5e7eb;
        }

        .crud-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
        }

        .crud-description,
        .crud-form-heading p {
            color: #9ca3af;
            font-size: 13px;
        }

        .crud-table-wrap {
            overflow-x: auto;
            border: 1px solid rgba(148, 163, 184, 0.16);
            border-radius: 12px;
        }

        .crud-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 13px;
        }

        .crud-table th {
            padding: 14px 16px;
            color: #67e8f9;
            background: rgba(3, 7, 18, 0.72);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .crud-table td {
            padding: 14px 16px;
            border-top: 1px solid rgba(148, 163, 184, 0.12);
            color: #cbd5e1;
            vertical-align: middle;
        }

        .crud-table tbody tr:hover {
            background: rgba(30, 41, 59, 0.5);
        }

        .crud-table .crud-code {
            color: #67e8f9;
            font-family: monospace;
            white-space: nowrap;
        }

        .crud-table .crud-primary-text {
            color: #f8fafc;
            font-weight: 600;
        }

        .crud-actions-heading {
            text-align: center;
        }

        .crud-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .crud-actions form {
            display: inline-flex;
            margin: 0;
        }

        .crud-button {
            display: inline-flex;
            min-height: 34px;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 12px;
            border: 1px solid transparent;
            border-radius: 8px;
            color: #e2e8f0;
            font: inherit;
            font-size: 12px;
            font-weight: 600;
            line-height: 1;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
            transition: background-color 0.18s ease, border-color 0.18s ease, transform 0.18s ease;
        }

        .crud-button:hover {
            transform: translateY(-1px);
        }

        .crud-button:focus-visible {
            outline: 2px solid #67e8f9;
            outline-offset: 2px;
        }

        .crud-button-edit {
            border-color: rgba(251, 191, 36, 0.28);
            background: rgba(245, 158, 11, 0.12);
            color: #fcd34d;
        }

        .crud-button-edit:hover {
            border-color: rgba(251, 191, 36, 0.55);
            background: rgba(245, 158, 11, 0.22);
        }

        .crud-button-delete {
            border-color: rgba(251, 113, 133, 0.28);
            background: rgba(244, 63, 94, 0.12);
            color: #fda4af;
        }

        .crud-button-delete:hover {
            border-color: rgba(251, 113, 133, 0.55);
            background: rgba(244, 63, 94, 0.22);
        }

        .crud-button-primary {
            border-color: rgba(34, 211, 238, 0.42);
            background: rgba(6, 182, 212, 0.16);
            color: #a5f3fc;
        }

        .crud-button-primary:hover {
            background: rgba(6, 182, 212, 0.27);
        }

        .crud-button-secondary {
            border-color: rgba(148, 163, 184, 0.24);
            background: rgba(51, 65, 85, 0.34);
            color: #cbd5e1;
        }

        .crud-button-secondary:hover {
            background: rgba(71, 85, 105, 0.5);
        }

        .crud-empty {
            padding: 32px 16px !important;
            color: #94a3b8 !important;
            text-align: center;
        }

        .crud-alert {
            margin-bottom: 18px;
            padding: 12px 14px;
            border: 1px solid;
            border-radius: 9px;
            font-size: 13px;
        }

        .crud-alert-success {
            border-color: rgba(52, 211, 153, 0.3);
            background: rgba(6, 78, 59, 0.3);
            color: #a7f3d0;
        }

        .crud-alert-error {
            border-color: rgba(251, 113, 133, 0.32);
            background: rgba(136, 19, 55, 0.24);
            color: #fecdd3;
        }

        .crud-alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .crud-form-page {
            max-width: 680px;
            margin: 0 auto;
            padding: 8px 0;
            color: #e5e7eb;
        }

        .crud-form-heading {
            margin-bottom: 22px;
        }

        .crud-form-heading h2 {
            margin-bottom: 6px;
            color: #f8fafc;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 18px;
        }

        .crud-form {
            display: grid;
            gap: 18px;
        }

        .crud-field {
            display: grid;
            gap: 8px;
        }

        .crud-field label {
            color: #cbd5e1;
            font-size: 13px;
            font-weight: 600;
        }

        .crud-field input {
            width: 100%;
            min-height: 42px;
            padding: 10px 12px;
            border: 1px solid rgba(148, 163, 184, 0.26);
            border-radius: 8px;
            background: rgba(3, 7, 18, 0.6);
            color: #f8fafc;
            font: inherit;
            font-size: 14px;
        }

        .crud-field input:focus {
            border-color: #22d3ee;
            outline: 2px solid rgba(34, 211, 238, 0.18);
        }

        .crud-field small {
            color: #94a3b8;
            font-size: 12px;
        }

        .crud-form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 8px;
        }

        @media (max-width: 640px) {
            .main-content {
                padding: 18px;
            }

            .content-card {
                padding: 18px;
            }

            .crud-toolbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .crud-actions {
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <div class="cyber-grid-3d"></div>
    </div>

    <div class="dashboard-wrapper">
        <!-- Sidebar Menu -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                SI-AKADEMIK
            </div>

            <div class="sidebar-menu">
                <div class="menu-label">Navigasi Utama</div>
                <a href="/" class="menu-item {{ request()->is('/') ? 'active' : '' }}">Dashboard</a>
                
                <div class="menu-label">Data Akademik</div>
                <a href="/mahasiswa" class="menu-item {{ request()->is('mahasiswa*') ? 'active' : '' }}">Data Mahasiswa</a>
                <a href="/dosen" class="menu-item {{ request()->is('dosen*') ? 'active' : '' }}">Data Dosen</a>
                <a href="/matakuliah" class="menu-item {{ request()->is('matakuliah*') ? 'active' : '' }}">Data Mata Kuliah</a>
                <a href="{{ route('kelas.index') }}" class="menu-item {{ request()->is('kelas*') ? 'active' : '' }}">Data Kelas</a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content">
            <div>
                <!-- Header -->
                <header class="header">
                    <div class="header-title">
                        @isset($header)
                            {{ $header }}
                        @else
                            @yield('heading', 'Dashboard Akademik')
                        @endisset
                    </div>
                    <div class="user-badge">
                        <div class="pulse-dot"></div>
                        <span>DB: db_akademik (MySQL)</span>
                    </div>
                </header>

                <!-- Content Body -->
                <section class="content-card">
                    @isset($slot)
                        {{ $slot }}
                    @else
                        @yield('content')
                    @endisset
                </section>
            </div>

            <!-- Footer -->
            <footer class="footer">
                Sistem Informasi Akademik // Politeknik Manufaktur Bandung &copy; 2026
            </footer>
        </main>
    </div>
</body>
</html>