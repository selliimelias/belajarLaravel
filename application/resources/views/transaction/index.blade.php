{{-- @dd($kategori) --}}

@extends('template.master')
@section('tittle', 'Transaction')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaction</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaction Name</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row mt-2">
                <div class="col">
                    @if (session('status'))

                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title"> Data Transaction</h2>
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Struk</th>
                                            <th>Invoice</th>
                                            <th>Customer</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Total</th>
                                            <th>Status Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>{{ $loop->photo->nama_photo }}</td> --}}
                                                
                                                @if ($item->struk == null)
                                                <td><img src="{{ asset('dist/img/unpaid.png') }}"
                                                    width="50" alt=""></td>
                                                @else
                                                <td><img src="{{ asset('dist/img/' . $item->struk) }}"
                                                        width="50" alt=""></td>
                                                @endif

                                                <td>{{ $item->no_invoice }}</td>
                                                <td>{{ $item->user->nama }}</td>
                                                <td>{{ $item->bank->nama_bank }}</td>
                                                <td>{{ $item->total + ($item->kurir->ongkir) }}</td>
                                                <td><a href="{{ url('/paid/'. $item->id) }}">{{ $item->status_transaction}}
                                                </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
