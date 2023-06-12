<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="pt-5">
  <h1 class="text-center">Login</h1>
  
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
        <div class="card card-body">
            <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <div class="mt-3">
            <p>Don't have an account? <a href="/register">Register</a></p>
        </div>
</div>
</body>
</html>
