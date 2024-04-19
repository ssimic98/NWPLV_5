<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korisnici</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Korisnici</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Ime</th>
                <th>Email</th>
                <th>Uloga</th>
                <th>Dodjela uloge</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('admin.users.assingRole', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <select class="form-control" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="nastavnik">Nastavnik</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Dodijeli ulogu</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
