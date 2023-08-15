@extends('admin.partials.index')

@push($title)
    active
@endpush

@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item active">Data Topsis</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <center>
                    <h4>Hasil Metode Topsis</h4>
                </center>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Guru</th>
                            <th>Hasil</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <center class="mt-3">
                <h4>Kriteria</h4>
            </center>
            <div class="col-lg-12">
                <table id="t_kriteria" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Guru</th>
                            <th>K1</th>
                            <th>K2</th>
                            <th>K3</th>
                            <th>K4</th>
                            <th>K5</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <center class="mt-3">
                <h4>Matrix Ternormalisai</h4>
            </center>
            <div class="col-lg-12">
                <table id="t_matrix" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Guru</th>
                            <th>K1</th>
                            <th>K2</th>
                            <th>K3</th>
                            <th>K4</th>
                            <th>K5</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>


    @include('admin.topsis.form')
@endsection
