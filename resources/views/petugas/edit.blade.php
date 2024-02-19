@extends('template.master')

@section('title', 'Edit Data Petugas')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Petugas</h3>
      </div>
      <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="Username">Username</label>
            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="Username" placeholder="Masukkan Username" value="{{ $petugas->username }}">
            @error('username')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input name="password" type="text" class="form-control @error('password') is-invalid @enderror" id="Password" placeholder="Masukkan Password" value="{{ $petugas->password }}">
            @error('password')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="Nama Petugas">Nama Petugas</label>
            <input name="nama_petugas" type="text" class="form-control @error('nama_petugas') is-invalid @enderror" id="Nama Petugas" placeholder="Masukkan Nama Petugas" value="{{ $petugas->nama_petugas }}">
            @error('nama_petugas')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="level">Level</label>
            <select name="level" class="form-control @error('level') is-invalid @enderror" id="level">
                <option value="admin" {{ $petugas->level == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="petugas" {{ $petugas->level == 'petugas' ? 'selected' : '' }}>Petugas</option>
            </select>
            @error('level')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>        
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
