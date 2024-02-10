@extends('template.master')

@section('title', 'Edit Data SPP')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data SPP</h3>
      </div>
      <form action="{{ route('spp.update', $spp->id_spp) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="tahun">Tahun</label>
            <input name="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" placeholder="Masukkan Tahun" value="{{ $spp->tahun }}">
            @error('tahun')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="nominal">Nominal</label>
            <input name="nominal" type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal" placeholder="Masukkan Nominal" value="{{ $spp->nominal }}">
            @error('nominal')
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