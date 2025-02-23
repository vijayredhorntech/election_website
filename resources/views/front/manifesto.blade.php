@extends('layouts.front')

@section('content')
<section class="manifesto-hero" style="background-image: url({{ asset('assets/images/manifesto-bg.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <h1>Our Manifesto</h1>
                <p class="lead">Building a Better Britain for Everyone</p>
            </div>
        </div>
    </div>
</section>

<section class="manifesto-content py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="manifesto-section">
                    <h2>Our Vision for Britain</h2>
                    <p>One Nation is committed to building a stronger, fairer, and more united Britain where every community has a voice and opportunity to thrive.</p>
                    
                    <div class="key-points mt-4">
                        <h3>Key Commitments</h3>
                        <div class="point-card">
                            <h4>Justice & Representation</h4>
                            <ul>
                                <li>Ensuring fair political representation for all communities</li>
                                <li>Addressing systemic inequalities</li>
                                <li>Supporting legal rights and access to justice</li>
                            </ul>
                        </div>

                        <div class="point-card">
                            <h4>Economic Growth</h4>
                            <ul>
                                <li>Supporting British businesses and workers</li>
                                <li>Fair taxation policies</li>
                                <li>Job creation and skills development</li>
                            </ul>
                        </div>

                        <div class="point-card">
                            <h4>Immigration & Border Control</h4>
                            <ul>
                                <li>Strong but fair immigration system</li>
                                <li>Protecting British sovereignty</li>
                                <li>Supporting legal migration that benefits Britain</li>
                            </ul>
                        </div>

                        <div class="point-card">
                            <h4>Welfare Reform</h4>
                            <ul>
                                <li>Ensuring benefits reach those in genuine need</li>
                                <li>Preventing abuse of public funds</li>
                                <li>Supporting vulnerable communities</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.manifesto-hero {
    padding: 100px 0;
    background-size: cover;
    background-position: center;
    color: white;
    position: relative;
}

.manifesto-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
}

.manifesto-section {
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.point-card {
    border-left: 4px solid #c41e3a;
    padding: 20px;
    margin: 20px 0;
    background: #f8f9fa;
    border-radius: 0 10px 10px 0;
}

.point-card h4 {
    color: #c41e3a;
    margin-bottom: 15px;
}

.point-card ul {
    list-style: none;
    padding-left: 20px;
}

.point-card ul li {
    position: relative;
    padding: 5px 0;
    padding-left: 20px;
}

.point-card ul li::before {
    content: '→';
    position: absolute;
    left: 0;
    color: #c41e3a;
}
</style>
@endpush 