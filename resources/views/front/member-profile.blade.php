<x-front.layout>
  @push('styles')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/barcodes/JsBarcode.code39.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>

  <script>
    window.onload = function() {
      JsBarcode("#barcode", "{{$memberDetails->custom_id}}", {
        format: "code39",
        lineColor: "#000",
        width: 1,
        height: 7,
        displayValue: false
      });
    };

    function printCard() {
      window.print();
    }

    function copyReferralLink() {
      const referralText = document.getElementById('referralLink').innerText;
      navigator.clipboard.writeText(referralText).then(() => {
        alert('Referral link copied to clipboard!');
      }).catch(err => {
        console.error('Failed to copy text: ', err);
      });
    }

    function downloadCard() {

      document.getElementById("idCardContainer").style.display = "flex";
      html2canvas(document.getElementById("printableDiv")).then(canvas => {
        let link = document.createElement('a');
        link.href = canvas.toDataURL("image/png");
        link.download = 'Member_ID_Card.png';
        link.click();
      });
      document.getElementById("idCardContainer").style.display = "none";
    }
  </script>

  <style>
    table {
      border: 1px solid #cdcdcd;
      width: 100%;
      border-collapse: collapse;

    }

    table tr td {
      border: 1px solid #cdcdcd;
      padding: 5px 10px;
    }

    #idCardContainer {
      display: none;
    }

    .barcode-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 0px;
    }

    .barcode-container svg {
      width: 100%;
      height: 100%;
    }

    @media print {
      body {
        background-color: white !important;
        display: flex;
        justify-content: start;
        align-items: start;

      }

      #idCardContainer {
        display: flex !important;
      }

      .non-printable {
        display: none !important;
      }

      footer {
        display: none !important;
      }

      .print-button,
      .card-header {
        display: none !important;
      }

      .card-container {
        box-shadow: none !important;
        margin: 0 !important;
        padding: 0 !important;
      }

      #printableDiv {
        margin: 0 !important;
        padding: 0 !important;
      }
    }



    .card-container {
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      max-width: 800px;
      overflow: hidden;
    }

    .card-header {
      background-color: #b30d00;
      color: white;
      padding: 20px 30px;
      font-size: 24px;
      font-weight: bold;
    }



    .print-button {
      background-color: #b30d00;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 18px;
      border-radius: 5px;
      cursor: pointer;
      margin: 20px 0;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
      box-shadow: 0 4px 6px rgba(179, 13, 0, 0.3);
    }

    .print-button:hover {
      background-color: #8a0a00;
      transform: translateY(-2px);
    }

    /* Keep the printableDiv styles exactly as they were */
    #printableDiv {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
  </style>
  @endpush

  <div class="non-printable about-us-section-area about-bg" style="background-image: url({{asset('assets/images/about-bg.png')}});">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="about-inner donation-single">
            <h4 class="title" style="color:white">{{ucfirst(strtolower(auth()->user()->name))}}</h4>
          </div>
          <!-- <div class="breadcrumbs">
            <ul>
              <li><a href="{{route('index')}}">Home</a></li>
              <li><a href="{{route('joinUs')}}">{{ucfirst(strtolower(auth()->user()->name))}}'s Profile</a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Faq section Start here -->
  <div class="non-printable accoridion-section" style="margin-top: 0px; padding-top: 0px; padding-bottom: 10px">
    <div class="container">
      <img src="{{asset('assets/images/shape-06.png')}}" class="shape" alt="">
      <img src="{{asset('assets/images/Ellipse-01.png')}}" class="shape-01" alt="">
      <img src="{{asset('assets/images/Ellipse-02.png')}}" class="shape-02" alt="">


    </div>

    <div class="row" style="padding:20px">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12" style="background-color: white;">
        <div
          class="card wow animate__animated animate__fadeInUp shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300"
          style="border: none; border-radius: 15px; overflow: hidden; border:1px solid #e9e9e9; box-shadow:0px 0px 10px 2px #e9e9e9">
          <div class="card-header" id="headingOwo"
            style="background: linear-gradient(135deg, #b30d00 0%, #6a0606 100%); color: white; border: none;">
            <h5 class="mb-0">
              <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseOwo" aria-expanded="false"
                aria-controls="collapseOwo"
                style="color: white; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                <i class="fas fa-user-circle mr-2"></i> Basic Information
              </a>
            </h5>
          </div>
          <div class="card-body">
            <div style="display:flex; gap:10px; justify-content:end; margin-bottom:20px">
              <div style="display:flex; gap:10px">
                <button type="submit" onclick="printCard()" style="background-color:blue; color:white; padding:5px 20px; border-radius:3px; border:0px; cursor:pointer">
                  <i class="fa fa-print" style="margin-right:5px"></i> Print ID <span
                    class="icon-paper-plan"></span></button>
                <button type="submit" onclick="downloadCard()" style="background-color:green; color:white; padding:5px 20px; border-radius:3px; border:0px; cursor:pointer">
                  <i class="fa fa-download" style="margin-right:5px"></i>
                  Download ID <span
                    class="icon-paper-plan"></span></button>
              </div>

            </div>
            <div class="w-full p-2">
              <div style="display: flex; align-items: start; justify-content: space-between; gap: 10px">
                <div>
                  <img class="rounded-[3px] mb-4"
                    src="{{ $memberDetails->profile_photo ? asset('storage/'.$memberDetails->profile_photo) : asset('assets/images/default-profile.png') }}"
                    alt="Profile Photo" style="height: 200px; object-fit:cover; width: 200px; border-radius:3px">
                </div>

                <div style="display: flex; flex-direction:column; align-items: end; gap: 10px; margin-bottom:20px">
                  <div id="qrcode"></div>
                </div>

              </div>
              <div class="referral-share-container" style="display:flex; flex-direction:column; align-items:end">
                <span class="referral-link" id="referralLink" style="color: darkblue; display: flex; align-items: center; gap: 5px; margin-bottom: 10px">
                  {{route('index')}}/referral/{{$memberDetails->user->referral_code}}
                  <i class="fa fa-copy" onclick="copyReferralLink(this)" style="cursor: pointer" title="Copy link"></i>
                </span>

                <div class="social-share-buttons" style="display: flex; gap: 10px; justify-content: flex-end">
                  <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(route('index'))}}/referral/{{$memberDetails->user->referral_code}}"
                    target="_blank"
                    class="share-button facebook"
                    style="background: #3b5998; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; display: flex; align-items: center; gap: 5px">
                    <i class="fab fa-facebook-f"></i> Share
                  </a>

                  <a href="https://wa.me/?text={{ urlencode('Be the change! Join One-Nation through my referral and make a difference:') }}%0A%0A{{ urlencode(route('index').'/referral/'.$memberDetails->user->referral_code) }}"
                    target="_blank"
                    class="share-button whatsapp"
                    style="background: #25D366; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; display: flex; align-items: center; gap: 5px">
                    <i class="fab fa-whatsapp"></i> Share
                  </a>

                  <a href="https://twitter.com/intent/tweet?text={{urlencode('Be the change! Join One-Nation through my referral and make a difference:')}}%20{{urlencode(route('index'))}}/referral/{{$memberDetails->user->referral_code}}"
                    target="_blank"
                    class="share-button twitter"
                    style="background: #1DA1F2; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; display: flex; align-items: center; gap: 5px">
                    <i class="fa-brands fa-x-twitter"></i> Share
                  </a>

                  <a href="https://www.linkedin.com/sharing/share-offsite/?url={{urlencode(route('index'))}}/referral/{{$memberDetails->user->referral_code}}"
                    target="_blank"
                    class="share-button linkedin"
                    style="background: #0077b5; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; display: flex; align-items: center; gap: 5px">
                    <i class="fab fa-linkedin-in"></i> Share
                  </a>
                </div>
              </div>

            </div>
            <table class="w-full">
              <tr>
                <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                  style="color: black; font-weight: 700">Member id</td>
                <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                    class="font-semibold text-black"></span> {{$memberDetails->custom_id}}</td>
              </tr>
              <tr>
                <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                  style="color: black; font-weight: 700">Enrolled On</td>
                <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                    class="font-semibold text-black"></span> {{ \Carbon\Carbon::parse($memberDetails->enrollment_date)->format('d-m-Y') }}
                </td>
              </tr>
              </tr>
              <tr>
                <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                  style="color: black; font-weight: 700">Referral Code</td>
                <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                    class="font-semibold text-black"></span> {{$memberDetails->user->referral_code}}</td>
              </tr>
              </tr>
              <tr>
                <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">Total Members
                  Added</td>
                <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black"
                    style="color: black; font-weight: 400"></span>
                  {{$memberDetails->referredMembers->count()}}
                </td>
              </tr>
            </table>
          </div>
        </div>

      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12" style="background-color: white;">
        <div
          class="card wow animate__animated animate__fadeInUp animate__delay-1s shadow-lg rounded-lg hover:shadow-2xl transition-shadow duration-300"
          style="border: none; border-radius: 15px; overflow: hidden; border:1px solid #e9e9e9; box-shadow:0px 0px 10px 2px #e9e9e9">
          <div class="card-header" id="headingTwo"
            style="background: linear-gradient(135deg, #b30d00 0%, #6a0606 100%); color: white; border: none;">
            <h5 class="mb-0">
              <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                aria-controls="collapseOwo"
                style="color: white; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; ">
                <i class="fas fa-money-check-alt mr-2"></i> Membership/ Donation Info
              </a>
            </h5>
          </div>
          <div class="card-body">
            <div
              class="w-full py-1 px-3 font-semibold text-[#b30d00] bg-gradient-to-r from-[#b30d00]/5 to-[#b30d00]/10 rounded-lg mb-1"
              style="border-left: 4px solid #b30d00;">
              <span style="color: black; font-weight: 500; font-size: 20px">Membership Information</span>
            </div>
            <div class="w-full p-2">
              <table class="w-full">

                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Start Date</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{ \Carbon\Carbon::parse($memberDetails->user?->membership?->start_date)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">End Date</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{ \Carbon\Carbon::parse($memberDetails->user?->membership?->end_date)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Amount</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> £ {{ $memberDetails->user?->membership?->payment_amount }}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Type</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{ $memberDetails->user?->membership?->membership_type }}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Days Remaining</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{ abs(\Carbon\Carbon::parse($memberDetails->user?->membership?->end_date)->diffInDays(today(), false)) }} days </td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Renewal Date</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{ \Carbon\Carbon::parse($memberDetails->user?->membership?->end_date)->subDays(30)->format('d-m-Y')}} </td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">Invoice</td>
                  <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black"></span> <a href="" class="text-[#b30d00] underline">Generate</a></td>
                </tr>
              </table>
            </div>


            <div
              class="w-full py-1 px-3 font-semibold text-[#b30d00] bg-gradient-to-r from-[#b30d00]/5 to-[#b30d00]/10 rounded-lg mb-1"
              style="border-left: 4px solid #b30d00;">
              <span style="color: black; font-weight: 500; font-size: 20px">Donation Information</span>
            </div>
            <div class="w-full p-2">
              <table style="width: 100%" class="w-full">
                <tr>
                  <td class="w-[100px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Sr. No</td>
                  <td class=" font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Donation Date</td>
                  <td class=" font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Amount</td>
                  <td class=" font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Receipt</td>
                </tr>
                @foreach ($memberDetails->user?->donations as $donation)
                <tr>
                  <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black">{{$loop->iteration}}</td>
                  <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black">{{$donation->created_at->format('d-m-Y')}}</td>
                  <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black"> £ {{number_format($donation->amount, 2)}} </td>
                  <td class="w-[100px] border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black"> <a href="" class="text-[#b30d00] underline"><i class="fa fa-file cursor-pointer"></i></a></td>
                </tr>
                @endforeach
                @if($memberDetails->user?->donations->isEmpty())
                <tr>
                  <td colspan="4" class="w-[100px] py-0.5" style="color: black; text-align: center">No donations found</td>
                </tr>
                @endif

              </table>
            </div>
          </div>
        </div>

      </div>
      <div class=" col-lg-4 col-md-6 col-sm-6 col-12" style="background-color: white;">
        <div
          class="card wow animate__animated animate__fadeInUp animate__delay-1s shadow-lg rounded-lg hover:shadow-2xl transition-shadow duration-300"
          style="border: none; border-radius: 15px; overflow: hidden; border:1px solid #e9e9e9; ">
          <div class="card-header" id="headingTwo"
            style="background: linear-gradient(135deg, #b30d00 0%, #6a0606 100%); color: white; border: none;">
            <h5 class="mb-0">
              <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                aria-controls="collapseOwo"
                style="color: white; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                <i class="fas fa-user mr-2"></i>Profile Information
              </a>
            </h5>
          </div>
          <div class="card-body">
            <div class="w-full p-2">

              <table class="w-full">
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Title</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{$memberDetails->title}}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Name</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{$memberDetails->first_name}}
                    {{$memberDetails->last_name}}
                  </td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">DOB</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span>
                    {{\Carbon\Carbon::parse($memberDetails->date_of_birth)->format('d-m-Y')}}
                  </td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Gender</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{$memberDetails->gender}}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Marital Status</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{$memberDetails->marital_status}}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Qualification</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{$memberDetails->qualification}}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">Profession</td>
                  <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black"
                      style="color: black; font-weight: 400"></span> {{$memberDetails->profession}}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">National Insurance Number</td>
                  <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black"
                      style="color: black; font-weight: 400"></span> {{$memberDetails->national_insurance_number}}</td>
                </tr>
                </tr>

              </table>
            </div>



            <div
              class="w-full py-1 px-3 font-semibold text-[#b30d00] bg-gradient-to-r from-[#b30d00]/5 to-[#b30d00]/10 rounded-lg mb-1"
              style="border-left: 4px solid #b30d00;">
              <span style="color: black; font-weight: 500; font-size: 20px">Contact Information</span>
            </div>
            <div class="w-full p-2">
              <table class="w-full">
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Email id</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{$memberDetails->email}}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Phone</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span>{{$memberDetails->primary_country_code}}
                    {{$memberDetails->primary_mobile_number}}
                  </td>
                </tr>

                <tr>
                  <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">Alternate Number
                  </td>
                  <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black"
                      style="color: black; font-weight: 400"></span>{{$memberDetails->alternate_country_code}} {{$memberDetails->alternate_mobile_number}}
                  </td>
                </tr>
              </table>

            </div>


            <div
              class="w-full py-1 px-3 font-semibold text-[#b30d00] bg-gradient-to-r from-[#b30d00]/5 to-[#b30d00]/10 rounded-lg mb-1"
              style="border-left: 4px solid #b30d00;">
              <span style="color: black; font-weight: 500; font-size: 20px">Address Information</span>
            </div>
            <div class="w-full p-2">
              <table class="w-full">
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Address</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span>{{$memberDetails->house_name_number}},
                    {{$memberDetails->street}}, {{$memberDetails->town_city}}, {{$memberDetails->postcode}}
                  </td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">Country</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{$memberDetails->country->name}}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black border-b-[1px] border-b-[#b30d00]/10 py-0.5"
                    style="color: black; font-weight: 700">County</td>
                  <td class="border-b-[1px] border-b-[#b30d00]/10 py-0.5" style="color: black; font-weight: 400"><span
                      class="font-semibold text-black"></span> {{$memberDetails->county->name}}</td>
                </tr>
                <tr>
                  <td class="w-[150px] font-semibold text-black" style="color: black; font-weight: 700">Constituency
                  </td>
                  <td class=" py-0.5" style="color: black; font-weight: 400"><span class="font-semibold text-black"></span> {{$memberDetails->constituency->name}}</td>
                </tr>
              </table>

            </div>
          </div>
        </div>

      </div>


    </div>

  </div>


  <div class="card-container" id="idCardContainer">
    <div class="card-header">
      Member ID Card
    </div>
    <div class="card-content">
      <!-- Keep the printableDiv exactly as it was -->
      <div id="printableDiv" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px;">
        <div style="height: 400px; width: 700px; border:1px solid gray; position: relative; border-radius: 10px; background-position: bottom left; background-image: url({{asset('assets/images/logoBlack.png')}}); background-repeat: no-repeat; background-size: cover;">
          <div style="position: absolute; width: 100%; height: 100%; border-radius: 10px; background-color: rgba(255, 255, 255, 0.9);">
            <div style="width: 100%; height: max-content; display: flex; justify-content: space-between; align-items: center; padding-top: 5px; padding-right: 10px;">

              <div style="width: max-content; padding: 10px 40px; background-color: #b30d00; color: white; height: max-content; border-top-right-radius: 50px; border-bottom-right-radius: 50px;">
                <span style="font-size: 35px;">Member of One Nation Party</span>
              </div>
              <div style="padding: 10px;">
                <img src="{{asset('assets/images/logo.png')}}" style="height: 120px;" alt="">

              </div>

            </div>


            <div style="display: flex; flex-direction: column; padding-left: 20px;">
              <div style="display: flex;">
                <div style="flex: 0 0 130px; height:170px; border: 2px solid black; border-radius: 10px; position: relative;">
                  <img src="{{ $memberDetails->profile_photo ? asset('storage/'.$memberDetails->profile_photo) : asset('assets/images/default-profile.png') }}" alt="" style="width: 100%; height: 100%; border-radius: 10px; object-fit: cover;">
                  <div style="height: 70px; width: 70px; position: absolute; right: -50%; transform: translateX(-30%); bottom: 0px; border-radius: 50%; background-color: white; padding: 5px; border: 1px solid black;">
                    <img src="{{asset('assets/images/logo.png')}}" alt="" style="height: 100%; width: 100%; border-radius: 10px; object-fit: cover;">
                  </div>
                </div>

                <div style="flex: 1;">
                  <p style="font-size: 20px; padding-left: 40px; line-height: 20px;">
                    <span style="font-weight: 600; color:black">Name:</span>
                    <span style="font-weight: 400; color:black">{{$memberDetails->first_name}}
                      {{$memberDetails->last_name}}</span>
                  </p>
                  <p style="font-size: 20px; padding-left: 40px; line-height: 20px;">
                    <span style="font-weight: 600; color:black">Issue Date:</span>
                    <span style="font-weight: 400; color:black">{{\Carbon\Carbon::parse($memberDetails->enrollment_date)->format('d-m-Y')}}</span>
                  </p>
                  <p style="font-size: 20px; padding-left: 40px; line-height: 20px;">
                    <span style="font-weight: 600; color:black">Constituency:</span>
                    <span style="font-weight: 400; color:black">{{$memberDetails->constituency->name}}</span>
                  </p>
                  <p style="font-size: 20px; padding-left: 40px; line-height: 20px;">
                    <span style="font-weight: 600; color:black">Website:</span>
                    <span style="font-weight: 400; color:black">{{route('index')}}</span>
                  </p>
                  <div style="display: flex; justify-content: end;">
                    <div style="width: max-content; padding: 10px 50px; background-color: #b30d00; color: white; height: max-content; border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
                      <span style="font-size: 25px;">Contact Number: {{$memberDetails->primary_country_code}} {{$memberDetails->primary_mobile_number}}</span>
                    </div>
                  </div>
                  <!-- <div class="barcode-container">
                    <svg id="barcode"></svg>
                  </div> -->
                </div>
              </div>
            </div>

            <div style="width: 100%; display:flex; justify-content: end; margin-top: 5px; padding-right:40px">
              <img id="barcode" style="width:370px" />
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  @push('scripts')
  <script>
    window.addEventListener('load', function() {
      const qrContainer = document.getElementById("qrcode");
      const referralUrl = "{{route('index')}}/referral/{{$memberDetails->user->referral_code}}";

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
  @endpush

</x-front.layout>