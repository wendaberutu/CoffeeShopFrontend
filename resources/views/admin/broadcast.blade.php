@extends('layouts.main')
@section('judul')
    Broadcast Promosi
@endsection
@section('container')
 
 
    <form id="broadcastForm" action="#" method="POST">
        @csrf
        <div class="mb-3">
            <label for="message" class="form-label">Pesan</label>
            <textarea id="message" name="message" class="form-control" rows="3" placeholder="Tulis pesan broadcast..." required></textarea>
        </div>
        <div class="mb-3">
            <label for="action" class="form-label">Target Penerima</label>
            <select id="action" name="action" class="form-select" required>
                <option value="all">Semua</option>
                <option value="byAge">Berdasarkan Umur</option>
            </select>
        </div>
        <!-- Input umur awal dan akhir -->
        <div id="ageFilters" style="display: none;">
            <div class="mb-3">
                <label for="startAge" class="form-label">Umur Awal</label>
                <input type="number" id="startAge" name="start_age" class="form-control" min="1" placeholder="Masukkan umur awal">
            </div>
            <div class="mb-3">
                <label for="endAge" class="form-label">Umur Akhir</label>
                <input type="number" id="endAge" name="end_age" class="form-control" min="1" placeholder="Masukkan umur akhir">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Kirim Pesan
        </button>
    </form>
{{-- </div> --}}
@endsection

@section('scripttambahan')
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const actionSelect = document.getElementById('action');
    const ageFilters = document.getElementById('ageFilters');

    actionSelect.addEventListener('change', function () {
        if (this.value === 'byAge') {
            ageFilters.style.display = 'block';
        } else {
            ageFilters.style.display = 'none';
        }
    });
});

</script>
@endsection