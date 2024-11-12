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
        function onScanSuccess(qrMessage) {
            if (!qrScanned) { // Pastikan QR code belum dipindai sebelumnya
                console.log('Scanned QR Code: ', qrMessage);
                qrScanned = true; // Set variabel penanda menjadi true setelah pemindaian pertama
                $.ajax({
                    url: '/verify-qr',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        qr_code: qrMessage
                    },
                    success: function(response) {
                        const newUrl = '/hasil-scan/' + response.user.id;
                        window.location.href = newUrl;
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.responseJSON.message
                        });
                        qrScanned = false; // Set variabel penanda kembali ke false jika terjadi kesalahan
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

    </script>
</body>
</html>
