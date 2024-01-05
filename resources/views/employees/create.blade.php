@extends("layouts.main")

@section("container")
<!-- Main content -->
<section class="content">
    <h3>Add Employee</h3>
    <div class="container-fluid">
        <!-- Form -->
        <form method="POST" action="{{ url('/employees/create') }}">
            @csrf
            <div class="form-group">
                <label for="nomor_induk">Nomor Induk</label>
                <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" placeholder="Enter Nomor Induk">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
            </div>
            <div class="form-group">
                <label for="tanggal_bergabung">Tanggal Bergabung</label>
                <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div><!--/. container-fluid -->
</section>
@endsection