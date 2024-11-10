<header class="text-white text-center py-4" style="background-color: #007bff;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo d-flex align-items-center">
                <i class="fas fa-home fa-lg mr-2"></i>
                <img src="{{ asset('assets/images/logo/hugostudio.png') }}" width="70px" alt="">
            </div>
            <div class="ms-auto">
                <div class="d-block">
                    <h5 id="time" class="mb-1 text-end text-white">

                    </h5>
                    <h6 id="date" class="mb-0 text-end text-white">

                    </h6>
                </div>
            </div>
        </div>
        <div class="profile mt-3 text-center">
            <div class="d-flex flex-wrap align-items-center gap-2">
                <img src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="" class="rounded-circle avatar-md" />
                <div class="d-block">
                    <h5 class="mb-1 text-start text-white">
                        {{ Auth::user()->name }}
                    </h5>
                    <h6 class="mb-0 text-start text-white job-title">
                        {{ Auth::user()->divisis->name }}
                    </h6>
                </div>
                <div class="ms-auto">
                    <i class='bx bxs-bell'></i>
                </div>
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
