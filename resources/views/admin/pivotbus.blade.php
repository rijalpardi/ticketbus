@extends('layouts.template')

@section('title')
Manajemen Bus
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Managemen Bus</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Managemen Bus</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Tambah Pivot</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>

          </div>
          <!-- /.card-header -->
          <!-- form start -->

          <div class="card-body">
            <form role="form" name="{{route('store.pivot')}}" action="post">
              @csrf
              <div class="row">
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label for="inputStatus">Tipe Bus</label>
                    <select class="form-control custom-select">
                      <option selected disabled>Pilih tipe</option>
                      <option>Bintang Prima A10</option>
                      <option>Bintang Prima M70</option>
                      <option>Bintang Prima C30</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="inputStatus">Nama Bus</label>
                    <select class="form-control custom-select">
                      <option selected disabled>Pilih tipe</option>
                      <option>Sleeper</option>
                      <option>Seatbelt</option>
                      <option>Comfortable</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="inputStatus">Route</label>
                    <select class="form-control custom-select">
                      <option selected disabled>Pilih tipe</option>
                      <option>Makassar - Bulukumba</option>
                      <option>Bulukumba - Selayar</option>
                      <option>Selayar - Maros</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputStatus">Harga Rp. Perkursi</label>
                <input type="text" class="form-control" name="harga">
              </div>

              <div class="form-group">
                <button type="reset" class="btn btn-secondary float-left"><i class="nav-icon fas fa-sync-alt"></i> Reset</button>
                <button type="submit" class="btn btn-info float-right"><i class="nav-icon fas fa-plus"></i> Tambah</button>
              </div>

            </form>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <!-- end pivot form -->
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

@endsection

@section('js')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function() {
    $("#example4").DataTable();
  });
</script>
@endsection