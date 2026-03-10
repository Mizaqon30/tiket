@extends('layouts.auth')

@section('title', 'Login - Authorization Lab')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<div class="auth-root">

    {{-- BACKGROUND EFFECTS --}}
    <div class="bg-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="auth-wrap">

        {{-- PANEL KIRI --}}
        <div class="panel-left">
            <div class="brand-icon">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                    <rect width="48" height="48" rx="14" fill="rgba(255,255,255,0.1)"/>
                    <path d="M24 10L34 16V26C34 31.5 29.5 36.5 24 38C18.5 36.5 14 31.5 14 26V16L24 10Z" fill="none" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                    <circle cx="24" cy="24" r="4" fill="white"/>
                    <path d="M24 20V24L27 27" stroke="rgba(0,0,0,0.3)" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>

            <div class="panel-left-content">
                <div class="eyebrow-tag">SMK WIKRAMA BOGOR</div>
                <h1 class="panel-title">Sistem<br>Otorisasi<br><span class="title-accent">Terpadu</span></h1>
                <p class="panel-desc">Platform bantuan aman dengan kontrol akses berbasis peran untuk seluruh civitas akademika.</p>
            </div>

            <div class="feature-list">
                <div class="feature-item">
                    <span class="feature-dot"></span>
                    <span>Rate Limiting & Brute Force Protection</span>
                </div>
                <div class="feature-item">
                    <span class="feature-dot"></span>
                    <span>Session Regeneration</span>
                </div>
                <div class="feature-item">
                    <span class="feature-dot"></span>
                    <span>Bcrypt + CSRF Protection</span>
                </div>
                <div class="feature-item">
                    <span class="feature-dot dot-accent"></span>
                    <span>Role-Based Access Control</span>
                </div>
            </div>

            <div class="panel-version">AUTH LAB v2.0 &mdash; SECURE</div>
        </div>

        {{-- PANEL KANAN --}}
        <div class="panel-right">

            <div class="form-header">
                <div class="form-header-top">
                    <span class="lab-badge"><i class="bi bi-person-badge"></i> AUTHORIZATION LAB</span>
                    <a href="{{ route('vulnerable.login') }}" class="vuln-badge">
                        <i class="bi bi-exclamation-triangle-fill"></i> Mode Vulnerable
                    </a>
                </div>
                <h2 class="form-title">Masuk ke Akun</h2>
                <p class="form-subtitle">Masukkan kredensial Anda untuk mengakses sistem</p>
            </div>

            {{-- FORM --}}
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <div class="field-group">
                    <label for="email" class="field-label">EMAIL</label>
                    <div class="field-wrap">
                        <i class="bi bi-envelope field-icon"></i>
                        <input type="email" name="email" id="email"
                            class="field-input @error('email') has-error @enderror"
                            placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field-group">
                    <div class="field-label-row">
                        <label for="password" class="field-label">PASSWORD</label>
                        <a href="#" class="forgot-link">Lupa Password?</a>
                    </div>
                    <div class="field-wrap">
                        <i class="bi bi-lock field-icon"></i>
                        <input type="password" name="password" id="password"
                            class="field-input @error('password') has-error @enderror"
                            placeholder="••••••••" required>
                        <button type="button" id="togglePassword" class="toggle-pw">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field-remember">
                    <label class="remember-label">
                        <input type="checkbox" name="remember" id="remember" class="remember-check" {{ old('remember') ? 'checked' : '' }}>
                        <span class="remember-box"></span>
                        <span class="remember-text">Ingat saya</span>
                    </label>
                </div>

                <button type="submit" class="btn-submit">
                    <span>Masuk Sekarang</span>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            {{-- DIVIDER --}}
            <div class="divider"><span>Akun Uji Coba</span></div>

            {{-- TEST ACCOUNTS --}}
            <div class="accounts-panel">
                <div class="accounts-table-wrap">
                    <table class="accounts-table">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row-clickable" data-email="admin@wikrama.sch.id" data-password="password">
                                <td><code>admin@wikrama.sch.id</code></td>
                                <td><code>password</code></td>
                                <td><span class="role-badge role-admin">admin</span></td>
                                <td><small>Full access</small></td>
                            </tr>
                            <tr class="row-clickable" data-email="staff@wikrama.sch.id" data-password="password">
                                <td><code>staff@wikrama.sch.id</code></td>
                                <td><code>password</code></td>
                                <td><span class="role-badge role-staff">staff</span></td>
                                <td><small>Tiket ditugaskan</small></td>
                            </tr>
                            <tr class="row-clickable" data-email="budi@student.sch.id" data-password="password">
                                <td><code>budi@student.sch.id</code></td>
                                <td><code>password</code></td>
                                <td><span class="role-badge role-user">user</span></td>
                                <td><small>Tiket sendiri</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="table-hint"><i class="bi bi-cursor-fill"></i> Klik baris untuk isi otomatis</p>
            </div>

            {{-- CODE PREVIEW --}}
            <div class="code-card">
                <div class="code-header">
                    <div class="code-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <span class="code-filename">TicketPolicy.php</span>
                </div>
                <pre class="code-body"><code><span class="c-keyword">public function</span> <span class="c-fn">update</span>(<span class="c-type">User</span> $user, <span class="c-type">Ticket</span> $ticket): <span class="c-type">bool</span>
{
    <span class="c-comment">// Staff hanya bisa edit jika ditugaskan</span>
    <span class="c-keyword">if</span> ($user-><span class="c-fn">isStaff</span>()) {
        <span class="c-keyword">return</span> $ticket->assigned_to === $user->id;
    }

    <span class="c-comment">// User hanya bisa edit milik sendiri & belum closed</span>
    <span class="c-keyword">return</span> $ticket-><span class="c-fn">belongsToUser</span>($user)
        && $ticket-><span class="c-fn">isEditable</span>();
}</code></pre>
            </div>

        </div>
    </div>
