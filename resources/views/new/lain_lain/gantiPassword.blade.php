@extends('new.attr.sidebar')

@section('content')
<div class="wrapper">
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Halaman Ganti Password
				<small>User</small>
			</h1>
		</section>
		<div class="container-fluid">
			<section class="content">
				<div class="box box-success">
					@if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
					@endif
					<div class="box-body">
						<form action="{{url(Auth::user()->poli->prefix.'/updatePassword')}}" method="post" accept-charset="utf-8" class="col-md-6">
							{{csrf_field()}}
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>
											Nama Pengguna
										</label>
									</div>
									<div class="col-md-6">
										<input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" readonly>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>
											Password Baru
										</label>
									</div>
									<div class="col-md-6">
										<div class="input-group">
											<input class="form-control" type="password" name="passwordBaru1" id="passwordBaru1">
											<span class="input-group-addon" onclick="passwordBaru1();"><i class="fa fa-eye"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>
											Konfirmasi Password
										</label>
									</div>
									<div class="col-md-6">
										<div class="input-group">
											<input class="form-control" type="password" name="passwordBaru2" id="passwordBaru2">
											<span class="input-group-addon" onclick="passwordBaru2();"><i class="fa fa-eye"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
									</div>
									<div class="col-md-6">
										<button type="submit" class="btn btn-primary form-control">Simpan</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
	</section>
</div>
</div>
</div>
<script>
	var pB1 = 0;
	var pB2 = 0;
	function passwordBaru1(){
		if (pB1 == 0) {
			show('passwordBaru1');
			pB1 = 1;
		}else{
			hide('passwordBaru1');
			pB1 = 0;
		}
	}
	function passwordBaru2(){
		if (pB2 == 0) {
			show('passwordBaru2');
			pB2 = 1;
		}else{
			hide('passwordBaru2');
			pB2 = 0;
		}
	}
	function show(id){
		$('#'+id).attr('type','text');
	}
	function hide(id){
		$('#'+id).attr('type','password');
	}
</script>
@endSection