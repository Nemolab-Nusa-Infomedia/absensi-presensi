<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
        }

        .container {
            padding-top: 20px;
            max-width: 400px;
        }

        .title {
            font-weight: 700;
            font-size: 20px;
            color: #2D4A8A;
            text-align: center;
            margin-top: 20px;
        }

        .subtitle {
            font-size: 16px;
            color: #8a8a8a;
            text-align: center;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .qr-code-container {
            border: 4px solid transparent;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .qr-frame {
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            border: 4px solid #2D4A8A;
            border-radius: 12px;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <a href="#" class="text-decoration-none d-flex align-items-center mb-3" style="color: #2D4A8A;">
                <i class="bi bi-arrow-left fs-5 me-2"></i> Kembali
            </a>
            <h4 class="title">Scan QR Code</h4>
            <p class="subtitle">Silakan Scan Barcode di sini</p>
            <div class="qr-code-container" id="reader">
                <div class="qr-frame"></div>
            </div>
        </div>
    </div>

    <script>
        var qrScanned = false;

        function requestLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(onLocationSuccess, onLocationError);
            } else {
                alert("Geolocation tidak didukung di browser Anda.");
            }
        }

        function onLocationSuccess(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            startQrScanner(latitude, longitude);
        }

        function onLocationError(error) {
            alert("Aktifkan lokasi untuk menggunakan fitur ini.");
            console.log("Error mendapatkan lokasi: ", error.message);
        }

        function startQrScanner(latitude, longitude) {
            const qrCodeScanner = new Html5Qrcode("reader");

            // Config untuk pemindaian kamera belakang otomatis
            qrCodeScanner.start(
                { facingMode: { exact: "environment" } }, // Menggunakan kamera belakang
                {
                    fps: 1, // Kecepatan frame per detik
                    qrbox: { width: 250, height: 250 } // Ukuran area pemindaian QR
                },
                (qrMessage) => { // Callback jika QR code berhasil di-scan
                    if (!qrScanned) {
                        qrScanned = true;
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
                                window.location.href = '/presensi';
                            },
                            error: function(response) {
                                alert(response.responseJSON.message);
                                qrScanned = false;
                            }
                        });
                    }
                },
                (errorMessage) => { // Callback jika ada error dalam pemindaian
                    console.log('QR Code Scan Error: ', errorMessage);
                }
            ).catch((error) => {
                console.log("Error starting camera: ", error);
                alert("Gagal memulai kamera. Pastikan izin kamera diaktifkan.");
            });
        }

        $(document).ready(function() {
            requestLocation();
        });
    </script>

</body>
</html>
