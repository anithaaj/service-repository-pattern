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
    <title>CRUD | Update</title>
</head>
<body>
    <h2>Edit Review Buku</h2>

    <form action="/post/update{{$result[0]['id']}}" method="GET">
        @csrf
        <div class="form-group">
            <label for="title">Judul Buku :</label>
            <input type="text" class="form-control" placeholder="Judul buku" id="title" value="{{$result[0]['title']}}">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Buku :</label>
            <input type="text" class="form-control" placeholder="Deskripsi buku" id="description" value="{{$result[0]['description']}}">
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Save">
    </form>
</body>
</html>