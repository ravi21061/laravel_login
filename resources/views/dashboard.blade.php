<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container">
        <h2>Welcome to the Dashboard</h2>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
              <tbody>
                <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td><a href="logout">Logout</a></td>
                </tr>
                
              </tbody>
        </table>
    </div>
    
</body>
</html>