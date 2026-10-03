<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
</head>
<body>

    <h1>Welcome to the dashboard {{ session('u') }}</h1>
    
    <table border="1" width="550">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hai as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <button><a href="/logout">Logout</a></button>

</body>
</html>