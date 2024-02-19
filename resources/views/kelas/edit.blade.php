@extends('template.master')

@section('title', 'Edit Data Kelas')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Kelas</h3>
      </div>
      <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="id_kelas">ID Kelas</label>
            <input name="id_kelas" type="text" class="form-control" id="id_kelas" value="{{ $kelas->id_kelas }}" readonly>
          </div>
          <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input name="nama_kelas" type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" value="{{ $kelas->nama_kelas }}" placeholder="Masukkan Nama Kelas">
            @error('nama_kelas')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
            <input name="kompetensi_keahlian" type="text" class="form-control @error('kompetensi_keahlian') is-invalid @enderror" id="kompetensi_keahlian" value="{{ $kelas->kompetensi_keahlian }}" placeholder="Masukkan Kompetensi Keahlian">
            @error('kompetensi_keahlian')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="card-footer">
          <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection