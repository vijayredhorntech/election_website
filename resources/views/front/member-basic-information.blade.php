<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
    </style>
    @endpush

    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">Basic Information</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('joinUs')}}">Basic Information</a></li>
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
                                <h6 class="subtitle">Tell Us More About Your Self</h6>
                                <p class="description style-01">
                                    Join hundreds of thousands of party members as we fix the foundations and rebuild UK.
                                </p>

                                @if(session('error'))
                                <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                                @endif @if(session('success'))
                                <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="contact-form style-01">
                            <form action="{{route('storeMemberBasicInformation')}}" enctype="multipart/form-data" method="post" class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Profile Photo </label>
                                            <input type="file" name="profile_photo" accept="image/jpeg, image/png, image/jpg" id="profile_photo" class="form-control" required>
                                            @error('profile_photo')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            <span id="file-error" style="color: red; font-weight: 500; display: none;">Invalid file type. Please select a valid image.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Title <span class="text-danger">*</span></label>
                                            <select class="form-control" name="title" required>
                                                <option value="">Select title</option>
                                                <option value="MR." {{ (old('title', $data->title ?? '') == 'MR.') ? 'selected' : '' }}>MR.</option>
                                                <option value="MRS." {{ (old('title', $data->title ?? '') == 'MRS.') ? 'selected' : '' }}>MRS.</option>
                                                <option value="MISS" {{ (old('title', $data->title ?? '') == 'MISS') ? 'selected' : '' }}>MISS</option>
                                                <option value="DR." {{ (old('title', $data->title ?? '') == 'DR.') ? 'selected' : '' }}>DR.</option>
                                                <option value="MS." {{ (old('title', $data->title ?? '') == 'MS.') ? 'selected' : '' }}>MS.</option>
                                                <option value="PROF." {{ (old('title', $data->title ?? '') == 'PROF.') ? 'selected' : '' }}>PROF.</option>
                                                <option value="OTHER" {{ (old('title', $data->title ?? '') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                            </select>
                                            @error('title')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date"
                                                id="dob"
                                                name="dob"
                                                value="{{old('dob')}}"
                                                class="form-control"
                                                required>
                                            @error('dob')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            <span id="dob-error" style="color: red; font-weight: 500; display: none;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Gender <span class="text-danger">*</span></label>
                                            <select name="gender" class="form-control" required>
                                                <option value="">Select Gender</option>
                                                <option value="MALE" {{ (old('gender') == 'MALE') ? 'selected' : '' }}>MALE</option>
                                                <option value="FEMALE" {{ (old('gender') == 'FEMALE') ? 'selected' : '' }}>FEMALE</option>
                                                <option value="OTHER" {{ (old('gender') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                            </select>
                                            @error('gender')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Marital Status </label>
                                            <select name="marital_status" class="form-control" required>
                                                <option value="">Select Marital Status</option>
                                                <option value="SINGLE" {{ (old('marital_status') == 'SINGLE') ? 'selected' : '' }}>SINGLE</option>
                                                <option value="MARRIED" {{ (old('marital_status') == 'MARRIED') ? 'selected' : '' }}>MARRIED</option>
                                                <option value="DIVORCED" {{ (old('marital_status') == 'DIVORCED') ? 'selected' : '' }}>DIVORCED</option>
                                                <option value="WIDOWED" {{ (old('marital_status') == 'WIDOWED') ? 'selected' : '' }}>WIDOWED</option>
                                                <option value="OTHER" {{ (old('marital_status') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                            </select>
                                            @error('marital_status')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Qualification </label>
                                            <select name="qualification" class="form-control" required>
                                                <option value="">Select Qualification</option>
                                                <option value="PRIMARY" {{ (old('qualification') == 'PRIMARY') ? 'selected' : '' }}>PRIMARY</option>
                                                <option value="SECONDARY" {{ (old('qualification') == 'SECONDARY') ? 'selected' : '' }}>SECONDARY</option>
                                                <option value="HIGHER SECONDARY" {{ (old('qualification') == 'HIGHER SECONDARY') ? 'selected' : '' }}>HIGHER SECONDARY</option>
                                                <option value="GRADUATE" {{ (old('qualification') == 'GRADUATE') ? 'selected' : '' }}>GRADUATE</option>
                                                <option value="POST GRADUATE" {{ (old('qualification') == 'POST GRADUATE') ? 'selected' : '' }}>POST GRADUATE</option>
                                                <option value="DOCTORATE" {{ (old('qualification') == 'DOCTORATE') ? 'selected' : '' }}>DOCTORATE</option>
                                                <option value="OTHER" {{ (old('qualification') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                            </select>
                                            @error('qualification')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Profession</label>
                                            <select name="profession" class="form-control" required>
                                                <option value="">Select Profession</option>
                                                <option value="STUDENT" {{ (old('profession') == 'STUDENT') ? 'selected' : '' }}>STUDENT</option>
                                                <option value="EMPLOYEE" {{ (old('profession') == 'EMPLOYEE') ? 'selected' : '' }}>EMPLOYEE</option>
                                                <option value="BUSINESS" {{ (old('profession') == 'BUSINESS') ? 'selected' : '' }}>BUSINESS</option>
                                                <option value="SELF EMPLOYED" {{ (old('profession') == 'SELF EMPLOYED') ? 'selected' : '' }}>SELF EMPLOYED</option>
                                                <option value="HOUSEWIFE" {{ (old('profession') == 'HOUSEWIFE') ? 'selected' : '' }}>HOUSEWIFE</option>
                                                <option value="RETIRED" {{ (old('profession') == 'RETIRED') ? 'selected' : '' }}>RETIRED</option>
                                                <option value="LAWYER" {{ (old('profession') == 'LAWYER') ? 'selected' : '' }}>LAWYER</option>
                                                <option value="DOCTOR" {{ (old('profession') == 'DOCTOR') ? 'selected' : '' }}>DOCTOR</option>
                                                <option value="TEACHER" {{ (old('profession') == 'TEACHER') ? 'selected' : '' }}>TEACHER</option>
                                                <option value="OTHER" {{ (old('profession') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                            </select>
                                            @error('profession')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">National Insurance Number <span class="text-danger">*</span></label>
                                            <input type="text" name="national_insurance_number" placeholder="QQ123456B" value="{{old('national_insurance_number')}}" class="form-control" required>
                                            @error('national_insurance_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Primary Mobile Number <span class="text-danger">*</span></label>
                                            <input type="number" name="primary_mobile_number" placeholder="Enter Mobile Number" value="{{old('primary_mobile_number')}}" class="form-control" required>
                                            @error('primary_mobile_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Alternate Mobile Number</label>
                                            <input type="number" name="alternate_mobile_number" placeholder="Enter Mobile Number" value="{{old('alternate_mobile_number')}}" class="form-control">
                                            @error('alternate_mobile_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                    <button type="submit" class="boxed-btn btn-sanatory"> Save basic informations <span class="icon-paper-plan"></span></button>
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
        // Existing file validation
        document.getElementById('profile_photo').addEventListener('change', function() {
            const file = this.files[0];
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            const errorSpan = document.getElementById('file-error');

            if (file) {
                if (!allowedTypes.includes(file.type)) {
                    errorSpan.style.display = 'block';
                    this.value = '';
                } else {
                    errorSpan.style.display = 'none';
                }
            }
        });


        document.addEventListener('DOMContentLoaded', function() {
            const dobInput = document.getElementById('dob');
            const dobError = document.getElementById('dob-error');


            const today = new Date();


            const maxDate = new Date();
            maxDate.setFullYear(today.getFullYear() - 16);
            dobInput.max = maxDate.toISOString().split('T')[0];

            const minDate = new Date();
            minDate.setFullYear(today.getFullYear() - 120);
            dobInput.min = minDate.toISOString().split('T')[0];


            dobInput.addEventListener('blur', function() {
                if (!this.value) return;

                const selectedDate = new Date(this.value);


                if (selectedDate > today) {
                    dobError.textContent = 'Date of birth cannot be in the future';
                    dobError.style.display = 'block';
                    this.value = '';
                    return;
                }


                let age = today.getFullYear() - selectedDate.getFullYear();
                const m = today.getMonth() - selectedDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < selectedDate.getDate())) {
                    age--;
                }

                // Validate age
                if (age < 16) {
                    dobError.textContent = 'You must be at least 16 years old to register';
                    dobError.style.display = 'block';
                    this.value = '';
                } else if (age > 120) {
                    dobError.textContent = 'Please enter a valid date of birth';
                    dobError.style.display = 'block';
                    this.value = '';
                } else {
                    dobError.style.display = 'none';
                }
            });
        });
        // Add this code just after the DOB validation code in the DOMContentLoaded event listener

        // document.addEventListener('DOMContentLoaded', function() {
        //     // Get the NINO input element
        //     const ninoInput = document.querySelector('input[name="national_insurance_number"]');

        //     // Create error span if it doesn't exist
        //     let ninoError = ninoInput.parentNode.querySelector('.nino-error');
        //     if (!ninoError) {
        //         ninoError = document.createElement('span');
        //         ninoError.className = 'nino-error';
        //         ninoError.style.color = 'orangered';
        //         ninoError.style.fontWeight = '500';
        //         ninoError.style.display = 'none';
        //         ninoInput.parentNode.appendChild(ninoError);
        //     }

        //     // NINO validation regex
        //     const ninoPattern = /^[A-CEGHJ-PR-TW-Z][A-CEGHJ-NPR-TW-Z][0-9]{6}[A-D]$/i;

        //     // Format the NINO as user types
        //     ninoInput.addEventListener('input', function(e) {
        //         // Remove any spaces and convert to uppercase
        //         let value = this.value.replace(/\s/g, '').toUpperCase();

        //         // Remove any invalid characters
        //         value = value.replace(/[^A-Z0-9]/g, '');

        //         // Check if the input matches the pattern
        //         if (value.length > 0) {
        //             if (!ninoPattern.test(value)) {
        //                 ninoError.textContent = 'Invalid format. Example: QQ123456C';
        //                 ninoError.style.display = 'block';
        //             } else {
        //                 ninoError.style.display = 'none';
        //             }
        //         } else {
        //             ninoError.style.display = 'none';
        //         }

        //         // Update the input value
        //         this.value = value;
        //     });

        //     // Add validation to form submit
        //     const form = document.querySelector('form.contact-page-form');
        //     if (form) {
        //         const originalSubmitHandler = form.onsubmit;
        //         form.onsubmit = function(event) {
        //             const nino = ninoInput.value.replace(/\s/g, '').toUpperCase();

        //             if (nino && !ninoPattern.test(nino)) {
        //                 event.preventDefault();
        //                 ninoError.textContent = 'Please enter a valid National Insurance Number';
        //                 ninoError.style.display = 'block';
        //                 return false;
        //             }

        //             // Call the original submit handler if it exists
        //             if (originalSubmitHandler) {
        //                 return originalSubmitHandler.call(this, event);
        //             }
        //         };
        //     }
        // });
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Get phone input elements
        //     const primaryPhone = document.querySelector('input[name="primary_mobile_number"]');
        //     const alternatePhone = document.querySelector('input[name="alternate_mobile_number"]');

        //     // Country phone pattern definitions
        //     const phonePatterns = {
        //         'US': {
        //             pattern: /^\d{10}$/,
        //             example: '(555) 123-4567'
        //         },
        //         'GB': {
        //             pattern: /^\d{10,11}$/,
        //             example: '07700 900123'
        //         },
        //         'IN': {
        //             pattern: /^\d{10}$/,
        //             example: '9876543210'
        //         },
        //         'CA': {
        //             pattern: /^\d{10}$/,
        //             example: '(416) 555-1234'
        //         },
        //         'AU': {
        //             pattern: /^\d{9,10}$/,
        //             example: '0412 345 678'
        //         },
        //         'DEFAULT': {
        //             pattern: /^\d{6,15}$/,
        //             example: '6-15 digits'
        //         }
        //     };

        //     // Fetch countries from REST Countries API
        //     fetch('https://restcountries.com/v3.1/all?fields=name,idd,cca2,flags')
        //         .then(response => response.json())
        //         .then(countries => {
        //             // First, find and move UK to the beginning of the array
        //             const ukIndex = countries.findIndex(country => country.cca2 === 'GB');
        //             if (ukIndex !== -1) {
        //                 const uk = countries.splice(ukIndex, 1)[0];
        //                 countries.unshift(uk);
        //             }

        //             // Then sort the rest of the countries
        //             const sortedCountries = [
        //                 countries[0],
        //                 ...countries.slice(1).sort((a, b) => a.name.common.localeCompare(b.name.common))
        //             ];

        //             // Create dropdowns
        //             createCountryDropdown(primaryPhone, 'primary_country_code', sortedCountries, true);
        //             if (alternatePhone) {
        //                 createCountryDropdown(alternatePhone, 'alternate_country_code', sortedCountries, false);
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error fetching countries:', error);
        //             // Fallback to basic country list with UK first
        //             const fallbackCountries = [{
        //                     cca2: 'GB',
        //                     name: {
        //                         common: 'United Kingdom'
        //                     },
        //                     idd: {
        //                         root: '+44',
        //                         suffixes: ['']
        //                     }
        //                 },
        //                 {
        //                     cca2: 'US',
        //                     name: {
        //                         common: 'United States'
        //                     },
        //                     idd: {
        //                         root: '+1',
        //                         suffixes: ['']
        //                     }
        //                 },
        //                 {
        //                     cca2: 'IN',
        //                     name: {
        //                         common: 'India'
        //                     },
        //                     idd: {
        //                         root: '+91',
        //                         suffixes: ['']
        //                     }
        //                 },
        //                 {
        //                     cca2: 'CA',
        //                     name: {
        //                         common: 'Canada'
        //                     },
        //                     idd: {
        //                         root: '+1',
        //                         suffixes: ['']
        //                     }
        //                 },
        //                 {
        //                     cca2: 'AU',
        //                     name: {
        //                         common: 'Australia'
        //                     },
        //                     idd: {
        //                         root: '+61',
        //                         suffixes: ['']
        //                     }
        //                 }
        //             ];

        //             createCountryDropdown(primaryPhone, 'primary_country_code', fallbackCountries, true);
        //             if (alternatePhone) {
        //                 createCountryDropdown(alternatePhone, 'alternate_country_code', fallbackCountries, false);
        //             }
        //         });

        //     // Function to create country dropdown before a phone input
        //     function createCountryDropdown(phoneInput, fieldName, countries, isRequired) {
        //         // Create container div
        //         const container = document.createElement('div');
        //         container.className = 'input-group';

        //         // Create select element for country code
        //         const select = document.createElement('select');
        //         select.className = 'form-control country-select';
        //         select.name = fieldName;
        //         select.style.maxWidth = '120px';
        //         select.style.flex = '0 0 120px';
        //         if (isRequired) select.required = true;

        //         // Add default option
        //         const defaultOption = document.createElement('option');
        //         defaultOption.value = '';
        //         defaultOption.textContent = 'Select Code';
        //         select.appendChild(defaultOption);

        //         // Add country options
        //         countries.forEach((country, index) => {
        //             // Skip countries without phone codes
        //             if (!country.idd || !country.idd.root) return;

        //             const dialCode = country.idd.root + (country.idd.suffixes && country.idd.suffixes[0] ? country.idd.suffixes[0] : '');

        //             const option = document.createElement('option');
        //             option.value = country.cca2;

        //             // Format option text to be compact
        //             option.textContent = `${dialCode} ${country.name.common.length > 12 ? 
        //         country.name.common.substring(0, 10) + '...' : 
        //         country.name.common}`;

        //             option.setAttribute('data-dial-code', dialCode);
        //             option.setAttribute('title', `${country.name.common} (${dialCode})`);
        //             select.appendChild(option);

        //             // Set UK as selected by default
        //             if (country.cca2 === 'GB') {
        //                 option.selected = true;
        //             }
        //         });

        //         // Custom styling for a more compact look
        //         select.style.fontSize = '0.85rem';
        //         select.style.paddingLeft = '4px';
        //         select.style.paddingRight = '4px';
        //         select.style.backgroundColor = '#f8f9fa';
        //         select.style.borderTopRightRadius = '0';
        //         select.style.borderBottomRightRadius = '0';
        //         select.style.borderRight = 'none';

        //         // Update phone input attributes
        //         phoneInput.placeholder = 'Enter phone number';
        //         phoneInput.maxLength = 15;
        //         phoneInput.style.borderTopLeftRadius = '0';
        //         phoneInput.style.borderBottomLeftRadius = '0';

        //         // Add error message element
        //         const errorMessage = document.createElement('span');
        //         errorMessage.style.color = 'orangered';
        //         errorMessage.style.fontWeight = '500';
        //         errorMessage.style.display = 'none';
        //         errorMessage.className = 'phone-error';


        //         const phoneParent = phoneInput.parentNode;
        //         phoneInput.remove();

        //         container.appendChild(select);
        //         container.appendChild(phoneInput);
        //         phoneParent.appendChild(container);
        //         phoneParent.appendChild(errorMessage);


        //         select.addEventListener('change', function() {
        //             validatePhoneNumber(phoneInput, this.value, errorMessage);
        //         });

        //         phoneInput.addEventListener('input', function() {

        //             this.value = this.value.replace(/\D/g, '');


        //             if (this.value.length > 15) {
        //                 this.value = this.value.slice(0, 15);
        //             }

        //             validatePhoneNumber(this, select.value, errorMessage);
        //         });

        //         phoneInput.addEventListener('blur', function() {
        //             validatePhoneNumber(this, select.value, errorMessage);
        //         });

        //         // Trigger initial validation for UK
        //         validatePhoneNumber(phoneInput, 'GB', errorMessage);
        //     }


        //     function validatePhoneNumber(phoneInput, countryCode, errorElement) {
        //         // Skip validation if empty and not required
        //         if (!phoneInput.value && !phoneInput.required) {
        //             errorElement.style.display = 'none';
        //             return true;
        //         }


        //         if (countryCode && !phoneInput.value && phoneInput.required) {
        //             errorElement.textContent = 'Phone number is required';
        //             errorElement.style.display = 'block';
        //             return false;
        //         }
        //         error

        //         if (phoneInput.value && !countryCode) {
        //             errorElement.textContent = 'Please select a country code';
        //             errorElement.style.display = 'block';
        //             return false;
        //         }


        //         if (phoneInput.value && countryCode) {

        //             const patternObj = phonePatterns[countryCode] || phonePatterns['DEFAULT'];

        //             if (!patternObj.pattern.test(phoneInput.value)) {
        //                 errorElement.textContent = `Invalid format. Example: ${patternObj.example}`;
        //                 errorElement.style.display = 'block';
        //                 return false;
        //             }
        //         }


        //         errorElement.style.display = 'none';
        //         return true;
        //     }


        //     const form = document.querySelector('form.contact-page-form');
        //     if (form) {
        //         form.addEventListener('submit', function(event) {

        //             const primarySelect = document.querySelector('select[name="primary_country_code"]');
        //             const primaryError = primaryPhone.parentNode.parentNode.querySelector('.phone-error');
        //             const primaryValid = validatePhoneNumber(primaryPhone, primarySelect.value, primaryError);


        //             let alternateValid = true;
        //             if (alternatePhone && alternatePhone.value) {
        //                 const alternateSelect = document.querySelector('select[name="alternate_country_code"]');
        //                 const alternateError = alternatePhone.parentNode.parentNode.querySelector('.phone-error');
        //                 alternateValid = validatePhoneNumber(alternatePhone, alternateSelect.value, alternateError);
        //             }


        //             if (!primaryValid || !alternateValid) {
        //                 event.preventDefault();
        //             }
        //         });
        //     }
        // });
    </script>
    @endpush

</x-front.layout>