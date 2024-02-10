@extends('template.master')

@push('css')
  <link rel="stylesheet" href="{{ asset('sbadmin2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sbadmin2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sbadmin2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('title', 'Data SPP')

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
        <a href="{{ route('spp.create') }}" class="btn btn-sm btn-outline-primary">
          <i class="fa fa-plus"> Tambah SPP</i>
        </a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>ID SPP</th>
              <th>Tahun</th>
              <th>Nominal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($spps as $key => $spp)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $spp->id_spp }}</td>
                <td>{{ $spp->tahun }}</td>
                <td>{{ $spp->nominal }}</td>
                <td>
                    <a href="{{ route('spp.show', $spp->id_spp) }}" class="btn btn-sm btn-info">
                        Detail
                    </a>
                    <form action="{{ route('spp.destroy', $spp->id_spp) }}" method="post">
                    <a href="{{ route('spp.edit', $spp->id_spp) }}" class="btn btn-sm btn-warning">
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