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
            width: 100%;
            height: auto;
            max-width: 500px;
            margin: 0 auto;
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .qr-frame {
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 4px solid #2D4A8A;
            border-radius: 12px;
            pointer-events: none;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 576px) {
            .container {
                max-width: 100%;
                padding: 0 15px;
            }
            .qr-code-container {
                max-width: 100%;
            }
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
        function onScanSuccess(qrMessage) {
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
        }

        function onScanError(errorMessage) {
            console.log('QR Code Scan Error: ', errorMessage);
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: { width: 250, height: 250 } });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    }

    $(document).ready(function() {
        requestLocation();
    });
</script>
</body>
</html>
