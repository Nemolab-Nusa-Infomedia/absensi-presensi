<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row col-12 col-md-6 justify-content-center mx-auto">
            <h4 class="d-flex justify-content-center">Scan QR Code</h4>
            <div class="card" id="reader">
                <div class="card-content mx-auto">
                </div>
            </div>
        </div>
    </div>

<script>
    var qrScanned = false; // Variabel penanda untuk memastikan QR code hanya dipindai sekali

    // Fungsi untuk meminta lokasi pengguna
    function requestLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(onLocationSuccess, onLocationError);
        } else {
            alert("Geolocation tidak didukung di browser Anda.");
        }
    }

    // Fungsi jika lokasi berhasil diambil
    function onLocationSuccess(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        console.log("Lokasi Pengguna: ", latitude, longitude);

        // Lanjutkan proses pemindaian QR
        startQrScanner(latitude, longitude);
    }

    // Fungsi jika lokasi gagal diambil
    function onLocationError(error) {
        alert("Aktifkan lokasi untuk menggunakan fitur ini.");
        console.log("Error mendapatkan lokasi: ", error.message);
    }

    // Mulai QR Scanner jika lokasi tersedia
    function startQrScanner(latitude, longitude) {
        function onScanSuccess(qrMessage) {
            if (!qrScanned) { // Pastikan QR code belum dipindai sebelumnya
                console.log('Scanned QR Code: ', qrMessage);
                qrScanned = true; // Set variabel penanda menjadi true setelah pemindaian pertama
                $.ajax({
                    url: '/attendance',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        qr_code: qrMessage,
                        latitude: latitude,
                        longitude: longitude
                    },
                    success: function(response) {
                        const newUrl = '/presensi';
                        window.location.href = newUrl;
                    },
                    error: function(response) {
                        alert(response.responseJSON.message);
                        qrScanned = false;
                    }
                });
            }
        }

        function onScanError(errorMessage) {
            console.log('QR Code Scan Error: ', errorMessage);
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 1, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    }

    // Jalankan permintaan lokasi saat halaman dimuat
    $(document).ready(function() {
        requestLocation();
    });
</script>
</body>
</html>
