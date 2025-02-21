<!DOCTYPE html>
<html>

<head>
    <style>
        /* Copy all styles from index.html */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        /* ... rest of the styles ... */
    </style>
</head>

<body>
    <div class="card">
        <div class="background-pattern"></div>
        <div class="header">
            <div class="headerTitle">Member of The One Nation Party</div>
            <div class="logo">
                <img src="{{ public_path('assets/images/logo.png') }}" alt="One Nation Logo" />
            </div>
        </div>
        <div class="content">
            <div class="photo">
                <img src="{{ $member->profile_photo ? public_path('storage/' . $member->profile_photo) : public_path('assets/images/default-profile.png') }}"
                    alt="Member Photo" />
            </div>
            <div class="details">
                <div class="field">
                    <span class="field-label">Name:</span>
                    {{ $member->title }} {{ $member->first_name }} {{ $member->last_name }}
                </div>
                <div class="field">
                    <span class="field-label">Member ID:</span>
                    {{ $member->custom_id }}
                </div>
                <div class="field">
                    <span class="field-label">Issue Date:</span>
                    {{ \Carbon\Carbon::parse($member->enrollment_date)->format('d-m-Y') }}
                </div>
                <div class="field">
                    <span class="field-label">Constituency:</span>
                    {{ $member->constituency->name }}
                </div>
                <div class="field">
                    <span class="field-label">Website:</span>
                    One-Nation.org.uk
                </div>
                <div class="hq-number">HQ Number: +44 755555561</div>
                <div class="barcode">
                    {!! QrCode::size(150)->generate(route('index') . '/member/' . $member->custom_id) !!}
                </div>
            </div>
        </div>
    </div>
</body>

</html>