<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('sneat-1.0.0/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Penilaian Guru || SD Inpres Hawai</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('sneat-1.0.0/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('sneat-1.0.0/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('sneat-1.0.0/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('sneat-1.0.0/assets/vendor/js/helpers.js') }}"></script>



    <!-- Libs -->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" /> --}}
    {{-- <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('sneat-1.0.0/assets/js/config.js') }}"></script>

</head>

<body>

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Layout Demo -->
            {{-- <div class="layout-demo-wrapper">
                <div class="layout-demo-info">
                    <h4>System Penilaian Kinerja Guru SMAN 1 BUMIRAYA</h4>
                </div>
            </div> --}}
            <!--/ Layout Demo -->
            <div class="row">

                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-center align-items-center">
                            <div class="app-brand d-flex justify-content-center align-items-center">
                                <img src="{{ asset('sneat-1.0.0/assets/img/logo_jayapura.png') }}" width="10%"
                                    alt="Brand Logo" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <h4 class="d-flex justify-content-center">System Penilaian Kinerja Guru SD Inpres Hawai</h4>

                            <form action="/store" method="POST" id="myForm">
                                @csrf
                                <div class="card-body">
                                    {{-- selec option --}}
                                    <div class="mb-3 ">
                                        <select id="largeSelect" class="form-select form-select-lg"
                                            aria-label="Default select example" name="guru_id" required>
                                            <option value="" disabled selected>--- Pilih Guru ---</option>
                                            @foreach ($dataGuru as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nama_guru'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div id="validationMessage" style="display: none; color: red;">
                                        Harap pilih semua opsi sebelum mengirimkan formulir.
                                    </div> --}}
                                    @foreach ($data as $item)
                                        <div class="mb-3 ">
                                            <div class="d-flex justify-content-center align-items-center "
                                                style="text-align:center;">
                                                <label for="exampleFormControlInput1" value="{{ $item['id'] }}"
                                                    name="kriteria_id" class="form-label fs-5 text-capitalize"
                                                    required>{{ $item['pertanyaan'] }}</label>
                                            </div>

                                            <br>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="form-check form-check-inline mb-3">
                                                    <input name="radio_{{ $item['id'] }}" class="form-check-input"
                                                        type="radio" value="5"
                                                        id="radio_{{ $item['id'] }}_option1" required>
                                                    <label class="form-check-label"
                                                        for="radio_{{ $item['id'] }}_option1">Sangat Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <input name="radio_{{ $item['id'] }}" class="form-check-input"
                                                        type="radio" value="4"
                                                        id="radio_{{ $item['id'] }}_option2">
                                                    <label class="form-check-label"
                                                        for="radio_{{ $item['id'] }}_option2">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <input name="radio_{{ $item['id'] }}" class="form-check-input"
                                                        type="radio" value="3"
                                                        id="radio_{{ $item['id'] }}_option3">
                                                    <label class="form-check-label"
                                                        for="radio_{{ $item['id'] }}_option3">Cukup</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <input name="radio_{{ $item['id'] }}" class="form-check-input"
                                                        type="radio" value="2"
                                                        id="radio_{{ $item['id'] }}_option4">
                                                    <label class="form-check-label"
                                                        for="radio_{{ $item['id'] }}_option4">Kurang</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-3">
                                                    <input name="radio_{{ $item['id'] }}" class="form-check-input"
                                                        type="radio" value="1"
                                                        id="radio_{{ $item['id'] }}_option5">
                                                    <label class="form-check-label"
                                                        for="radio_{{ $item['id'] }}_option5">Sangat Kurang</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ route('dashboard') }}"><button type="button"
                                        class="btn btn-danger">Dashboard</button></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->




        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('sneat-1.0.0/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('sneat-1.0.0/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('sneat-1.0.0/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('sneat-1.0.0/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('sneat-1.0.0/assets/vendor/js/menu.js') }}"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{ asset('sneat-1.0.0/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('sneat-1.0.0/assets/js/main.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('sneat-1.0.0/assets/js/dashboards-analytics.js') }}"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        {{-- data tables --}}

        {{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



        @stack('scripts')

        {{-- <script>
            document.getElementById('myForm').addEventListener('submit', function(event) {
                var radioGroups = document.querySelectorAll('[name^="radio_"]');
                var isAnyGroupIncomplete = false;

                radioGroups.forEach(function(group) {
                    if (!isChecked(group)) {
                        isAnyGroupIncomplete = true;
                    }
                });

                if (isAnyGroupIncomplete) {
                    event.preventDefault();
                    // document.getElementById('validationMessage').style.display = 'block';
                }
            });

            function isChecked(group) {
                var radios = group.querySelectorAll('input[type="radio"]');
                return Array.from(radios).some(function(radio) {
                    return radio.checked;
                });
            }
        </script> --}}

</body>

</html>
