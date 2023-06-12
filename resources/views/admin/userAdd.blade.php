<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-addUser</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <div class="row">

            <div class="col-md-5">
                <h3>Create New User </h3>
                <hr>

                <form action="{{ url('admin/addUser') }}" method="post">
                    @csrf

                    <div class="form-group">
                        Email:
                        <input name="email" type="email" required class="form-control" />
                    </div>

                    <div class="form-group">
                        Passsword:
                        <input name="password" type="password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        Password Confirm:
                        <input name="confirm" type="password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        Fullname:
                        <input name="fullname" required class="form-control" />
                    </div>

                    <div class="form-group">
                        Role:
                        <select name="role" required class="form-control">
                            <option value="">Please choose one</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Active:
                        <select name="active" required class="form-control">
                            <option value="">Please choose one</option>
                            <option value="1">Active</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>

                    <div>
                        <input type="submit" value="Create" class="btn btn-danger" />
                        <input type="reset" value="Reset" class="btn btn-info">
                    </div>

            </div>
        </div>



        
    </div>



</body>

</html>