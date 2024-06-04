@extends('backend.layout.default')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">About</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">About</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">About</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" id="aboutform">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name <em
                                            class="star">*</em></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email <em
                                            class="star">*</em></label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Name <em
                                            class="star">*</em></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="profile" name="profile"
                                            placeholder="Profile Name">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number <em
                                            class="star">*</em></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Content</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="long_text" name="long_text" row="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="profile_image" name="profile_image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="skill" name="skill[]"
                                            placeholder="Skill Name">

                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="percentage" name="percentage[]"
                                            placeholder="Percentage">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-success addSkill">+</button>
                                    </div>
                                </div>
                                <div class="form-group row skillDiv">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="skill" name="skill[]"
                                            placeholder="Skill Name">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="percentage" name="percentage[]"
                                            placeholder="Percentage">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-danger removeSkill">-</button>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" id="btnCancel" data-dismiss="modal"><a
                                        href=>Cancel</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
