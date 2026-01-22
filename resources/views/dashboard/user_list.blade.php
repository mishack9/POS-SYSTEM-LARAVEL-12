@extends('layouts.app')



@section('contenet')



    <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                              <a href="{{ url('user/transaction/index') }}">
                                <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Wallet</span>
                                    <span class="info-box-number">
                                        {{ !empty($user_data->wallet) ? number_format($user_data->wallet, 2) : '0' }}
                                        <small></small>
                                    </span>
                                </div>

                            </div>
                              </a>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <a href="{{ url('user/list/transaction') }}">
                                <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fa-spinner"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pending Payment</span>
                                    <span class="info-box-number">{{ !empty($pending_payment) ? number_format($pending_payment, 2) : '0' }}</span>
                                </div>

                            </div>
                            </a>
                        </div>


                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <a href="{{ url('user/list/transaction') }}">
                                <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Completed payment</span>
                                    <span class="info-box-number">{{ !empty($completed_payment) ? number_format($completed_payment, 2) : '0' }}</span>
                                </div>

                            </div>
                            </a>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">New Members</span>
                                    <span class="info-box-number">2,000</span>
                                </div>

                            </div>

                        </div>

                    </div>





                </div>
            </section>

        </div>


        <aside class="control-sidebar control-sidebar-dark">

        </aside>




    
@endsection

       