<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD Laravel8</title>
  </head>
  <body>
    <h1 class="text-center mt-2 mb-4">Data Pegawai D-Office</h1>
	<p class="text-center">Create by Venica Yulia Nur Dheanty</p>
		<div class="container">
			<a href="/tambahdatapegawai" class="btn btn-success mb-2">Tambah Data</a>
			
			<div class="row g-3 align-items-center mb-2">
				<div class="col-auto">
				<form action="/pegawai" method="GET">
					<input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
				</form>
				</div>
			</div>

			<div class="row">
			@if ($message = Session::get('success'))
				<div class="alert alert-success" role="alert">
				{{$message}}
				</div>
			@endif
				<table class="table table-striped text-center ">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Foto</th>
							<th scope="col">Nama</th>
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">No Telepon</th>
							<th scope="col">Tanggal Input</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody >
					@php
						$no = 1;
					@endphp
					@foreach($data as $dt)
						<tr>
							<th scope="row">{{$no++}}</th>
							<td>
								<img src="{{asset('fotopegawai/'.$dt->foto)}}" alt="" style="width:80px;">
							</td>
							<td>{{$dt -> nama}}</td>
							<td>{{$dt -> jeniskelamin}}</td>
							<td>0{{$dt -> notelepon}}</td>
							<td>{{$dt -> created_at->format('D M Y')}}</td>
							<td>
								<a href="/editdata/{{$dt -> id}}" class="btn btn-warning">Edit</a>
								<a href="#" class="btn btn-danger delete" data-id="{{$dt -> id}}" data-nama="{{$dt->nama}}">Delete</a>
							</td>
						</tr>
					@endforeach
						
					</tbody>
				</table>
				{{ $data->links() }}
			</div>
		</div>
	

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  
  <script>
	$('.delete').click(function(){
		var pegawaiid = $(this).attr('data-id');
		var nama = $(this).attr('data-nama');
		
		swal({
			title: "Apakah Anda Yakin?",
			text: "Anda akan menghapus data pegawai dengan nama "+nama+"",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				window.location = "/delete/"+pegawaiid+""
			swal("Data berhasil dihapus", {
			icon: "success",
		});
			} else {
		swal("Data tidak jadi di hapus");
		}
	});
});
  
  </script>
  
</html>