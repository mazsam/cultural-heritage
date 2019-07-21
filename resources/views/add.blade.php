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
        <h3>Data Bangunan</h3>

        <a href="/user-input"><button type="button" class="btn btn-default"> Kembali</button></a>

        <br/>
        <br/>
        <form action="/user-input/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Nama:</label>
                <input class="form-control" type="text" name="nama" required="required">
            </div>
            <div class="form-group">
                <label for="email">Alamat:</label>
                <input class="form-control" type="text" name="address" required="required">
            </div>
            <div class="form-group">
                <label for="email">Tahun Berdiri:</label>
                <input class="form-control" type="number" name="year" required="required">
            </div>
            <div class="form-group">
                <label for="email">Latitude:</label>
                <input class="form-control" type="text" name="lat" required="required">
            </div>
            <div class="form-group">
                <label for="email">Longitude:</label>
                <input class="form-control" type="text" name="lng" required="required">
            </div>
            <div class="form-group">
                <label for="desc">Description: </label>
                <textarea name="description" class="form-control" id="desc" rows="6"></textarea>
            </div>
            <div class="form-group">
                <label for="email">Image:</label>
                <input class="form-control" type="file" name="file" required="required">
            </div>

            Kecamatan <br><select name="district">
                    @foreach($district as $d)
                    <option value="{{ $d['id']}}">{{ $d['name']}}</option>
                    @endforeach
                </select><br/><br/>
            Kategory <br><select name="category">
                @foreach($category as $c)
                <option value="{{ $c['id']}}">{{ $c['name']}}</option>
                @endforeach
            </select><br/><br/>
            <input type="submit" value="Simpan Data" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
