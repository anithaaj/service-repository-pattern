<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>CRUD | Table</title>
</head>
<body>
    <div class="container">
    <a href="/">+ Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($result as $d)
            <tr>
                <td>{{ $d['title'] }}</td>
                <td>{{ $d['description'] }}</td>
                <td><a href="/post/edit{{ $d['id'] }}">Edit</a> |
                <a href="/delete{{ $d['id'] }}">Delete</a> 
                </td>
            </tr>
        @endforeach
        </tbody>
    </div>
</body>
</html>