</div>

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --teal:       #0fcfb8;
    --teal-dark:  #0aa090;
    --teal-dim:   rgba(15,207,184,0.12);
    --bg:         #0b0f14;
    --surface:    #111820;
    --surface-2:  #161e28;
    --border:     rgba(255,255,255,0.07);
    --border-2:   rgba(255,255,255,0.12);
    --text:       #e8edf2;
    --muted:      rgba(232,237,242,0.45);
    --danger:     #ff4d6d;
    --font-head:  'Syne', sans-serif;
    --font-mono:  'DM Mono', monospace;
}

html, body {
    height: 100% !important;
    width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
    overflow: hidden !important;
}

body {
    background: var(--bg) !important;
    font-family: var(--font-head);
    color: var(--text);
}

/* ── BACKGROUND ── */
.auth-root {
    position: fixed;
    inset: 0;
    display: flex;
}

.bg-grid {
    position: fixed; inset: 0; z-index: 0;
    background-image:
        linear-gradient(rgba(15,207,184,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(15,207,184,0.03) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
}

.orb {
    position: fixed; border-radius: 50%;
    filter: blur(100px); pointer-events: none; z-index: 0;
    animation: float 8s ease-in-out infinite;
}
.orb-1 { width: 500px; height: 500px; background: rgba(15,207,184,0.07); top: -150px; left: -150px; animation-delay: 0s; }
.orb-2 { width: 400px; height: 400px; background: rgba(99,102,241,0.05); bottom: -100px; right: -100px; animation-delay: 3s; }
.orb-3 { width: 300px; height: 300px; background: rgba(15,207,184,0.04); top: 50%; left: 50%; transform: translate(-50%,-50%); animation-delay: 5s; }

@keyframes float {
    0%,100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-30px) scale(1.05); }
}

/* ── LAYOUT ── */
/* ── LAYOUT ── */
.auth-wrap {
    position: relative; z-index: 1;
    display: grid;
    grid-template-columns: 40% 60%;
    width: 100%;
    height: 100%;
    animation: fadeIn 0.5s ease both;
}
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* ── PANEL KIRI ── */
.panel-left {
    background: linear-gradient(160deg, #0d3d38 0%, #091c1a 60%, #0b0f14 100%);
    border-right: 1px solid var(--border-2);
    padding: 3rem 2.5rem;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
    height: 100%;
    justify-content: space-between;
}

.panel-left::before {
    content: '';
    position: absolute;
    top: -60px; right: -60px;
    width: 240px; height: 240px;
    border: 1px solid rgba(15,207,184,0.15);
    border-radius: 50%;
    pointer-events: none;
}
.panel-left::after {
    content: '';
    position: absolute;
    bottom: -80px; left: -80px;
    width: 300px; height: 300px;
    border: 1px solid rgba(15,207,184,0.08);
    border-radius: 50%;
    pointer-events: none;
}

.brand-icon { margin-bottom: 2.5rem; }
.brand-icon svg { display: block; }

.eyebrow-tag {
    font-size: 0.65rem; letter-spacing: 3px; text-transform: uppercase;
    color: var(--teal); margin-bottom: 1rem; font-weight: 600;
}

.panel-title {
    font-size: 2.6rem; font-weight: 800; line-height: 1.05;
    color: #fff; margin-bottom: 1.2rem;
}
.title-accent { color: var(--teal); }

.panel-desc {
    font-size: 0.85rem; line-height: 1.6;
    color: rgba(255,255,255,0.45);
    margin-bottom: 2.5rem;
    font-family: var(--font-mono);
}

.panel-left-content { flex: 1; }

.feature-list { display: flex; flex-direction: column; gap: 0.7rem; margin-bottom: 2.5rem; }
.feature-item {
    display: flex; align-items: center; gap: 0.7rem;
    font-size: 0.78rem; color: rgba(255,255,255,0.5);
    font-family: var(--font-mono);
}
.feature-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: rgba(15,207,184,0.4); flex-shrink: 0;
}
.feature-dot.dot-accent { background: var(--teal); box-shadow: 0 0 6px var(--teal); }

