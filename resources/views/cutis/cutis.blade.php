@extends("layouts.main")

@section("container")
<!-- Alert if cutis successfully added -->
@if(session('create'))
<div class="alert alert-success">
    {{ session('create') }}
</div>
@endif

<!-- Alert if cutis successfully deleted -->
@if(session('delete'))
<div class="alert alert-danger">
    {{ session('delete') }}
</div>
@endif

<!-- Alert if cutis successfully edited -->
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
            <!-- PRODUCT LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Cuti</h3>

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
                                    <th>Tanggal Cuti</th>
                                    <th>Lama Cuti</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cutis as $cuti)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cuti->employees_nomor_induk }}</td>
                                    <td>{{ $cuti->employee->nama }}</td>
                                    <td>{{ $cuti->tanggal_cuti }}</td>
                                    <td>{{ $cuti->lama_cuti }}</td>
                                    <td>{{ $cuti->keterangan }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{ url('/cutis/edit/' . $cuti->id) }}" class="btn btn-primary edit-btn mr-3"><i class="fas fa-edit"></i></a>
                                            </div>
                                            <div class="col-6">
                                                <!-- Use a form to send the DELETE request -->
                                                <form action="/cutis/delete/{{ $cuti->id }}" method="POST" style="display: inline;">
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
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="/cutis/create" class="btn btn-sm btn-info float-left">Add New Cuti</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>
@endsection