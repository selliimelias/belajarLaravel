@extends('template.master')
@section('tittle', 'Edit Bank')

@section('content')
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <h2>halaman tambah bank</h2> --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bank</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href=" {{ url('/bank') }} ">Bank</a></li>
                        <li class="breadcrumb-item active">Edit Bank</li>
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
                            <h3 class="card-title">Edit <strong> Bank</strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('/bank/' . $bank->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="rek">Nomor Rekening</label>
                                    <input type="text" name="rek"
                                        class="form-control @error('rek') is-invalid @enderror" id="rek"
                                        value="{{ old('rek') }}" placeholder="Enter New Rekening">
                                    @error('rek')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="uang">Bank Name</label>
                                    <input type="text" name="uang"
                                        class="form-control @error('uang') is-invalid @enderror" id="uang"
                                        placeholder="Edit New bank" value="{{ $bank->nama }}">
                                    @error('uang')
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
