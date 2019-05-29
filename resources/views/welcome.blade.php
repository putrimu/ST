<!DOCTYPE html>
<html>
<head>

<title>SIPEDE</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
	<form action="{{url('/'.$idweb)}}" method="POST">
		 @csrf
	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-4"><b>SIPEDE </b>ID #{{$idweb}}</h1>
	    <p class="lead">
	    @if($data['success'] != true)
	    	Silakan Gunakan Fingger Print
		    <a class="btn btn-primary text-white" onclick='location.reload(true); return false;'>Reload</a>
	    @endif
	    </p>
	  </div>
	</div>

	@if($data['success'] == true)
	<div class="row">
		<div class="col-md-4">
			<table class="table">
			    <tr>
			      <th scope="col">NIK</th>
			      <td>{{ $data['pemilih']->nik }}</td>
			    </tr>
			    <tr>
			      <th scope="col">Nama</th>
			      <td>{{ $data['pemilih']->nama }}</td>
			    </tr>
			    <tr>
			      <th scope="col">Jenis Kelamin</th>
			      <td>{{ $data['pemilih']->jenis_kelamin }}</td>
			    </tr>
			    <tr>
			      <th scope="col">Alamat</th>
			      <td>{{ $data['pemilih']->alamat }}</td>
			    </tr>
			    <tr>
			      <th scope="col">RT</th>
			      <td>{{ $data['rt']->kode_rt }}</td>
			    </tr>
			</table>
		</div>
		<div class="col-md-8">
			<h1>Pemilihan RT</h1>
			<div class="row">
				@foreach($data['calonrt'] as $rt)
				<div class="col-sm-5">
					<div class="card">
					  <img class="card-img-top" src="{{ $rt->foto }}" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title">{{ $rt->nama }}</h5>
					    <p class="card-text">
					    	<b>VISI</b><br>
					    	{{ $rt->visi }}
					    	<br><b>MISI</b><br>
					    	{{ $rt->misi }}
					    	<br><br>
					    	<input type="radio" name="calonrt" value="{{ $rt->id }}" required> <b>Pilih Saya</b>
					    </p>
					  </div>
					</div>
				</div>
				@endforeach
			</div>
			<br>
			<h1>Pemilihan RW</h1>
			<div class="row">
			@foreach($data['calonrw'] as $rw)
			<div class="col-sm-5">
				<div class="card">
				  <img class="card-img-top" src="{{ $rw->foto }}" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">{{ $rw->nama }}</h5>
				    <p class="card-text">
				    	<b>VISI</b><br>
				    	{{ $rw->visi }}
				    	<br><b>MISI</b><br>
				    	{{ $rw->misi }}
				    	<br><br>
				    	<input type="radio" name="calonrw" value="{{ $rw->id }}" required> <b>Pilih Saya</b>
				    </p>
				  </div>
				</div>
			</div>
			@endforeach
			</div>
			<br>
			<input type="submit" name="simpan" value="SELESAI" class="btn btn-primary">
			<br>
			<br>
		</div>
	</div>
	@endif
	</form>

</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="lead">&copy; 2019 - Kelompok 6 (D) - Kelompok 1 (D) - Kelompok 2 (A) - Kelompok 2 (B) - Kelompok 7 (C)</p>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>