<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h4>Login</h4>

                @if (session('message'))
                <span style="display: block; color:red">{{session('message')}}</span>
                @endif

                <form action="{{url('checkLogin')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" class="form-control" name="email" id="email" value="quang@gmail.com"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" class="form-control" name="password" id="password" value="123" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger">submit</button>
                        <button type="reset" class="btn btn-info">reset </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>