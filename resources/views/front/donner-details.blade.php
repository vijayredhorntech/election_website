<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
    </style>
    @endpush

    <div class="donation-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="volunteer-form style-01">
                        <div class="donate-programm">
                            <div class="content">
                                <h6 class="subtitle">Help build One Nation's campaign fund</h6>

                                @if(session('error'))
                                <div class="text-red-600 text-sm font-semibold mt-4" style="color: orangered; font-weight: 500">{{session('error')}}</div>
                                @endif @if(session('success'))
                                <div class="text-green-600 text-sm font-semibold mt-4" style="color: green; font-weight: 500">{{session('success')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="contact-form style-01">
                            <form action="{{route('storeMemberAddressInformation')}}" enctype="multipart/form-data" method="post" class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">First Name <span class="text-danger">*</span></label>
                                            <input type="text" name="first_name" placeholder="First Name" id="first_name" value="{{old('first_name')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                            @error('postcode')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>


                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" name="last_name" placeholder="Last Name" id="last_name" value="{{old('last_name')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                            @error('last_name')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Email ID <span class="text-danger">*</span></label>

                                            <input type="email" placeholder="Email" name="email" id="email" value="{{old('email')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                            @error('email')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Phone Number <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" placeholder="Phone Number" id="phone" value="{{old('phone')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                            @error('phone')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Constituency <span class="text-danger">*</span></label>
                                            <input type="text" name="constituency" id="constituency" placeholder="Select Constituency" value="{{old('constituency')}}" class="form-control" required="" aria-required="true" style="color: black; font-weight: 400;">
                                            <div id="constituency-results" class="hidden" style="position: absolute; z-index: 1000; background-color: white; border: 1px solid #ccc;  border-radius: 5px;"></div>
                                            @error('constituency')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                    <button type="submit" class="boxed-btn btn-sanatory"> Continue<span class="icon-paper-plan"></span></button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('constituency').addEventListener('input', function() {
            let constituencyName = this.value.trim();
            let resultsContainer = document.getElementById('constituency-results');

            if (constituencyName.length < 2) { // Avoid unnecessary API calls for short inputs
                resultsContainer.innerHTML = '';
                resultsContainer.classList.add('hidden');
                return;
            }

            fetch(`/constituencies/name/${constituencyName}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = '';
                    if (data.length > 0) {
                        resultsContainer.classList.remove('hidden');
                        data.forEach(constituency => {
                            let div = document.createElement('div');
                            div.classList.add('px-4', 'py-2', 'hover:bg-gray-100');
                            div.textContent = `${constituency.name} (${constituency.code})`;
                            div.addEventListener('click', function() {
                                document.getElementById('constituency').value = constituency.name;
                                resultsContainer.classList.add('hidden');
                                document.getElementById('constituency-results').innerHTML = '';
                            });
                            resultsContainer.appendChild(div);
                        });
                    } else {
                        resultsContainer.classList.add('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error fetching constituencies:', error);
                    resultsContainer.classList.add('hidden');
                });
        });
    </script>
    @endpush
</x-front.layout>