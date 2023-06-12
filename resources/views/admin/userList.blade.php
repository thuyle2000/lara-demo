<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3>List of Users</h3>

        <h5><a href="{{ url('admin/displayAddUser') }}">Create New User </a></h5>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>AccountId</th>
                    <th>Email</th>
                    <th>Full name</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr>
                    <td>{{ $u->accountID }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->fullname }}</td>
                    <td>{{ $u->role == 1 ? 'Admin' : 'User' }}</td>
                    <td>{{ $u->active == 1 ? 'Active' : 'Disable' }}</td>
                    <td><a href="{{url("admin/resetPassword/{$u->accountID}")}}">Reset Password</a> |
                        <a href="{{url("user/details/{$u->accountID}")}}">View Profile</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>