.panel-version {
    font-size: 0.65rem; letter-spacing: 2px;
    color: rgba(255,255,255,0.2);
    text-transform: uppercase;
    font-family: var(--font-mono);
    border-top: 1px solid var(--border);
    padding-top: 1.2rem;
}

/* ── PANEL KANAN ── */
.panel-right {
    background: var(--surface);
    padding: 2.5rem 3rem;
    overflow-y: auto;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.form-header { margin-bottom: 2rem; }
.form-header-top {
    display: flex; align-items: center;
    justify-content: space-between;
    gap: 1rem; margin-bottom: 1.5rem;
    flex-wrap: wrap;
}

.lab-badge {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 0.65rem; letter-spacing: 2px; text-transform: uppercase;
    background: var(--teal-dim); color: var(--teal);
    border: 1px solid rgba(15,207,184,0.25);
    padding: 5px 12px; border-radius: 100px;
    font-family: var(--font-mono);
}

.vuln-badge {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 0.65rem; letter-spacing: 1px; text-transform: uppercase;
    background: rgba(255,77,109,0.1); color: var(--danger);
    border: 1px solid rgba(255,77,109,0.25);
    padding: 5px 12px; border-radius: 100px;
    text-decoration: none; transition: all 0.2s;
    font-family: var(--font-mono);
}
.vuln-badge:hover { background: rgba(255,77,109,0.2); color: var(--danger); }

.form-title { font-size: 1.7rem; font-weight: 800; color: #fff; margin-bottom: 0.4rem; }
.form-subtitle { font-size: 0.82rem; color: var(--muted); font-family: var(--font-mono); }

/* ── FIELDS ── */
.login-form { display: flex; flex-direction: column; gap: 0; }

.field-group { margin-bottom: 1.25rem; }
.field-label {
    display: block; font-size: 0.65rem; letter-spacing: 2px;
    text-transform: uppercase; color: var(--muted);
    margin-bottom: 0.5rem; font-weight: 600;
}
.field-label-row {
    display: flex; justify-content: space-between; align-items: center;
    margin-bottom: 0.5rem;
}
.forgot-link { font-size: 0.72rem; color: var(--teal); text-decoration: none; transition: opacity 0.2s; }
.forgot-link:hover { opacity: 0.7; }

.field-wrap { position: relative; }
.field-icon {
    position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
    color: var(--muted); font-size: 0.9rem; pointer-events: none;
    transition: color 0.2s;
}
.field-wrap:focus-within .field-icon { color: var(--teal); }

.field-input {
    width: 100%; background: var(--surface-2);
    border: 1px solid var(--border-2);
    border-radius: 10px; color: var(--text);
    font-family: var(--font-mono); font-size: 0.88rem;
    padding: 12px 44px; outline: none;
    transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
}
.field-input::placeholder { color: rgba(232,237,242,0.2); }
.field-input:focus {
    border-color: var(--teal);
    box-shadow: 0 0 0 3px rgba(15,207,184,0.12);
    background: rgba(15,207,184,0.04);
}
.field-input.has-error { border-color: var(--danger); }
.field-error { display: block; font-size: 0.72rem; color: var(--danger); margin-top: 0.35rem; font-family: var(--font-mono); }

.toggle-pw {
    position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
    background: none; border: none; color: var(--muted); cursor: pointer;
    padding: 4px; transition: color 0.2s; font-size: 0.9rem;
}
.toggle-pw:hover { color: var(--text); }

/* REMEMBER */
.field-remember { margin-bottom: 1.5rem; }
.remember-label { display: inline-flex; align-items: center; gap: 8px; cursor: pointer; }
.remember-check { display: none; }
.remember-box {
    width: 16px; height: 16px; border-radius: 4px;
    border: 1px solid var(--border-2); background: var(--surface-2);
    display: inline-block; transition: all 0.2s; flex-shrink: 0;
    position: relative;
}
.remember-check:checked + .remember-box {
    background: var(--teal); border-color: var(--teal);
}
.remember-check:checked + .remember-box::after {
    content: '✓'; position: absolute; top: 50%; left: 50%;
    transform: translate(-50%,-50%); font-size: 10px; color: #000; font-weight: 700;
}
.remember-text { font-size: 0.78rem; color: var(--muted); }

/* SUBMIT BTN */
.btn-submit {
    width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px;
    background: var(--teal); color: #000; border: none;
    border-radius: 10px; padding: 14px;
    font-family: var(--font-head); font-size: 0.9rem; font-weight: 700;
    letter-spacing: 0.5px; cursor: pointer;
    transition: all 0.2s; position: relative; overflow: hidden;
}
.btn-submit::before {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 60%);
}
.btn-submit:hover { background: var(--teal-dark); transform: translateY(-1px); box-shadow: 0 8px 24px rgba(15,207,184,0.3); }
.btn-submit:active { transform: translateY(0); }

/* DIVIDER */
.divider {
    position: relative; text-align: center; margin: 1.8rem 0 1.2rem;
}
.divider::before {
    content: ''; position: absolute; top: 50%; left: 0; right: 0;
    height: 1px; background: var(--border);
}
.divider span {
    position: relative; background: var(--surface);
    padding: 0 1rem; font-size: 0.7rem; letter-spacing: 2px;
    text-transform: uppercase; color: var(--muted); font-family: var(--font-mono);
}

/* ACCOUNTS TABLE */
.accounts-panel { margin-bottom: 1.5rem; }
.accounts-table-wrap { border-radius: 10px; overflow: hidden; border: 1px solid var(--border-2); }
.accounts-table { width: 100%; border-collapse: collapse; font-family: var(--font-mono); font-size: 0.72rem; }
.accounts-table thead tr { background: var(--surface-2); }
.accounts-table th {
    padding: 8px 12px; color: var(--muted); font-weight: 500;
    letter-spacing: 1px; text-transform: uppercase; font-size: 0.62rem;
    border-bottom: 1px solid var(--border);
}
.accounts-table td {
    padding: 9px 12px; border-bottom: 1px solid var(--border);
    color: rgba(232,237,242,0.7);
}
.accounts-table tbody tr:last-child td { border-bottom: none; }
.accounts-table tbody tr { transition: background 0.15s; }
.accounts-table tbody tr:hover { background: rgba(15,207,184,0.05); cursor: pointer; }
.accounts-table code { color: #7dd3cb; font-size: 0.7rem; }

.role-badge {
    display: inline-block; padding: 2px 8px; border-radius: 100px;
    font-size: 0.6rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;
}
.role-admin { background: rgba(255,77,109,0.15); color: #ff8099; border: 1px solid rgba(255,77,109,0.3); }
.role-staff { background: rgba(99,102,241,0.15); color: #a5b4fc; border: 1px solid rgba(99,102,241,0.3); }
.role-user { background: rgba(255,255,255,0.06); color: rgba(232,237,242,0.5); border: 1px solid var(--border-2); }

.table-hint {
    font-size: 0.68rem; color: rgba(232,237,242,0.25);
    margin-top: 0.5rem; font-family: var(--font-mono);
    display: flex; align-items: center; gap: 5px;
}

/* CODE CARD */
.code-card { border-radius: 10px; overflow: hidden; border: 1px solid var(--border-2); }
.code-header {
    background: #1a2332; padding: 10px 14px;
    display: flex; align-items: center; gap: 10px;
    border-bottom: 1px solid var(--border);
}
.code-dots { display: flex; gap: 6px; }
.dot { width: 10px; height: 10px; border-radius: 50%; }
.dot-red    { background: #ff5f57; }
.dot-yellow { background: #febc2e; }
.dot-green  { background: #28c840; }
.code-filename { font-family: var(--font-mono); font-size: 0.7rem; color: var(--muted); margin-left: 4px; }

.code-body {
    background: #0d1520; padding: 1.2rem;
    font-family: var(--font-mono); font-size: 0.73rem;
    line-height: 1.6; overflow-x: auto; margin: 0;
    color: rgba(232,237,242,0.7);
}
.c-keyword { color: #c792ea; }
.c-fn      { color: #82aaff; }
.c-type    { color: #ffcb6b; }
.c-comment { color: #546e7a; font-style: italic; }

/* ── RESPONSIVE ── */
@media (max-width: 768px) {
    .auth-wrap { grid-template-columns: 1fr; }
    .panel-left { display: none; }
    .panel-right { padding: 2rem 1.5rem; max-height: none; }
}
</style>

<script>
    // Toggle password
    document.querySelector('#togglePassword').addEventListener('click', function() {
        const pw = document.querySelector('#password');
        const icon = document.querySelector('#eyeIcon');
        pw.type = pw.type === 'password' ? 'text' : 'password';
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    });

    // Auto-fill on row click
    document.querySelectorAll('.row-clickable').forEach(row => {
        row.addEventListener('click', function() {
            document.querySelector('#email').value = this.dataset.email;
            document.querySelector('#password').value = this.dataset.password;
            document.querySelectorAll('.row-clickable').forEach(r => r.style.background = '');
            this.style.background = 'rgba(15,207,184,0.08)';
        });
    });
</script>

@endsection
