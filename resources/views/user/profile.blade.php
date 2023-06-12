<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user-profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">


        <div class="row">
            <div class="col-md-5">

                <h3>User Profile</h3>

                <div class="form-group">
                    <label for="">AccountId: </label>
                    <input name="accountID" value="{{ $user->accountID }}" readonly class="form-control" />
                </div>

                <div class="form-group">
                    Email:
                    <input name="email" value="{{ $user->email }}" readonly class="form-control" />
                </div>

                <div class="form-group">
                    Fullname:
                    <input name="fullname" value="{{ $user->fullname }}" readonly class="form-control" />
                </div>

                <div class="form-group">
                    Role:
                    <select name="role" disabled class="form-control">
                        <option value="0">Please choose one</option>
                        <option value="1" @if ($user->role == 1) selected @endif >Admin</option>
                        <option value="2" @if ($user->role == 2) selected @endif>User</option>
                    </select>
                </div>

                <div class="form-group">
                    Active:
                    <select name="active" disabled class="form-control">
                        <option value="0">Please choose one</option>
                        <option value="1" @if ($user->active == 1) selected @endif >Active</option>
                        <option value="2" @if ($user->active == 2) selected @endif>Disable</option>
                    </select>
                </div>

                <p><a href="{{ url('login') }}">Login</a> | <a href="{{ url('logout') }}"> Logout </a> </p>

            </div>
        </div>




    </div>
</body>

</html>