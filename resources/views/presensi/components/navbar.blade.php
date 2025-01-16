<header class="topbar">
    <div class="container-xxl">
        <div class="navbar-header">
            <div class="d-flex align-items-center gap-2">
                <!-- Menu Toggle Button -->
                <div class="topbar-item">
                    <button type="button" class="button-toggle-menu">
                        <iconify-icon icon="iconamoon:menu-burger-horizontal" class="fs-22"></iconify-icon>
                    </button>
                </div>

                <!-- App Search-->
                <div class="align-items-center d-none d-md-block me-auto">
                    <div class="d-block">
                        <p id="date" class="fs-12 mb-0"></p>
                        <h5 id="time" class="mb-1 fs-14"></h5>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-1">
                <!-- Theme Color (Light/Dark) -->
                <div class="topbar-item">
                    <button type="button" class="topbar-button" id="light-dark-mode">
                        <iconify-icon icon="iconamoon:mode-dark-duotone" class="fs-24 align-middle"></iconify-icon>
                    </button>
                </div>

                <!-- User -->
                <div class="dropdown topbar-item">
                    <a type="button" class="topbar-button" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle" width="32" src="{{ Auth::user()->profile_image ? asset('storage/'.Auth::user()->profile_image) : url('assets/images/users/dummy-avatar.jpg') }}" alt="avatar"/>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">{{ Auth::user()->name }} - {{ Auth::user()->divisis->name }}</h6>
                        <a class="dropdown-item" href="{{ route('akun') }}">
                            <i class="bx bx-user-circle text-muted fs-18 align-middle me-1"></i>
                            <span class="align-middle">Profile</span>
                        </a>
                        <div class="dropdown-divider my-1"></div>

                        <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                            <i class="bx bx-log-out fs-18 align-middle me-1"></i>
                            <span class="align-middle">Logout</span>
                        </a>
                    </div>
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
