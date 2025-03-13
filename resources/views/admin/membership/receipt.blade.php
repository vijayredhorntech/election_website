<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>

<body>
    <div id="downloadAbleDiv" style="width: 600px; height: 370px; border-radius: 3px; border: 1px solid #ffffff; position: relative; overflow: hidden; background-image: radial-gradient(circle, rgb(255,255,255) 0%, rgba(255, 255, 255, 0) 100%), url({{asset('assets/images/id_signature.jpg')}});background-repeat: no-repeat;  background-size: cover; background-position: bottom left;">
        <div style="width: 400px; height: 20px; background-color: #cb4940; position: absolute; top: 0px; right: -20px; transform: skew(40deg);"></div>
        <div style="width: 300px; height: 30px; border-left: 5px solid white; background-color: #b30d00; position: absolute; top: 0px; right: -20px; transform: skew(40deg);"></div>
        <img src="{{asset('assets/images/logo.png')}}" style="height: 100px; width: 100px; border-radius: 50%; position: absolute; right: 10px; top: 40px" alt="">
        <div style="width: 100%; padding-top: 65px; padding-left: 30px; display: flex; flex-direction: column; color: black">
            <span style="font-weight: bold; font-size: 30px; color: #B30D00FF; font-family: Roboto">Payment Receipt</span>
        </div>
        <div style="display: flex;padding-left: 30px; padding-right: 30px; margin-top: 40px; ">
            <div style="width: 150px;border-bottom: 1px solid transparent;">
                <span style="font-family: Roboto; font-size: 16px; font-weight: bold;color: black">Received From</span>
            </div>
            <div style="padding-left: 5px;border-bottom: 1px solid gray; width: 100%">
                <span style="font-size: 16px;font-family: Roboto; color: black">{{$membership->user->name}}</span>
            </div>
        </div>
        <div style="display: flex;padding-left: 30px; padding-right: 30px; margin-top: 30px; ">
            <div style="width: 70px;border-bottom: 1px solid transparent;">
                <span style="font-family: Roboto; font-size: 16px; font-weight: bold; color: black">Amount</span>
            </div>
            <div style="padding-left: 15px;border-bottom: 1px solid gray; width: 400px">
                <span style="font-size: 16px;font-family: Roboto;color: black"> <span style="font-size: 18px">£</span> {{$membership->payment_amount}}</span>
            </div>
            <div style="width: 110px;border-bottom: 1px solid transparent;">
                <span style="font-family: Roboto; font-size: 16px; font-weight: bold;color: black">Method</span>
            </div>
            <div style="padding-left: 30px;border-bottom: 1px solid gray; width: 100%">
                <span style="font-size: 16px;font-family: Roboto; color: black">Online</span>
            </div>
        </div>

        <div style="display: flex;padding-left: 30px; padding-right: 30px; margin-top: 30px;">
            <div style="width: 120px; border-bottom: 1px solid transparent;">
                <span style="font-family: Roboto; font-size: 16px; font-weight: bold; color: black">Description</span>
            </div>
            <div style="padding-left: 5px;border-bottom: 1px solid gray; width: 100%">
                <span style="font-size: 16px;font-family: Roboto; color: black">{{ $description }}</span>
            </div>

        </div>
        <div style="display: flex; flex-direction: column; align-items: end; padding-left: 30px; padding-right: 30px; margin-top: 10px; ">
            <div style="width: 130px;border-bottom: 1px solid transparent; display: flex; justify-content: end">
                <span style="font-family: Roboto; font-size: 16px; font-weight: bold; color: black">Received by</span>
            </div>
            <div style="width: 200px;display: flex; justify-content: end; padding-left: 15px;  border-bottom: 1px solid gray; margin-top: 0px">
                <span style="font-size: 16px;font-family: Roboto; color: black">One Nation Political Party</span>
            </div>
            <span style="font-size: 16px;font-family: Roboto; color: black; margin-top: 10px">Date: {{\Carbon\Carbon::parse($membership->start_date)->format('d M Y')}}

        </div>
        <div style="width: 100%; height: 20px; background-color: #750901; position: absolute; bottom: 0px; left: 2px;"></div>
        <div style="width: 400px; height: 30px; border-right: 5px solid white; background-color: #a82f24; position: absolute; bottom: 0px; left: -20px; transform: skew(40deg);"></div>
        <div style="width: 350px; height: 40px; border-right: 5px solid white; background-color: #b30d00; position: absolute; bottom: 0px; left: -20px; transform: skew(40deg);"></div>

    </div>

    <div style="display: flex; ">
        <a style="background-color: #b30d00; color: white; padding: 5px 15px; border-radius: 3px; margin-top: 15px" href="{{route('memberProfile')}}">Back</a>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            html2canvas(document.getElementById("downloadAbleDiv")).then(canvas => {
                let link = document.createElement('a');
                link.href = canvas.toDataURL("image/png");
                link.download = 'Payment_Receipt.png';
                link.click();
                {{--window.location.href = "{{ route('membership.index') }}";--}}
            });
        });
    </script>




</body>

</html>
