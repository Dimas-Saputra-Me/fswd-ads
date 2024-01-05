@extends("layouts.main")

@section("container")
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Employee</span>
                        <span class="info-box-number">{{ $employees_count }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-calendar"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Data Cuti</span>
                        <span class="info-box-number">{{ $cutis_count }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-light elevation-1"><i class="fas fa-ban"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">To Be Displayed</span>
                        <span class="info-box-number">---</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-light elevation-1"><i class="fas fa-ban"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">To Be Displayed</span>
                        <span class="info-box-number">---</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Employee</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nomor Induk</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tanggal Bergabung</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->nomor_induk }}</td>
                                        <td>{{ $employee->nama }}</td>
                                        <td>{{ $employee->alamat }}</td>
                                        <td>{{ $employee->tanggal_lahir }}</td>
                                        <td>{{ $employee->tanggal_bergabung }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{ url('/employees/edit/' . $employee->nomor_induk) }}" class="btn btn-primary edit-btn mr-3"><i class="fas fa-edit"></i></a>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Use a form to send the DELETE request -->
                                                    <form action="/employees/delete/{{ $employee->nomor_induk }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="./employees/create" class="btn btn-sm btn-info float-left">Add Employee</a>
                        <a href="./employees" class="btn btn-sm btn-secondary float-right">View All Employees</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Cuti</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach($cutis as $cuti)
                            <li class="item">
                                <div class="product-img">
                                    <img src="https://avatars.githubusercontent.com/u/62497214?v=4" alt="Product Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">
                                        {{$cuti->employee->nama}} - {{$cuti->employees_nomor_induk}}
                                        <span class="badge badge-primary float-right">{{$cuti->lama_cuti}} hari</span>
                                    </a>
                                    <span class="product-description">
                                        Tanggal Cuti: {{$cuti->tanggal_cuti}}</br>
                                        Keterangan: {{$cuti->keterangan}}
                                    </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="./cutis/create" class="btn btn-sm btn-info float-left">Add New Cuti</a>
                        <a href="./cutis" class="btn btn-sm btn-secondary float-right">View All Cuti</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>
@endsection