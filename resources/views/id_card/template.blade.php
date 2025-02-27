<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Id Card</title>

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/barcodes/JsBarcode.code39.min.js"></script>
    <script>
        JsBarcode("#barcode", "1234", {
            format: "pharmacode",
            lineColor: "#0aa",
            width: 4,
            height: 40,
            displayValue: false
        });
    </script>
</head>

<body style="background-color: gray; font-family: sans-serif;">

    <div style="height: 400px; width: 700px; position: relative; border-radius: 10px; background-position: bottom left; background-image: url('https://media-hosting.imagekit.io//102ae4a9925e4ed5/Untitled design.png?Expires=1835102699&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=vsdQ9N3FRAhsF~k~bOvBqOBfoJ0R4JIWR8ZpuDMJahU~v701UHO4fex8DcjVQs2bJtrtS8NtI6t72g7~d98a19nGCeuzZJZcz~RA8HiC454HEos2PL20QfLz0aO3MTKt1cFvis0VnhHjQyHZtr1~EURc5HARarFDmHjXqP4SeQPB5-b5bp3r7FAiZ0FUy5H7~i1ZGad70eaXjeROiktbXo1vYrZI0Ia7WPd0vOWX7j1GSy-ThAJIjdh51EuomkSHIHkBiHuTmZGLiSFS6lCzgpHaYZMsyK9as6-W5l~E2mHDWGkhGdkWaz6kIdqjw0W74uzmx~yaAEH036I7TWQApA__'); background-repeat: no-repeat; background-size: cover;">
        <div style="position: absolute; width: 100%; height: 100%; border-radius: 10px; background-color: rgba(255, 255, 255, 0.9);">
            <div style="width: 100%; height: max-content; display: flex; justify-content: space-between; align-items: center; padding-top: 5px; padding-right: 10px;">

                <div style="width: max-content; padding: 10px 40px; background-color: #b30d00; color: white; height: max-content; border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
                    <span style="font-size: 35px;">Member of One Nation Party</span>
                </div>
                <div style="padding: 10px;">
                    <img src="https://one-nation.org.uk/assets/images/logo.png" style="height: 120px;" alt="">

                </div>

            </div>


            <div style="display: flex; flex-direction: column; padding-left: 20px;">
                <div style="display: flex;">
                    <div style="flex: 0 0 130px; height:170px; border: 2px solid black; border-radius: 10px; position: relative;">
                        <img src="{{ $data['profile_photo'] }}" alt="" style="width: 100%; height: 100%; border-radius: 10px; object-fit: cover;">
                        <div style="height: 70px; width: 70px; position: absolute; right: -50%; transform: translateX(-30%); bottom: 0px; border-radius: 50%; background-color: white; padding: 5px; border: 1px solid black;">
                            <img src="https://one-nation.org.uk/assets/images/logo.png" alt="" style="height: 100%; width: 100%; border-radius: 10px; object-fit: cover;">
                        </div>
                    </div>

                    <div style="flex: 1;">
                        <p style="font-size: 20px; padding-left: 40px; line-height: 10px;">
                            <span style="font-weight: 600;">Name:</span>
                            <span style="font-weight: 400;">{{ $data['name'] }}</span>
                        </p>
                        <p style="font-size: 20px; padding-left: 40px; line-height: 10px;">
                            <span style="font-weight: 600;">Issue Date:</span>
                            <span style="font-weight: 400;">{{ $data['issue_date'] }}</span>
                        </p>
                        <p style="font-size: 20px; padding-left: 40px; line-height: 10px;">
                            <span style="font-weight: 600;">Constituency:</span>
                            <span style="font-weight: 400;">{{ $data['constituency'] }}</span>
                        </p>
                        <p style="font-size: 20px; padding-left: 40px; line-height: 10px;">
                            <span style="font-weight: 600;">Website:</span>
                            <span style="font-weight: 400;">{{ $data['website'] }}</span>
                        </p>
                        <div style="display: flex; justify-content: end;">
                            <div style="width: max-content; padding: 10px 50px; background-color: #b30d00; color: white; height: max-content; border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
                                <span style="font-size: 25px;">Contact Number: {{ $data['contact_number'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div style="width: 100%; display:flex; justify-content: end; margin-top: 5px;">
                <img id="barcode" />
                <!-- <img src="https://pngimg.com/uploads/barcode/barcode_PNG10.png" style="height: 40px; width: 300px; margin-right: 20px;" alt=""> -->
            </div>
        </div>
    </div>
    </div>
</body>

</html>