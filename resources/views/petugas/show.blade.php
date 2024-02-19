@extends('template.master')

@section('title', 'Detail Petugas')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Detail Data Petugas</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" class="form-control" id="id" value="{{ $petugas->id_petugas }}" readonly>
        </div>
        <div class="form-group">
          <label for="Username">Username</label>
          <input type="text" class="form-control" id="Username" value="{{ $petugas->Username }}" readonly>
        </div>
        <div class="form-group">
          <label for="Password">Password</label>
          <input type="text" class="form-control" id="Password" value="{{ $petugas->Password }}" readonly>
        </div>
        <div class="form-group">
          <label for="Nama Petugas">Nama Petugas</label>
          <input type="text" class="form-control" id="Nama Petugas" value="{{ $petugas->Nama_Petugas }}" readonly>
        </div>
        <div class="form-group">
          <label for="Level">Level</label>
          <input type="text" class="form-control" id="Level" value="{{ $petugas->level }}" readonly>
        </div>
      </div>
      <div class="card-footer">
        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection