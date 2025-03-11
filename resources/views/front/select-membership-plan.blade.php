<x-front.layout>
    @push('styles')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .container-box input[type="checkbox"]:checked + .checkmark {
            background-color: #007bff;
            /* Change to desired color */
            border-color: #007bff;
            /* Change to desired color */
        }
        ul li
        {
            color: black;
        }
    </style>
    @endpush

    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title" style="color:white">Membership Plans</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('joinUs')}}">Plans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="donation-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="volunteer-form style-01">
                        <div class="donate-programm">
                            <div class="content">
                                <h6 class="subtitle">Your Support Empower One Nation </h6>
                                <p class="description style-01">
                                    Your generous support empowers One Nation to strengthen communities, drive change, and build a brighter future for Great Britain.
                                </p>

                                @if(session('error'))
                                <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                                @endif @if(session('success'))
                                <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="contact-form style-01">
                            <form action="{{route('paymentGateway')}}" method="post" class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <h6 class="title"> Membership plan</h6>


                                <div class="row">

                                    <div class="form-question" style="padding-left: 20px; padding-bottom: 0px; margin-bottom: 0px">
                                        <div class="check-box-wrapper">
                                            <div class="check-box">

                                                <label class="container-box">
                                                    <span style="font-weight: bold; color: black"> £ 36/Year <span style="font-size: 13px">(only £ 3/ month)</span></span>
                                                    <input type="radio" value="36" name="memberShip" checked>
                                                    <span class="checkmark"></span>
                                                </label>
                                                @error ('memberShip')<span
                                                    style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="form-question">
                                        <div class="check-box-wrapper">
                                            <div class="check-box">
                                                <label style="color: black" class="container-box">
                                                    I confirm that I have read and accept the <span style="color: #b30d00;cursor: pointer;" data-toggle="modal" data-target="#cancelationPolicyModel">Terms & Conditions.</span>
                                                    <input type="checkbox" name="acceptTerms">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        @error ('acceptTerms')<span
                                            style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                    </div>
                                </div>
                                <div class="form-question" id="monthlyAggrements" style="display: none">
                                    <div class="check-box-wrapper">
                                        <div class="check-box">
                                            <label class="container-box">
                                                By selecting, you agree to our <span style="color: #b30d00;cursor: pointer; font-size: 16px; margin-right: 10px" data-toggle="modal" data-target="#agreementModel">
                                    Membership Agreement
                                </span>
                                                <div class="modal fade" id="agreementModel" tabindex="-1" role="dialog" aria-labelledby="agreementModelLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">One Nation Membership Agreement
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p style="color: black">This Membership Agreement outlines the terms and conditions of becoming and remaining a member of One Nation. By registering and paying for membership, you agree to the following terms:
                                                                </p>

                                                                <h5 class="modal-title" id="exampleModalLabel">1. Membership Benefits
                                                                </h5>
                                                                <ul style="padding-left: 50px">
                                                                    <h6 class="modal-title" id="exampleModalLabel">As a member of One Nation, you are entitled to:
                                                                    </h6>

                                                                    <li>Access to exclusive events, resources, and updates.
                                                                    </li>
                                                                    <li>The ability to participate in party activities, voting on policies, and supporting party initiatives.
                                                                    </li>
                                                                    <li>Direct engagement with party leaders and fellow members.
                                                                    </li>

                                                                </ul>
                                                                <h5 class="modal-title" id="exampleModalLabel">2. Membership Payment
                                                                </h5>
                                                                <ul style="padding-left: 50px">
                                                                    <li>Monthly Membership Fee: £3 (via standing order)
                                                                    </li>
                                                                    <li>Annual Membership Fee: £36 (one-time payment)
                                                                    </li>
                                                                    <li>Members are required to maintain active membership payments.</li>
                                                                    <li>Payments must be made promptly to maintain active membership status.
                                                                    </li>
                                                                </ul>
                                                                <h5 class="modal-title" id="exampleModalLabel">3. Payment Methods & Non-Payment
                                                                </h5>
                                                                <ul style="padding-left: 50px">
                                                                    <li>Membership fees can be paid via standing order or direct debit.
                                                                    </li>
                                                                    <li>Failure to Pay: If a member misses three consecutive payments, their membership will be suspended.
                                                                    </li>
                                                                    <li>Members will be notified of overdue payments via email/SMS reminders.
                                                                    </li>
                                                                    <li>Final Notice: If no payment is received after reminders, membership may be cancelled.
                                                                    </li>
                                                                    <li>Reactivation is possible by settling outstanding payments and reinstating a standing order.
                                                                    </li>
                                                                </ul>
                                                                <h5 class="modal-title" id="exampleModalLabel">4. Membership Cancellation
                                                                </h5>
                                                                <ul style="padding-left: 50px">
                                                                    <li>Members may cancel their membership at any time by notifying One Nation via email
                                                                        <a href="mailto:info@one-nation.org.uk">info@one-nation.org.uk</a></li>
                                                                    <li>Membership can also be automatically terminated if payments are not resumed within a reasonable period.
                                                                    </li>
                                                                    <li>Any member whose membership is cancelled due to non-payment must reapply to become a member again.
                                                                    </li>
                                                                </ul>
                                                                <h5 class="modal-title" id="exampleModalLabel">5. Reactivation of Membership
                                                                </h5>
                                                                <ul style="padding-left: 50px">

                                                                    <li>Reactivation Process: Members who have missed payments can reactivate their membership by making full payment of outstanding dues.
                                                                    </li>
                                                                    <li>Reactivation requests should be made by contacting
                                                                        <a href="mailto:info@one-nation.org.uk">info@one-nation.org.uk</a></li>
                                                                    <li>If a member chooses not to pay past dues, they will be required to re-register as a new member.
                                                                    </li>
                                                                </ul>
                                                                <h5 class="modal-title" id="exampleModalLabel">6. Special Cases & Financial Hardship
                                                                </h5>
                                                                <ul style="padding-left: 50px">

                                                                    <li>One Nation is committed to supporting members facing temporary financial hardship.
                                                                    </li>
                                                                    <li>Members experiencing difficulty paying membership fees should contact us to explore alternative payment options or request a temporary pause on payments.
                                                                    </li>
                                                                    <li>Any special cases will be considered on a case-by-case basis.
                                                                    </li>
                                                                </ul>
                                                                <h5 class="modal-title" id="exampleModalLabel">7. Member Responsibilities
                                                                </h5>
                                                                <ul style="padding-left: 50px">
                                                                    <li>Members are expected to engage with One Nation in a respectful, constructive manner.
                                                                    </li>
                                                                    <li>Any behavior that is disruptive, disrespectful, or contrary to the party’s values may result in suspension or termination of membership.
                                                                    </li>

                                                                </ul>
                                                                <h5 class="modal-title" id="exampleModalLabel">8. Agreement Terms
                                                                </h5>
                                                                <ul style="padding-left: 50px">
                                                                    <h6 class="modal-title" id="exampleModalLabel">By becoming a member, you agree to:
                                                                    </h6>

                                                                    <li>Abide by the terms outlined in this agreement.
                                                                    </li>
                                                                    <li>Stay informed about updates, events, and actions taken by One Nation.
                                                                    </li>
                                                                    <li>Participate in party initiatives to further our mission of creating a stronger, fairer, and more united Britain.</li>
                                                                </ul>
                                                                <h5 class="modal-title" id="exampleModalLabel">Signed by
                                                                </h5>
                                                                <div style="display: flex; flex-direction: column">
                                                                     <span style="color: black"><strong>User Name:</strong>
                                                                    {{ Session::get('name')}}
                                                                </span>
                                                                    <span style="color: black"><strong>Date:</strong>
                                                                    <script>
                                                                        var today = new Date();
                                                                        var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
                                                                        document.write(date);
                                                                    </script>

                                                                </span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="checkbox" name="termsAndConditionCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span style="color: red; display: none" >
                                               * You need to accept our membership agreement to proceed.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                    <button type="submit" class="boxed-btn btn-sanatory"> Continue <span class="icon-paper-plan"></span></button>
                                </div>
                            </form>
                            <div class="why-to-join-us">
                                <!-- Modal -->
                                <div class="modal fade" id="cancelationPolicyModel" tabindex="-1" role="dialog" aria-labelledby="cancelationPolicyModelLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">One Nation – Membership Cancellation, Reactivation, and Refund Policy</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="modal-title" id="exampleModalLabel">1. Cancellation by Member</h5>
                                                <ul style="padding-left: 50px">
                                                    <li>Members may cancel their membership at any time by providing written notice to One Nation via email at
                                                        <a href="mailto:info@one-nation.org.uk">info@one-nation.org.uk</a> or through the contact details provided on our website.
                                                    </li>
                                                    <li>Please note that membership fees are non-refundable, and no refunds will be issued for fees already paid.
                                                    </li>
                                                    <li>In the case of monthly membership cancellations, the remaining non-refundable membership fees for the period in question must be settled before the membership is officially canceled.
                                                    </li>
                                                    <li>Cancellations will take effect from the next payment cycle after the notice is received and the outstanding balance is cleared.
                                                    </li>
                                                </ul>
                                                <h5 class="modal-title" id="exampleModalLabel">2. Cancellation by One Nation</h5>
                                                <ul style="padding-left: 50px">
                                                    <li>One Nation reserves the right to terminate or suspend a member’s membership at any time if they fail to comply with the membership rules, Code of Conduct, or if payment is not received by the specified deadline.
                                                    </li>
                                                    <li>In such cases, no refunds will be provided, and the member will be notified of the termination.
                                                    </li>

                                                </ul>
                                                <h5 class="modal-title" id="exampleModalLabel">3. Membership Fees</h5>
                                                <ul style="padding-left: 50px">
                                                    <li>All membership fees are non-refundable, even if the membership is canceled before the end of the paid period.
                                                    </li>
                                                    <li>Once a payment is made, it is considered final, and no refunds will be issued under any circumstances.
                                                    </li>

                                                </ul>
                                                <h5 class="modal-title" id="exampleModalLabel">4. Reactivation of Membership
                                                </h5>
                                                <ul style="padding-left: 50px">
                                                    <li>If a membership has been canceled or suspended due to non-payment or voluntary cancellation, members may reactivate their membership by clearing any outstanding balances.
                                                    </li>
                                                    <h6 class="modal-title" id="exampleModalLabel"> Reactivation of Membership
                                                    </h6>
                                                    <li><strong>Step 1:</strong> Contact One Nation via email at info@one-nation.org.uk to request reactivation.
                                                    </li>
                                                    <li><strong>Step 2:</strong> Settle any outstanding payments (including any potential reactivation fees).
                                                    </li>
                                                    <li><strong>Step 3:</strong> Upon payment, membership access will be restored within 7-10 working days.
                                                    </li>
                                                    <li><strong>Step 4:</strong>Members will be sent confirmation of reactivation and regain access to member benefits.

                                                    </li>


                                                </ul>
                                                <h5 class="modal-title" id="exampleModalLabel">5. Reactivation Fees
                                                </h5>
                                                <ul style="padding-left: 50px">
                                                    <li>A reactivation fee may apply if the membership has been inactive for an extended period (e.g., longer than 3 months).
                                                    </li>
                                                    <li>The fee will be clearly communicated before any reactivation process begins.
                                                    </li>
                                                </ul>

                                                <h5 class="modal-title" id="exampleModalLabel">6. Procedure for Cancellation and Reactivation
                                                </h5>
                                                <ul style="padding-left: 50px">
                                                    <h6 class="modal-title" id="exampleModalLabel">To cancel your membership:
                                                    </h6>
                                                    <li>Contact One Nation via email at <a href="mailto:info@one-nation.org.uk">info@one-nation.org.uk</a> with your membership ID and reason for cancellation (optional).

                                                    </li>
                                                    <li>You will receive confirmation that your cancellation request has been processed.

                                                    </li>
                                                    <h6 class="modal-title" id="exampleModalLabel">To reactivate your membership:

                                                    </h6>
                                                    <li>Follow the steps outlined above to clear outstanding payments and request reactivation.
                                                    </li>
                                                </ul>
                                                <h5 class="modal-title" id="exampleModalLabel">7. Impact of Cancellation and Reactivation

                                                </h5>
                                                <ul style="padding-left: 50px">
                                                    <li>After cancellation, members will lose access to member-only resources, benefits, and voting rights.
                                                    </li>
                                                    <li>If the cancellation occurs before the next payment cycle, no further payments will be taken.
                                                    </li>
                                                    <li>Reactivation restores full membership benefits once the payment has been completed and processed.
                                                    </li>
                                                </ul>

                                                <h5 class="modal-title" id="exampleModalLabel">8. Refund Policy

                                                </h5>
                                                <ul style="padding-left: 50px">
                                                    <h6 class="modal-title" id="exampleModalLabel">Membership Fees:
                                                    </h6>
                                                    <li>Membership fees are non-refundable once paid. This includes both monthly and annual contributions.
                                                    </li>
                                                    <li>No refunds will be issued if a member cancels their membership before the next payment cycle or for any unused portion of the membership period.
                                                    </li>
                                                    <li>In the case of monthly membership cancellations, any remaining non-refundable membership fees must be paid in full before the cancellation can be finalized.
                                                    </li>
                                                    <li>Payments made in error or via duplicate transactions will be considered for a refund only if requested within 14 days from the date of the payment. Refunds for such cases will be processed back to the original payment method.
                                                    </li>
                                                    <h6 class="modal-title" id="exampleModalLabel">Event or Merchandise Purchases:
                                                    </h6>
                                                    <li>Refunds for events or merchandise purchased through One Nation are only available if the event is cancelled or if an item is faulty or damaged.
                                                    </li>
                                                    <li>Requests for refunds must be made within 14 days of the purchase date.
                                                    </li>
                                                    <h6 class="modal-title" id="exampleModalLabel">Exceptional Circumstances:
                                                    </h6>
                                                    <li>Refunds may be considered in exceptional circumstances at the sole discretion of One Nation, on a case-by-case basis.
                                                    </li>

                                                </ul>

                                                <h5 class="modal-title" id="exampleModalLabel">9. Liability
                                                </h5>
                                                <ul style="padding-left: 50px">
                                                    <li>One Nation will not be held liable for any loss or damages resulting from the Member’s participation in the membership program, except in cases where it is caused by negligence or breach of duty on the part of One Nation.</li>
                                                </ul>
                                                <h5 class="modal-title" id="exampleModalLabel">10. Data Protection & Privacy

                                                </h5>
                                                <ul style="padding-left: 50px">
                                                    <li>The Member’s personal information will be used in accordance with the UK Data Protection laws and GDPR.
                                                    </li>
                                                    <li>The Member agrees that their information may be used for membership-related communications and party activities, including fundraising, without further consent, unless requested otherwise.
                                                    </li>
                                                </ul>
                                                <h5 class="modal-title" id="exampleModalLabel">11. Governing Law


                                                </h5>
                                                <ul style="padding-left: 50px">
                                                    <li>This Agreement shall be governed by the laws of England and Wales.
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>


        document.querySelectorAll('input[name="memberShip"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                // If the "Monthly" radio button is selected, show the agreement
                if (document.getElementById('monthlyplan').checked) {
                    document.getElementById('monthlyAggrement').style.display = 'block';
                } else {
                    document.getElementById('monthlyAggrement').style.display = 'none';
                }
            });
        });




        document.addEventListener('DOMContentLoaded', function() {



            const donationTypeBtns = document.querySelectorAll('input[name="memberShip"]');




            // Handle donation type selection
            donationTypeBtns.forEach(btn => {
                btn.addEventListener('change', function() {
                    const donationType = this.value;
                    const allTypeButtons = document.querySelectorAll('.donation-type-btn');

                    // Update button styles
                    allTypeButtons.forEach(typeBtn => {
                        if (typeBtn.dataset.type === donationType) {
                            typeBtn.classList.remove('bg-white', 'text-[#d53369]');
                            typeBtn.classList.add('bg-[#b30d00]', 'text-white');
                        } else {
                            typeBtn.classList.remove('bg-[#b30d00]', 'text-white');
                            typeBtn.classList.add('bg-white', 'text-[#d53369]');
                        }
                    });

                });
            });
        });
    </script>
    @endpush
</x-front.layout>
