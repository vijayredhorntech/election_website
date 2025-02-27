<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Account Settings</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="titles-tab" data-toggle="tab" href="#titles" role="tab">Titles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="countries-tab" data-toggle="tab" href="#countries" role="tab">Countries</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="counties-tab" data-toggle="tab" href="#counties" role="tab">Counties</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="constituencies-tab" data-toggle="tab" href="#constituencies" role="tab">Constituencies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="professions-tab" data-toggle="tab" href="#professions" role="tab">Professions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab">Education</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-4" id="settingsTabContent">
                            <!-- Titles Tab -->
                            <div class="tab-pane fade show active" id="titles" role="tabpanel">
                                <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addTitleModal">Add Title</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($titles as $title)
                                            <tr>
                                                <td>{{ $title->name }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info edit-title" data-id="{{ $title->id }}" data-name="{{ $title->name }}">Edit</button>
                                                    <form action="{{ route('settings.titles.destroy', $title->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Countries Tab -->
                            <div class="tab-pane fade" id="countries" role="tabpanel">
                                <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addCountryModal">Add Country</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($countries as $country)
                                            <tr>
                                                <td>{{ $country->name }}</td>
                                                <td>{{ $country->code }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info edit-country" 
                                                        data-id="{{ $country->id }}" 
                                                        data-name="{{ $country->name }}"
                                                        data-code="{{ $country->code }}">Edit</button>
                                                    <form action="{{ route('settings.countries.destroy', $country->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Counties Tab -->
                            <div class="tab-pane fade" id="counties" role="tabpanel">
                                <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addCountyModal">Add County</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Country</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($counties as $county)
                                            <tr>
                                                <td>{{ $county->name }}</td>
                                                <td>{{ $county->country ? $county->country->name : 'N/A' }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info edit-county" 
                                                        data-id="{{ $county->id }}" 
                                                        data-name="{{ $county->name }}"
                                                        data-country="{{ $county->country_id }}">Edit</button>
                                                    <form action="{{ route('settings.counties.destroy', $county->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Constituencies Tab -->
                            <div class="tab-pane fade" id="constituencies" role="tabpanel">
                                <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addConstituencyModal">Add Constituency</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>County</th>
                                                <th>Country</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($constituencies as $constituency)
                                            <tr>
                                                <td>{{ $constituency->name }}</td>
                                                <td>{{ $constituency->county ? $constituency->county->name : 'N/A' }}</td>
                                                <td>{{ $constituency->country ? $constituency->country->name : 'N/A' }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info edit-constituency" 
                                                        data-id="{{ $constituency->id }}" 
                                                        data-name="{{ $constituency->name }}"
                                                        data-county="{{ $constituency->county_id }}"
                                                        data-country="{{ $constituency->country_id }}">Edit</button>
                                                    <form action="{{ route('settings.constituencies.destroy', $constituency->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Professions Tab -->
                            <div class="tab-pane fade" id="professions" role="tabpanel">
                                <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addProfessionModal">Add Profession</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($professions as $profession)
                                            <tr>
                                                <td>{{ $profession->name }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info edit-profession" 
                                                        data-id="{{ $profession->id }}" 
                                                        data-name="{{ $profession->name }}">Edit</button>
                                                    <form action="{{ route('settings.professions.destroy', $profession->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Education Tab -->
                            <div class="tab-pane fade" id="education" role="tabpanel">
                                <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addEducationModal">Add Education Level</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($educations as $education)
                                            <tr>
                                                <td>{{ $education->name }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info edit-education" 
                                                        data-id="{{ $education->id }}" 
                                                        data-name="{{ $education->name }}">Edit</button>
                                                    <form action="{{ route('settings.education.destroy', $education->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Modals for each section -->
    @include('admin.settings.modals.title')
    @include('admin.settings.modals.country')
    @include('admin.settings.modals.county')
    @include('admin.settings.modals.constituency')
    @include('admin.settings.modals.profession')
    @include('admin.settings.modals.education')

    @push('scripts')
    <script>
    $(document).ready(function() {
        // Handle edit buttons for each section
        $('.edit-title, .edit-country, .edit-county, .edit-constituency, .edit-profession, .edit-education').click(function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const modalId = '#edit' + $(this).attr('class').split(' ')[2].charAt(5).toUpperCase() + $(this).attr('class').split(' ')[2].slice(6) + 'Modal';
            const formAction = $(this).closest('tr').find('form').attr('action').replace('destroy', 'update');
            
            $(modalId + ' form').attr('action', formAction);
            $(modalId + ' input[name="name"]').val(name);
            
            if($(this).data('code')) {
                $(modalId + ' input[name="code"]').val($(this).data('code'));
            }
            if($(this).data('country')) {
                $(modalId + ' select[name="country_id"]').val($(this).data('country'));
            }
            if($(this).data('county')) {
                $(modalId + ' select[name="county_id"]').val($(this).data('county'));
            }
            
            $(modalId).modal('show');
        });

        // Dynamic county loading based on country selection
        $('select[name="country_id"]').change(function() {
            const countryId = $(this).val();
            const countySelect = $(this).closest('.modal-body').find('select[name="county_id"]');
            
            if(countryId) {
                $.get(`/admin/settings/counties/by-country/${countryId}`, function(data) {
                    countySelect.empty();
                    countySelect.append('<option value="">Select County</option>');
                    $.each(data, function(key, value) {
                        countySelect.append(new Option(value.name, value.id));
                    });
                });
            } else {
                countySelect.empty();
                countySelect.append('<option value="">Select County</option>');
            }
        });
    });
    </script>
    @endpush
</x-app-layout> 