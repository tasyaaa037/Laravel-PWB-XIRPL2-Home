@extends('template.master')

@push('css')
  <link rel="stylesheet" href="{{ asset('sbadmin2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sbadmin2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sbadmin2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('title', 'Data Petugas')

@section('content')
@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>  
    <strong>{{ $message }}</strong> 
  </div>
@endif

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('petugas.create') }}" class="btn btn-sm btn-outline-primary">
          <i class="fa fa-plus"> Tambah Data Petugas</i>
        </a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Petugas</th>
              <th>Username</th>
              <th>Password</th>
              <th>Nama Petugas</th>
              <th>Level</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($petugass as $key => $petugas)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $petugas->id_petugas }}</td>
                <td>{{ $petugas->username }}</td>
                <td>{{ $petugas->password }}</td>
                <td>{{ $petugas->nama_petugas}}</td>
                <td>{{ $petugas->level}}</td>
                <td>
                    <a href="{{ route('petugas.show', $petugas->id_petugas) }}" class="btn btn-sm btn-info">
                        Detail
                    </a>
                    <form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="post">
                    <a href="{{ route('petugas.edit', $petugas->id_petugas) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>  
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger my-1">Delete</button>
                  </form>
                </td>              
              </tr>
            @empty
              <tr>
                <td colspan="5">Data Masih Kosong</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
@endsection

@push('js')
  <script src="{{ asset('sbadmin2/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('sbadmin2/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

  <script>
    $(function () {
      $("#table").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush