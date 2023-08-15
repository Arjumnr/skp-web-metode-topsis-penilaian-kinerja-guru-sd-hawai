@push('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('responden') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'guru_id',
                        name: 'guru_id'
                    },
                    {
                        data: 'kriteria_id',
                        name: 'kriteria_id'
                    },
                    {
                        data: 'bobot',
                        name: 'bobot'
                    },
                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     orderable: false,
                    //     searchable: false
                    // },
                ]
            });
            // $('#tes').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: "{{ route('responden') }}",
            //     columns: [{
            //             data: 'DT_RowIndex',
            //             name: 'DT_RowIndex'
            //         },
            //         {
            //             data: 'guru_id',
            //             name: 'guru_id'
            //         },
            //         {
            //             data: 'kriteria_id',
            //             name: 'kriteria_id'
            //         },
            //         {
            //             data: 'bobot',
            //             name: 'bobot'
            //         },
            //         {
            //             data: 'action',
            //             name: 'action',
            //             orderable: false,
            //             searchable: false
            //         },
            //     ]
            // });







        });
    </script>
@endpush
