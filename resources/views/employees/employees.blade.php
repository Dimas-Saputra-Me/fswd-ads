@extends("layouts.main")

@section("container")
<!-- Alert if employee successfully added -->
@if(session('create'))
<div class="alert alert-success">
    {{ session('create') }}
</div>
@endif

<!-- Alert if employee successfully deleted -->
@if(session('delete'))
<div class="alert alert-danger">
    {{ session('delete') }}
</div>
@endif

<!-- Alert if employee successfully edited -->
@if(session('edit'))
<div class="alert alert-warning">
    {{ session('edit') }}
</div>
@endif

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Employees</h3>

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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Induk</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tanggal Bergabung</th>
                                    <th>Sisa Cuti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                <!-- Hitung sisa kuota cuti -->
                                @php
                                    $currentYear = date('Y');
                                    $sisa_cuti = 12;

                                    foreach($employee->cuti as $cuti){
                                        $tahun_cuti = date("Y", strtotime($cuti->tanggal_cuti));
                                        if($tahun_cuti == $currentYear) $sisa_cuti -= $cuti->lama_cuti;
                                    }
                                @endphp

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->nomor_induk }}</td>
                                    <td>{{ $employee->nama }}</td>
                                    <td>{{ $employee->alamat }}</td>
                                    <td>{{ $employee->tanggal_lahir }}</td>
                                    <td>{{ $employee->tanggal_bergabung }}</td>
                                    <td>{{ $sisa_cuti }}</td>
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
                    <a href="/employees/create" class="btn btn-sm btn-info float-left">Add Employee</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>
@endsection