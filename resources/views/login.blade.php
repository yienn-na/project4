<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Login</title>
</head>
<body>
    <h2>Silakan Login</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="/login" method="POST">
        @csrf
        <p>
            <label>Username:</label><br>
            <input type="text" name="u" required>
        </p>

        <p>
            <label>Password:</label><br>
            <input type="password" name="p" required>
        </p>

        <p>
            <button type="submit">Login</button>
        </p>
    </form>

    <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
</body>
</html>