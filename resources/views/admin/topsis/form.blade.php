@push('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('topsis') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_guru',
                        name: 'nama_guru'
                    },
                    {
                        data: 'nilaiPreferensif',
                        name: 'nilaiPreferensif'
                    },
                    {
                        data: 'ket',
                        name: 'ket'
                    },
                    {
                        data: 'rank',
                        name: 'rank'
                    },



                    // {
                    //     orderable: false,
                    //     searchable: false
                    // },
                ]
            });

            $('#t_kriteria').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('topsis') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_guru',
                        name: 'nama_guru'
                    },
                    {
                        data: 'totK1',
                        name: 'totK1'

                    },
                    {
                        data: 'totK2',
                        name: 'totK2'
                    },
                    {
                        data: 'totK3',
                        name: 'totK3'
                    },
                    {
                        data: 'totK4',
                        name: 'totK4'
                    },
                    {
                        data: 'totK5',
                        name: 'totK5'
                    },

                ]
            });
            $('#t_matrix').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('topsis') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_guru',
                        name: 'nama_guru'
                    },
                    {
                        data: 'matriks_ternormalisasiK1',
                        name: 'matriks_ternormalisasiK1'
                    },
                    {
                        data: 'matriks_ternormalisasiK2',
                        name: 'matriks_ternormalisasiK2'
                    },
                    {
                        data: 'matriks_ternormalisasiK3',
                        name: 'matriks_ternormalisasiK3'
                    },
                    {
                        data: 'matriks_ternormalisasiK4',
                        name: 'matriks_ternormalisasiK4'
                    },
                    {
                        data: 'matriks_ternormalisasiK5',
                        name: 'matriks_ternormalisasiK5'
                    }


                ]
            });







        });
    </script>
@endpush
