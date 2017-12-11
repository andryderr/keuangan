<!DOCTYPE html>
<html>
<!-- Left side column. contains the logo and sidebar -->
@extends('new.attr.sidebar')

@section('content')
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/UTILITAS/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Poli</li>
        </ol>
      </section>

      <div class="container-fluid">

       <!-- Main content -->
       <section class="content">
        <!-- Small boxes (Stat box) -->
        
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Poli</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/PERSONALIA/User/Register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" class="col-md-4 control-label">Name</label>

                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                  <label for="username" class="col-md-4 control-label">Username</label>

                  <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                    @if ($errors->has('username'))
                    <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-md-4 control-label">Password</label>

                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                  <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <input type="hidden" name="id_poli" value="{{$id}}" class="hidden">

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-btn fa-user"></i> Register
                    </button>
                  </div>
                </div>
              </form>
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID User</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Poli</th>
                    <th style="width=100px;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID User</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Poli</th>
                    <th style="width=100px;">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->username}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->poli->nama_poli}}</td>
                    <td>
                      @if($row->status == 'Active')
                      <button type="button" data-toggle="modal" data-target="#user" class="btn btn-warning" onclick="edit({{$row->id}},'{{$row->name}}','{{$row->email}}','{{$row->username}}',{{$row->id_poli}});"><i class="fa fa-edit"></i></button>
                      <a href="{{url('PERSONALIA/User/hapus/')}}/{{$row->id}}" onclick="return confirm('Hapus Data Ini ?');" ><button type="button" class="btn btn-danger"><strong>&times;</strong></button></a>
                      @else
                      <a href="{{url('PERSONALIA/User/active/')}}/{{$row->id}}" onclick="return confirm('Aktifkan Kembali ?');" ><button type="button" class="btn btn-success"><i class="fa fa-check"></i></button></a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </div>
              </tbody>
            </table>
          </div>
        </div>

      </div><!--end .card-body -->
    </div>
  </div>
</div>
<div class="modal" id="user" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3>Edit User</h3>
      </div>
      <form method="post" action="{{url('PERSONALIA/User/update')}}">
        {{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" class="hidden" id="id1" name="id">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name1" name="name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email1" name="email">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username1" name="username">
          </div>
          <div class="form-group">
            <label for="id_poli">Departement</label>
            <select class="form-control" name="id_poli" id="id_poli1">
              <option value="">----</option>
              @foreach($poli as $row)
              <option value="{{$row->id_poli}}">{{$row->nama_poli}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function edit(id,name,email,username,id_poli){
    $('#myForm').attr('action',"{{url('PERSONALIA/Poli/update')}}");
    $('#id1').val(id);
    $('#name1').val(name);
    $('#email1').val(email);  
    $('#username1').val(username);
    $('#id_poli1').val(id_poli);
  }
</script>

@endsection

</body>
</html>