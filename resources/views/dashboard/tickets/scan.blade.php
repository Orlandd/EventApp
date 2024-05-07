@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Scan Code</h1>
    </div>

    <div id="notif">
    </div>

    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-12">
                <div class="card d-flex justify-content-center" style="width: 40rem;">
                    <div class="card-body" id="reader">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <div class="row">
            <div class="col-12">
                <h5>Input Code</h5>
                <form id="scanForm">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username"
                            aria-label="Recipient's username" aria-describedby="button-addon2" style="width: 40rem;"
                            id="result" name="result">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">C</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div id="reader" width="100px"></div> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tangani event submit pada form
            $('#scanForm').submit(function(e) {
                e.preventDefault(); // Hindari reload halaman

                let code = $('#result').val();
                $.ajax({
                    type: 'POST',
                    url: '/dashboard/scan/code',
                    data: {
                        result: code,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#notif").html(`
                            ${response}
                        `)
                    },
                    error: function(xhr, status, error) {
                        // Tanggapan error dari server
                        // console.error(xhr.responseText);
                        // Lakukan tindakan lain jika diperlukan
                    }
                });
            });
        });

        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);

            let code = decodedText;

            $.ajax({
                type: 'POST',
                url: '/dashboard/scan/code',
                data: {
                    result: code,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $("#notif").html(`
                            ${response}
                        `)
                },
                error: function(xhr, status, error) {

                }
            });


        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 60,
                qrbox: {
                    width: 300,
                    height: 300
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
