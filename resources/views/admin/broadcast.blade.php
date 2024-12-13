@extends('layouts.main')
@section('judul')
    Broadcast Promosi
@endsection
@section('container')
 <div class="card-header">
    
</div>
 <div class="card-body">
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
                <input type="number" id="startAge" name="awal" class="form-control" min="1" placeholder="Masukkan umur awal">
            </div>
            <div class="mb-3">
                <label for="endAge" class="form-label">Umur Akhir</label>
                <input type="number" id="endAge" name="akhir" class="form-control" min="1" placeholder="Masukkan umur akhir">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Kirim Pesan
        </button>
    </form>
</div>
@endsection

@section('scripttambahan')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const actionSelect = document.getElementById('action');
    const ageFilters = document.getElementById('ageFilters');
    const broadcastForm = document.getElementById('broadcastForm');

    // Tampilkan/Hide filter umur berdasarkan pilihan
    actionSelect.addEventListener('change', function () {
        if (this.value === 'byAge') {
            ageFilters.style.display = 'block';
        } else {
            ageFilters.style.display = 'none';
        }
    });

    // Kirim form
    broadcastForm.addEventListener('submit', async function (event) {
        event.preventDefault(); // Mencegah form reload

        const message = document.getElementById('message').value;
        const action = document.getElementById('action').value;
        const startAge = document.getElementById('startAge').value;
        const endAge = document.getElementById('endAge').value;

        let apiUrl = '';
        let payload = { message };
        
        // Tentukan URL API dan payload berdasarkan pilihan
        if (action === 'all') {
            apiUrl = 'http://127.0.0.1:8000/api/admin/send/all';
        } else if (action === 'byAge') {
            apiUrl = 'http://127.0.0.1:8000/api/admin/send/age';
            payload.awal = startAge;
            payload.akhir = endAge;
        //     console.log([payload.start_age, payload.end_age, payload]);
        // return;

        }

        // console.log(JSON.stringify(payload));
        // return;
        try {
            const token = localStorage.getItem('access_token'); // Ambil token dari localStorage
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`, // Sertakan token
                },
                body: JSON.stringify(payload),
            });

            const data = await response.json();

            if (response.ok) {
                alert('Pesan broadcast berhasil dikirim!');
                broadcastForm.reset(); // Reset form setelah berhasil
                ageFilters.style.display = 'none'; // Sembunyikan filter umur
            } else {
                alert(`Gagal mengirim pesan: ${data.message || 'Terjadi kesalahan'}`);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim pesan. Coba lagi.');
        }
    });
});
</script>
@endsection