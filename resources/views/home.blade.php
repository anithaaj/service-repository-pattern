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
    <title>CRUD | Home</title>
</head>
<body>
    <h2>Review Buku</h2>
    <form action="/post/save" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Judul Buku :</label>
            <input type="text" class="form-control" placeholder="Judul buku" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Buku :</label>
            <input type="text" class="form-control" placeholder="Deskripsi buku" id="description" name="description">
        </div>
        <input type="submit" class="btn btn-primary" name="submit">
    </form>
</body>
</html>