<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Login</title>
</head>
<body>
    <h2>Silakan Login</h2>

    <!-- Notifikasi Sukses / Error -->
    @if(session('success'))
        <div style="color: green; padding: 10px; border: 1px solid green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 10px;">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <div>
            <label>Username:</label><br>
            <input type="text" name="u" required>
        </div>
        <br>
        <div>
            <label>Password:</label><br>
            <input type="password" name="p" required>
        </div>
        <br>
        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
</body>
</html>