
@section('content')
<div class="container">
    <h1>Edit Kontak Kami</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('kontak.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $kontak->email }}" required>
        </div>

        <div class="form-group">
            <label for="no_hp">Nomor Handphone</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $kontak->no_hp }}" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $kontak->lokasi }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
