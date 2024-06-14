{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script> --}}
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://billspayeadmin.in/">Admin.in</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <!-- <b>Version</b> 3.2.0 -->
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>

<script src="{{ asset('dist/js/ckeditor/ckeditor.js') }}"></script>

<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".autoCloseAlert").alert('close');
        }, 3000);


    });
</script>
<script>
    $(function() {

        $('#addSkill').click(function() {
            $('#skillDiv').append(
                "<div class='form-group row removeDiv'><input type='hidden' name='skill_id[]'' value='0'><div class='col-sm-6'><input type='text' class='form-control' name='skill[]'' placeholder='Skill Name'></div><div class='col-sm-3.5'><input type='number' class='form-control' name='percentage[]' placeholder='Percentage'></div><div class='col-sm-2'><button type='button' class='btn btn-danger remove-btn'>-</button></div></div>"
            );
        });

        $('#skillDiv').on('click', '.remove-btn', function() {
            $(this).closest(".removeDiv").remove();

        })

        // JS Validations

        $('#btn-service').click(function() {
            $('#Services_form').submit();
            return false;
        });

        $('#Services_form').validate({
            submitHandler: function() {
                saveService();
            },
            rules: {
                title: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
                description: {
                    required: true,
                    minlength: 5,
                    maxlength: 1000
                },
                // icon: {
                //     required: true
                // }
            },

            messages: {
                title: {
                    required: "Please enter a title",
                    minlength: "Title must be at least 3 charactrs long",
                    maxlength: "Title must be less than 100 characters long"
                },
                description: {
                    required: "Please enter a description",
                    minlength: "Description must be at least 5 charactrs long",
                    maxlength: "Description must be less than 1000 characters long"
                },
                // icon: {
                //     required: "Please choose a image"
                // }
            },

            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        function saveService() {
            var formData = new FormData($('#Services_form')[0]);

            $.ajax({
                type: "POST",
                url: "{{ route('services') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        LoadServices();
                        $('#success-msg').html('<div class="alert alert-success autoCloseAlert">' +
                            response.success + '</div>');
                        $('#serviceModal').modal('hide');
                        window.setTimeout(function() {
                            $(".autoCloseAlert").alert('close');
                        }, 3000);
                    }
                },

            });
        }

        LoadServices();

        function LoadServices() {
            $.ajax({
                type: "GET",
                url: "{{ route('services') }}",
                success: function(response) {
                    var service = response.services;
                    $('#service-body').html('');
                    if (service.length > 0) {
                        for (let index = 0; index < service.length; index++) {
                            $('#service-body').append('<tr><td>' + (index + 1) + '</td><td>' +
                                service[index].title + '</td><td>' + service[index]
                                .description + '</td><td>' + service[index].icon_name +
                                '</td><td><a href="javascript:void(0)" class="btn btn-info btn-edit" data-edit-id=' +
                                service[index].id +
                                ' data-toggle="modal1" data-target="#serviceModal1"><i class="fas fa-edit"></i></a><a href="javascript:void(0)" class="btn btn-danger ml-2 btn-delete" data-service-title='+ service[index].title +' data-delete-id=' +
                                service[index].id +
                                '><i class="fas fa-trash"></i></a></td></tr>');
                        }
                    } else {
                        $('#service-body').append('<tr><td colspan="5">No data found!</td></tr>');
                    }

                    // console.log(response.services)
                }
            });
        }

        $('#add-service').click(function() {
            $('#serviceModal').modal('show');
            $('#exampleModalLabel').text('Add Service');
            $('#btn-service').text('Save');
            $('#icon').attr('required', true);
            $('#image-container').html('');
            $('#service_id').val(0);
            $('#Services_form')[0].reset(); // This will reset the form
        });

        $('#service-body').on('click', '.btn-edit', function() {

            $('#serviceModal').modal('show');

            $('#exampleModalLabel').text('Update Service');
            $('#btn-service').text('Update');

            var id = $(this).attr('data-edit-id');
            $.ajax({
                type: "GET",
                url: "{{ route('serviceData') }}",
                data: {
                    serviceId: id
                },
                success: function(response) {
                    var data = response.service;
                    $('#service_id').val(data.id);
                    $('#title').val(data.title);
                    $('#description').val(data.description);
                    var path = "{{ asset('storage/uploads') }}/" + data.icon_name;
                    $('#image-container').html('<img src="' + path +
                        '" style="width:100%; height:10em;">');

                }
            });
        });

        $('.btn-close').click(function() {
            $('#exampleModalLabel').text('Add Service');
            $('#btn-service').text('Save');
            $('#image-container').html('');
            $('#Services_form')[0].reset(); // This will reset the form

        });
        let deleteId;
        $('#service-body').on('click', '.btn-delete', function() {
            deleteId = $(this).attr('data-delete-id');
            let serviceTitle = $(this).attr('data-service-title');
            $('#deleteModal').modal('show');
            $('#service-title').text(serviceTitle);
        });

        $('#confirmDeleteButton').click(function() {
            $.ajax({
                type: "GET",
                url: "{{ route('delete-service') }}",
                data: {
                    serviceId: deleteId
                },
                success: function(response) {
                    if (response.success) {
                        LoadServices();
                        $('#success-msg').html(
                            '<div class="alert alert-success autoCloseAlert">' +
                            response.success + '</div>');
                        $('#deleteModal').modal('hide');
                        window.setTimeout(function() {
                            $(".autoCloseAlert").alert('close');
                        }, 3000);
                    }
                }
            });
        });

    });



    function deleteSkill(id) {
        $.ajax({
            url: "{{ route('deleteSkill') }}",
            type: "GET",
            data: {
                skillId: id
            },
            success: function(res) {
                location.reload();
            }
        });
    }
</script>

<script>
    $(function() {
        CKEDITOR.replace('long_text');
    });
</script>
