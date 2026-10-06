<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data user</title>
</head>
<body>
    <h2>Edit Data user</h2>

    <form action="/update/{{ $user->id }}" method="POST">
        @csrf
        <p>
            <label>Username:</label><br>
            <input type="text" name="username" value="{{ $user->username }}" required>
        </p>

        <p>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </p>

        <p>
            <button type="submit">Simpan Perubahan</button>
        </p>
    </form>

    <p><a href="/tampil">Kembali ke Daftar User</a></p>
</body>
</html>