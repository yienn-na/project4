<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>
<body>
    <h1>Sign Up</h1>

    <!-- Menampilkan pesan error jika validasi gagal -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/girasya" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" id="username" name="username" value="{{ old('username') }}" required></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" value="{{ old('email') }}" required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="password_confirmation">Confirmation Password</label></td>
                <td><input type="password" id="password_confirmation" name="password_confirmation" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Daftar</button></td>
            </tr>
        </table>
    </form>
</body>
</html>