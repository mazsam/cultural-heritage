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


    <a href="/user-input/tambah"><button type="button" class="btn btn-primary"> + Tambah Bangunan Baru</button></a>
    <a href="/user-input/addImage"><button type="button" class="btn btn-primary"> + Tambah Gambar Baru</button></a>
	<br/>
	<br/>

	<table class="table table-bordered">
        <thead>
		<tr>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Tahun Berdiri</th>
			<th>Lat</th>
            <th>Lng</th>
            <th>Kategory</th>
            <th>Kecamatan</th>
            <th>Description</th>
            <th>Thumbnail</th>
            <th>Total Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($buildings as $building)
        {{-- {{ dd($building->category['name']) }} --}}
        @php
            $string = substr($building->description, 0, 50);
            $description = substr($string, 0, strrpos($string, ' ')) . " ...";
        @endphp
		<tr>
			<td>{{ $building->name }}</td>
            <td>{{ $building->address }}</td>
            <td>{{ $building->year }}</td>
            <td>{{ $building->lat }}</td>
            <td>{{ $building->lng }}</td>
            <td>{{ $building->category['name']}}</td>
            <td>{{ $building->district['name']}}</td>
            <td style="font-size: 12px;">{{ $description }}</td>
            <td><img style="max-height: 50px;" src="{{$building->image}}"></td>
            <td>{{ count($building->images)}}</td>
			<td>
				<a href="/user-input/edit/{{ $building->id }}">Edit</a>
				|
				<a href="/user-input/del/{{ $building->id }}">Hapus</a>
			</td>
		</tr>
        @endforeach
    </tbody>
	</table>
</div>
</body>
</html>
