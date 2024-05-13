@extends('Layouts.Client')
@section('Main')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Thông Tin</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Thông Tin</a>
                </nav>
            </div>
        </div>
    </div>
</section>
@livewire('profile-user')
@endsection