<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member ID Card</title>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card-container {
            height: 400px;
            width: 700px;
            position: relative;
            border-radius: 10px;
            background-position: center;
            background-image: url('https://media-hosting.imagekit.io//102ae4a9925e4ed5/Untitled design.png?Expires=1835102699&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=vsdQ9N3FRAhsF~k~bOvBqOBfoJ0R4JIWR8ZpuDMJahU~v701UHO4fex8DcjVQs2bJtrtS8NtI6t72g7~d98a19nGCeuzZJZcz~RA8HiC454HEos2PL20QfLz0aO3MTKt1cFvis0VnhHjQyHZtr1~EURc5HARarFDmHjXqP4SeQPB5-b5bp3r7FAiZ0FUy5H7~i1ZGad70eaXjeROiktbXo1vYrZI0Ia7WPd0vOWX7j1GSy-ThAJIjdh51EuomkSHIHkBiHuTmZGLiSFS6lCzgpHaYZMsyK9as6-W5l~E2mHDWGkhGdkWaz6kIdqjw0W74uzmx~yaAEH036I7TWQApA__');
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0 auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.92);
            display: flex;
            flex-direction: column;
        }

        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 5px;
        }

        .title-banner {
            width: auto;
            padding: 10px 40px;
            background-color: #b30d00;
            color: white;
            height: max-content;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .title-text {
            font-size: 30px;
            font-weight: bold;
            white-space: nowrap;
        }

        .logo-container {
            padding: 10px 20px 10px 0;
        }

        .logo {
            height: 100px;
            object-fit: contain;
        }

        .content-section {
            display: flex;
            padding: 15px 20px;
            gap: 20px;
        }

        .profile-container {
            width: 130px;
            height: 170px;
            border: 2px solid #333;
            border-radius: 10px;
            position: relative;
            overflow: visible;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15);
        }

        .profile-photo {
            width: 100%;
            height: 100%;
            border-radius: 8px;
            object-fit: cover;
        }

        .logo-badge {
            height: 60px;
            width: 60px;
            position: absolute;
            right: -20px;
            bottom: -15px;
            border-radius: 50%;
            background-color: white;
            padding: 5px;
            border: 1px solid #333;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .badge-logo {
            height: 85%;
            width: 85%;
            object-fit: contain;
        }

        .info-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .info-rows {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .info-row {
            font-size: 18px;
            line-height: 24px;
            margin: 8px 0;
            display: flex;
        }

        .info-label {
            font-weight: 600;
            width: 130px;
            display: inline-block;
        }

        .info-value {
            font-weight: 400;
        }

        .contact-banner-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .contact-banner {
            width: auto;
            padding: 8px 30px;
            background-color: #b30d00;
            color: white;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            box-shadow: -2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .contact-text {
            font-size: 18px;
            font-weight: bold;
            white-space: nowrap;
        }

        .barcode-section {
            margin-top: auto;
            width: 100%;
            display: flex;
            justify-content: flex-end;
            padding: 10px 20px;
            box-sizing: border-box;
        }

        .barcode-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .barcode-image {
            height: 60px;
        }

        @media print {
            body {
                padding: 0;
                background-color: white;
            }

            .card-container {
                box-shadow: none;
                margin: 0;
                page-break-inside: avoid;
            }

            #barcode {
                display: none;
            }

            #barcode-img {
                display: block !important;
            }
        }
    </style>
</head>

<body>
    <div class="card-container">
        <div class="card-overlay">
            <div class="header">
                <div class="title-banner">
                    <span class="title-text">Member of One Nation Party</span>
                </div>
                <div class="logo-container">
                    <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="One Nation Logo">
                </div>
            </div>

            <div class="content-section">
                <div class="profile-container">
                    <img src="{{ $data['profile_photo'] }}" alt="Member Photo" class="profile-photo">
                    <div class="logo-badge">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Badge" class="badge-logo">
                    </div>
                </div>

                <div class="info-container">
                    <div class="info-rows">
                        <p class="info-row">
                            <span class="info-label">Name:</span>
                            <span class="info-value">{{ $data['name'] }}</span>
                        </p>
                        <p class="info-row">
                            <span class="info-label">Issue Date:</span>
                            <span class="info-value">{{ \Carbon\Carbon::parse($data['issue_date'])->format('d-m-Y') }}</span>
                        </p>
                        <p class="info-row">
                            <span class="info-label">Constituency:</span>
                            <span class="info-value">{{ $data['constituency'] }}</span>
                        </p>
                        <p class="info-row">
                            <span class="info-label">Website:</span>
                            <span class="info-value">{{ $data['website'] }}</span>
                        </p>
                        <p class="info-row">
                            <span class="info-label">Member ID:</span>
                            <span class="info-value">{{ $data['member_id'] }}</span>
                        </p>
                    </div>

                    <div class="contact-banner-container">
                        <div class="contact-banner">
                            <span class="contact-text">Contact: {{ $data['contact_number'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="barcode-section">
                <!-- For browser preview with dynamic barcode -->
                <div class="barcode-container">
                    <svg id="barcode"></svg>
                </div>

                <!-- For PDF generation (pre-rendered barcode) -->
                <img id="barcode-img" class="barcode-image" src="data:image/png;base64,{{ DNS2D::getBarcodeHTML($data['member_id'], 'QRCODE') }}" alt="Member ID Barcode" style="display: none;">
            </div>
        </div>
    </div>

    <script>
        // For browser preview only - this won't affect PDF generation
        document.addEventListener('DOMContentLoaded', function() {
            // Generate dynamic barcode for browser preview
            JsBarcode("#barcode", "{{ $data['member_id'] }}", {
                format: "code128",
                lineColor: "#000",
                width: 2,
                height: 40,
                displayValue: true,
                fontSize: 12,
                margin: 10
            });
        });
    </script>
</body>

</html>