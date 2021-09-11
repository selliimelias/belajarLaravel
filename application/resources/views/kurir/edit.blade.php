@extends('template.master')
@section('tittle', 'Edit Kurir')

@section('content')
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <h2>halaman tambah kurir</h2> --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kurir</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href=" {{url('/kurir')}} ">kurir</a></li>
                        <li class="breadcrumb-item active">Edit Kurir</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit <strong>Kurir</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('/kurir/'. $kurir->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                    <div class="form-group">
                      <label for="kurir">Nama Kurir</label>
                      <input type="text" name="kurir" class="form-control @error('kurir') is-invalid @enderror" id="kurir" placeholder="Edit New kurir" value="{{$kurir->nama}}">
                      @error('kurir')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="ongkir">Ongkos Kirim</label>
                      <input type="text" name="ongkir"
                          class="form-control @error('ongkir') is-invalid @enderror" id="ongkir"
                          value="{{ old('ongkir') }}" placeholder="Enter New Price">
                      @error('ongkir')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
  
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    <!-- /.content-header -->
</section>
@endsection