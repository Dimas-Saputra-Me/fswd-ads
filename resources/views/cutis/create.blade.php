@extends("layouts.main")

@section("container")
<!-- Main content -->
<section class="content">
    <h3>Add Cuti</h3>
    <div class="container-fluid">
        <!-- Form -->
        <form method="post" action="{{ url('/cutis/create') }}">
            @csrf
            <div class="form-group">
                <label for="employees_nomor_induk">Nomor Induk</label>
                <input type="text" name="employees_nomor_induk" class="form-control" required>
                @error('employees_nomor_induk')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_cuti">Tanggal Cuti</label>
                <input type="date" name="tanggal_cuti" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lama_cuti">Lama Cuti (Hari)</label>
                <input type="number" name="lama_cuti" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 

    </div><!--/. container-fluid -->
</section>
@endsection