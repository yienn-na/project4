<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi</title>
</head>
<body>
    <h2>Form Pendaftaran Akun</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/register" method="POST">
        @csrf
        <p>
            <label>Username:</label><br>
            <input type="text" name="username" value="{{ old('username') }}" required>
        </p>

        <p>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </p>

        <p>
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </p>

        <p>
            <label>Konfirmasi Password:</label><br>
            <input type="password" name="password_confirmation" required>
        </p>

        <p>
            <button type="submit">Daftar</button>
        </p>
    </form>

    <p>Sudah punya akun? <a href="/">Login di sini</a></p>
</body>
</html>