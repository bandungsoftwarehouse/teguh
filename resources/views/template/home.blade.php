@extends('layouts.app')

@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Blank Page</h3>
        <div class="row mt">
            <div class="col-lg-12">
                    {{-- <div class="card">
                            <div class="card-header">Dashboard</div>
            
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            selamat
                                You are logged in!
                            </div>
                        </div> --}}
            </div>
        </div>
    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
{{--   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
selamat
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
