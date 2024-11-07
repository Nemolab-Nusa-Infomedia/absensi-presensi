<header class="container-xxl">
    <div class="d-flex justify-content-between p-2">
        <img src="{{ url('assets/images/logo/hugostudio.png') }}" width="100px" alt="">
        <h3 class="text-white"><i class='bx bxs-bell'></i></h3>
    </div>
    <div class="d-flex justify-content-between px-1 py-3 px-md-4">
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/images/users/dummy-avatar.jpg') }}" class="rounded-circle img-fluid d-block d-sm-block" style="width: 50px;" alt="">
            <div class="row text-white text-start">
                <span class="fw-bold fs-5 fs-md-4">{{ Auth::user()->name }}</span>
                <span class="title-divisi">{{ Auth::user()->divisis->name }}</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <div class="row text-white text-end">
                <span id="time" class="fw-bold fs-5 fs-md-4"></span>
                <span id="date" class="date"></span>    
            </div>
        </div>
    </div>
</header>

<script>
    // Fungsi untuk mengatur waktu dan zona waktu
function setTimeAndDate() {
    const dateElement = document.getElementById('date');
    const timeElement = document.getElementById('time');

    const date = new Date();

    // Deteksi zona waktu
    const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;

    // Tentukan zona waktu di Indonesia
    let timeZoneAbbr = '';
    if (timeZone.includes('Asia/Jakarta')) {
        timeZoneAbbr = 'WIB';
    } else if (timeZone.includes('Asia/Makassar') || timeZone.includes('Asia/Ujung_Pandang')) {
        timeZoneAbbr = 'WITA';
    } else if (timeZone.includes('Asia/Jayapura')) {
        timeZoneAbbr = 'WIT';
    }

    // Format waktu dan tanggal
    const options = {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        timeZone: timeZone,
        hour12: false
    };
    const formattedTime = new Intl.DateTimeFormat('id-ID', options).format(date);

    const formattedDate = date.toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    // Set waktu dan tanggal ke elemen HTML
    timeElement.innerText = `${formattedTime} ${timeZoneAbbr}`;
    dateElement.innerText = formattedDate;
}

// Jalankan fungsi setiap detik untuk memperbarui waktu secara real-time
document.addEventListener('DOMContentLoaded', function () {
    setTimeAndDate(); // Panggil fungsi untuk pertama kali
    setInterval(setTimeAndDate, 1000); // Perbarui setiap 1 detik
});

</script>
