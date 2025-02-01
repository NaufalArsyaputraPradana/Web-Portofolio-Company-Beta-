@extends('layouts.editor')
@section('title')
    Portofolio
@endsection

<!--
    Bagian Konten Halaman
-->
@section('content')
    <div class="container-fluid">

        <!--
            Bagian Judul dan Form Pencarian
        -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Portofolio</h1>

            <form action="" id="form_cari" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari client atau kategori" name="cari" id="cari">
                    <div class="input-group-append">
                        <button type="button" id="add_new"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add</button>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" type="button"
                            id="btn-cari">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <!--
            Bagian Tabel Data Portofolio
        -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Portofolio</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Tportofolio" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--
        Form Modal untuk Menambahkan Data Portofolio
    -->
    <form id="addForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new Portofolio</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-grop row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Client</label>
                                    <input type="text" id="client" name="client" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <input type="text" id="category" name="category" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <div id="imagev" class="my-2"></div>
                            <input type="file" id="file" name="file" class="form-control"
                                onchange="ViewImage(this);">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="button" id="proses_add" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--
        Form Modal untuk Mengupdate Data Portofolio
    -->
    <form id="updateForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
            data-keyboard="false">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Portofolio</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-grop row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Client</label>
                                    <input type="hidden" id="id_update" name="id" class="form-control">
                                    <input type="text" id="client_update" name="client" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <input type="text" id="category_update" name="category" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <div id="imagev_update" class="my-2"></div>
                            <input type="file" id="file_update" name="file" class="form-control"
                                onchange="ViewImageUp(this);">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="button" id="proses_update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

<!--
    Bagian Script
