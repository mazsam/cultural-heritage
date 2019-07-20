<html>
<head>
    <title>Cultural Heritage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">

        <h2>Cultural Heritage</h2>
        <h3>Add Image</h3>

        <a href="/user-input"><button type="button" class="btn btn-default"> Kembali</button></a>
        @if (session('status'))
        <br/>
        <br/>
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <br/>
        <br/>
        <form action="/user-input/inputImage" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Nama:</label>
                <input class="form-control" type="text" name="name" required="required">
            </div>
            <div class="form-group">
                <label for="email">Image:</label>
                <input class="form-control" type="file" name="file" required="required">
            </div>

            Building <br><select name="building_id">
                @foreach($building as $c)
                <option value="{{ $c['id']}}">{{ $c['name']}}</option>
                @endforeach
            </select><br/><br/>
            <input type="submit" value="Simpan Data" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
