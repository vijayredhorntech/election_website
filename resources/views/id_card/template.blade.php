<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>
    <style>
        .card {
            width: 600px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .background-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(45deg,
                    rgba(128, 128, 128, 0.05) 0px,
                    rgba(128, 128, 128, 0.05) 2px,
                    transparent 2px,
                    transparent 8px);
            z-index: 0;
        }

        .header {
            color: white;
            padding: 15px 0px;
            font-size: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .headerTitle {
            background: #c41e3a;
            color: white;
            padding: 15px 20px;
            font-size: 24px;
            border-bottom-right-radius: 50px;
            border-top-right-radius: 50px;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .content {
            padding: 20px;
            display: flex;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .photo {
            width: 120px;
            height: 150px;
            background: #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .details {
            flex: 1;
        }

        .field {
            margin-bottom: 15px;
        }

        .field-label {
            font-weight: bold;
            margin-right: 10px;
        }

        .barcode {
            margin-top: 20px;
            text-align: center;
        }

        .barcode img {
            height: 50px;
            width: 80%;
        }

        .hq-number {
            color: #c41e3a;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="background-pattern"></div>
        <div class="header">
            <div class="headerTitle" style=" background: #c41e3a;color: white;">
                Member of The One Nation Party
            </div>
            <div class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="One Nation Logo" />
            </div>
        </div>
        <div class="content">
            <div class="photo">
                <img src="{{ $data['profile_photo'] }}" alt="Member Photo" />
            </div>
            <div class="details">
                <div class="field">
                    <span class="field-label">Name:</span>
                    {{ $data['name'] }}
                </div>
                <div class="field">
                    <span class="field-label">Issue Date:</span>
                    {{ \Carbon\Carbon::parse($data['issue_date'])->format('d-m-Y') }}
                </div>
                <div class="field">
                    <span class="field-label">Constituency:</span>
                    {{ $data['constituency'] }}
                </div>
                <div class="field">
                    <span class="field-label">Website:</span>
                    https://one-nation.org.uk/
                </div>
                <div class="hq-number">
                    HQ Number: 020 3500 0000
                </div>
                <div class="barcode" style="width: 100%; display: flex; justify-content: end;">
                    <div id="qrcode" style="width: 70px; height: 70px;"></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    window.addEventListener('load', function() {
        const qrContainer = document.getElementById("qrcode");
        const referralUrl = "{{route('index')}}/referral/{{$data['referral_code']}}";

        // Clear any existing content
        qrContainer.innerHTML = "";

        // Generate QR Code
        new QRCode(qrContainer, {
            text: referralUrl,
            width: 200,
            height: 200
        });
    });
</script>

</html>