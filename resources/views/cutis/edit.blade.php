@extends("layouts.main")

@section("container")
<!-- Main content -->
<section class="content">
    <h3>Edit Cuti</h3>
    <div class="container-fluid">
        <!-- Form -->
        <form method="post" action="{{ url('/cutis/edit/') }}">
            @csrf
            <div class="form-group">
                <label for="nomor_induk">Nomor Induk</label>
                <input type="text" name="nomor_induk" class="form-control" value="{{ $cuti->employees_nomor_induk }}" required readonly>
            </div>

            <div class="form-group">
                <label for="tanggal_cuti">Tanggal Cuti</label>
                <input type="date" name="tanggal_cuti" class="form-control" value="{{ $cuti->tanggal_cuti }}" required>
            </div>

            <div class="form-group">
                <label for="lama_cuti">Lama Cuti (Hari)</label>
                <input type="number" name="lama_cuti" class="form-control" value="{{ $cuti->lama_cuti }}" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" class="form-control" required>{{ $cuti->keterangan }}</textarea>
            </div>

            <!-- Add a hidden input for the cuti ID -->
            <input type="hidden" name="id" value="{{ $cuti->id }}">

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div><!--/. container-fluid -->
</section>
@endsection
