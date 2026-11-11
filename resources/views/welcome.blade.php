<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik // Sleek Cyber 3D</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Custom Cursor Buku Terbuka (Open Book Glowing SVG) */
        html, body, a, button, div {
            cursor: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' fill='none' stroke='%2300f0ff' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'><path d='M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z' fill='%23030712'/><path d='M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z' fill='%23030712'/><path d='M6 8h2' stroke='%2338bdf8'/><path d='M16 8h2' stroke='%2338bdf8'/><path d='M6 12h2' stroke='%2338bdf8'/><path d='M16 12h2' stroke='%2338bdf8'/></svg>") 4 4, auto !important;
        }

        body {
            min-height: 100vh;
            background-color: #030712;
            font-family: 'Plus Jakarta Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #f3f4f6;
            overflow: hidden;
            position: relative;
            perspective: 1000px;
        }

        /* Perspective Grid Container */
        .grid-container {
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            perspective: 500px;
            z-index: 1;
            pointer-events: none;
        }

        /* Moving Cyber Grid 3D Animation */
        .cyber-grid-3d {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(56, 189, 248, 0.15) 1.5px, transparent 1.5px),
                linear-gradient(90deg, rgba(56, 189, 248, 0.15) 1.5px, transparent 1.5px);
            background-size: 60px 60px;
            transform: rotateX(60deg);
            transform-origin: 50% 50%;
            animation: gridInfiniteMove 8s linear infinite;
        }

        @keyframes gridInfiniteMove {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 0 60px;
            }
        }

        /* Radial Glow Blur */
        .glow-orb-1 {
            position: absolute;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.22) 0%, transparent 70%);
            top: 5%;
            left: 20%;
            filter: blur(70px);
            z-index: 2;
        }

        .glow-orb-2 {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(147, 51, 234, 0.18) 0%, transparent 70%);
            bottom: 5%;
            right: 20%;
            filter: blur(70px);
            z-index: 2;
        }

        .container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 460px;
        }

        /* Sleek Glass Card */
        .sleek-card {
            background: rgba(17, 24, 39, 0.75);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(56, 189, 248, 0.25);
            border-radius: 20px;
            padding: 36px 32px;
            box-shadow: 
                0 0 40px rgba(0, 0, 0, 0.8),
                0 0 20px rgba(56, 189, 248, 0.15);
            transition: all 0.4s ease;
            animation: floatUp 0.8s ease-out;
        }

        .sleek-card:hover {
            border-color: rgba(56, 189, 248, 0.5);
            box-shadow: 
                0 0 50px rgba(0, 0, 0, 0.9),
                0 0 30px rgba(56, 189, 248, 0.25);
        }

        @keyframes floatUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .cyber-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            background: rgba(56, 189, 248, 0.12);
            border: 1px solid rgba(56, 189, 248, 0.35);
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            color: #38bdf8;
            letter-spacing: 0.05em;
            margin-bottom: 14px;
        }

        .system-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.01em;
            background: linear-gradient(135deg, #ffffff 30%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-bottom: 30px;
        }

        .info-item {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 14px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.25s ease;
        }

        .info-item:hover {
            background: rgba(56, 189, 248, 0.06);
            border-color: rgba(56, 189, 248, 0.3);
            transform: translateX(4px);
        }

        .label {
            font-size: 12px;
            color: #9ca3af;
            font-weight: 500;
        }

        .value {
            font-size: 14px;
            font-weight: 600;
            color: #f3f4f6;
            text-align: right;
        }

        /* Database Indicator */
        .db-status {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(34, 197, 94, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.25);
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 12px;
            font-weight: 600;
            color: #4ade80;
        }

        .status-left {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background-color: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 10px #22c55e;
            animation: smoothPulse 2s infinite;
        }

        @keyframes smoothPulse {
            0% { transform: scale(0.95); opacity: 0.6; }
            50% { transform: scale(1.15); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.6; }
        }

        .driver-tag {
            font-size: 10px;
            color: #9ca3af;
            background: rgba(255, 255, 255, 0.05);
            padding: 2px 8px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <div class="cyber-grid-3d"></div>
    </div>
    <div class="glow-orb-1"></div>
    <div class="glow-orb-2"></div>

    <div class="container">
        <div class="sleek-card">
            <div class="header">
                <div class="cyber-badge">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                    v12.0 // LARAVEL CORE
                </div>
                <h1 class="system-title">ACADEMIC SYSTEM</h1>
            </div>

            <div class="info-list">
                <div class="info-item">
                    <span class="label">Nama Sistem</span>
                    <span class="value">Sistem Informasi Akademik</span>
                </div>

                <div class="info-item">
                    <span class="label">Nama Kampus</span>
                    <span class="value">Politeknik Manufaktur Bandung</span>
                </div>

                <div class="info-item">
                    <span class="label">Tahun Akademik</span>
                    <span class="value">2026 / 2027</span>
                </div>
            </div>

            <div class="db-status">
                <div class="status-left">
                    <div class="pulse-dot"></div>
                    <span>Connected: db_akademik</span>
                </div>
                <span class="driver-tag">MySQL</span>
            </div>
        </div>
    </div>
</body>
</html>