-->
@section('script')
    <script>
        // 
        // Fungsi untuk Menampilkan Preview Gambar
        // 
        function ViewImage(input) {
            let imagev = $('#imagev');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagev.empty().append('<img id="imgv" class="img-fluid" src="#">');
                    $('#imgv').attr('src', e.target.result).height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // 
        // Fungsi untuk Menampilkan Preview Gambar pada Form Update
        // 
        function ViewImageUp(input) {
            let imagev = $('#imagev_update');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagev.empty().append('<img id="imgv" class="img-fluid" src="#">');
                    $('#imgv').attr('src', e.target.result).height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // 
        // Inisialisasi DataTable dan Event Handling
        // 
        $('document').ready(function(e) {
            var Tportofolio = $('#Tportofolio').DataTable({
                "responsive": true,
                'searching': false,
                "processing": true,
                "serverSide": true,
                "pagingType": "full_numbers",
                "paging": true,
                "ajax": {
                    "url": "{{ route('editor.portofolio.data') }}",
                    "data": function(parm) {
                        parm.search = function() {
                            return $('#cari').val()
                        }
                    },

                },
                "columns": [{
                        "data": "client",
                        "orderable": false
                    },
                    {
                        "data": "category",
                        "orderable": false
                    },
                    {
                        "data": "image",
                        "orderable": false,
                        render: function(data, type, row) {
                            let img_path = row.image;
                            let img_view = '<img src="{{ asset('storage') }}/' + img_path +
                                '" class="rounded float-left" width="100">';
                            return img_view;
                        }
                    },
                    {
                        "data": "id",
                        "orderable": false,
                        render: function(data, type, row) {
                            var idData = row.id;
                            let btn =
                                '<div class="btn-group" role="group" aria-label="Basic example">';
                            btn +=
                                '<button type="button" class="btn btn-warning btnUpdate">Update</button>';
                            btn +=
                                '<button type="button" class="btn btn-danger btnDelete">Delete</button>';
                            btn += '</div>';
                            return btn;
                        }
                    },
                ]
            });

            // 
            // Fungsi untuk Menggambar Ulang Tabel
            // 
            function redraw() {
                Tportofolio.draw();
            }

            // 
            // Event untuk Menampilkan Modal Tambah Data
            // 
            $("#add_new").click(function() {
                $("#addModal").modal("show");
            });

            // 
            // Event untuk Menyimpan Data Baru
            // 
            $("#proses_add").click(function() {
                var postData = new FormData($("#addForm")[0]);
                $.ajax({
                    url: "{{ URL::route('editor.portofolio.store') }}",
                    data: postData,
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.loading-clock').css('display', 'flex');
                    },
                    success: function(data) {
                        if (data.success == 1) {
                            // Reset form
                            $('#addForm')[0].reset();
                            // Remove image preview
                            $("#addModal").modal("hide");
                            toastr_success(data.messages);
                            redraw();
                        } else {
                            toastr_error(data.messages);
                        }
                    },
                    complete: function() {
                        $('.loading-clock').css('display', 'none');
                    },
                });
            });

            // 
            // Event untuk Mencari Data
            // 
            $("#btn-cari").click(function() {
                let search = $("#cari").val();
                Tportofolio.draw();
            });

            // 
            // Event untuk Menampilkan Modal Update Data
            // 
            $("#Tportofolio tbody").on('click', '.btnUpdate', function() {
                let data = Tportofolio.row($(this).parents('tr')).data();
                let idData = data.id;
                $.ajax({
                    url: "{{ URL::route('editor.portofolio.detail') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': idData
                    },
                    dataType: "JSON",
                    cache: false,
                    beforeSend: function() {
                        $('.loading-clock').css('display', 'flex');
                    },
                    success: function(data) {
                        if (data.success == 1) {
                            let id = data.data.id;
                            let client = data.data.client;
                            let category = data.data.category;
                            let image = data.data.image;
                            $("#updateForm #imagev_update").empty().append(
                                '<img id="img" class="img-fluid" src="#">');
                            $('#img').attr('src', "{{ asset('storage') }}/" + image).height(
                            200);
                            $("#id_update").val(id);
                            $("#client_update").val(client);
                            $("#category_update").val(category);
                            $('#file_update').val(null);

                        } else {
                            toastr_error(data.messages);
                        }
                    },
                    complete: function() {
                        $('.loading-clock').css('display', 'none');
                    },
                })
                $("#updateModal").modal("show");
            });

            // 
            // Event untuk Mengupdate Data
            // 
            $("#proses_update").click(function() {
                var postData = new FormData($("#updateForm")[0]);
                $.ajax({
                    url: "{{ URL::route('editor.portofolio.update') }}",
                    data: postData,
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.loading-clock').css('display', 'flex');
                    },
                    success: function(data) {
                        if (data.success == 1) {
                            $("#updateModal").modal("hide");
                            toastr_success(data.messages);
                            redraw();
                        } else {
                            toastr_error(data.messages);
                        }
                    },
                    complete: function() {
                        $('.loading-clock').css('display', 'none');
                    },
                });
            });

            // 
            // Event untuk Menghapus Data
            // 
            $("#Tportofolio tbody").on('click', '.btnDelete', function() {
                let data = Tportofolio.row($(this).parents('tr')).data();
                let idData = data.id;
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ URL::route('editor.portofolio.delete') }}",
                            type: "DELETE",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': idData
                            },
                            dataType: "JSON",
                            cache: false,
                            beforeSend: function() {
                                $('.loading-clock').css('display', 'flex');
                            },
                            success: function(data) {
                                if (data.success == 1) {
                                    toastr_success(data.messages);
                                    redraw();
                                } else {
                                    toastr_error(data.messages);
                                }
                            },
                            complete: function() {
                                $('.loading-clock').css('display', 'none');
                            },
                        });
                    }
                });
            });

            // 
            // Fungsi untuk Menampilkan Notifikasi Sukses
            // 
            function toastr_success(msg) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: msg
                });
            }

            // 
            // Fungsi untuk Menampilkan Notifikasi Error
            // 
            function toastr_error(msg) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "error",
                    title: msg
                });
            }
        });
    </script>
@endsection