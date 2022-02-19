@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-success border-success">
                <div class="card-body ">
                    <h3 class="text-white">Welcome <b>{{ Auth::user()->name }}</b>.</h3>
                    <p class="text-white">You are logged in!</p>
                </div>
            </div>
            <div class="card bg-danger border-danger">
                <div class="card-body text-white">
                    You are using Invoice BD <strong>Basic Package</strong>. <button class="btn btn-primary">Upgrade
                        Now</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-success border-success text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">My Balance</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-secondary border-secondary text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Total Orders</h5>
                            <h4 class="mb-3 text-white">
                                <span class="counter-value text-white" data-target="{{ $orders }}">0</span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-secondary border-secondary text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Total Shop</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="{{ $shop }}">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-secondary border-secondary text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Total Products</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="{{ $product }}">0</span>k
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-secondary border-secondary text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Total Customers</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="{{ $customer }}">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-secondary border-secondary text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">SMS Balance</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary border-primary text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Today Orders</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-success border-success text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Processing</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-info border-info text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">On hold</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary border-primary text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Completed</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-danger border-danger text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Cancelled</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-warning border-warning text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Shipped</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary border-primary text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Delivered</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-danger border-danger text-white-50">
                        <div class="card-body">
                            <h5 class="mb-3 text-white">Returned</h5>
                            <h4 class="mb-3 text-white">
                                $<span class="counter-value text-white" data-target="865.2">0</span>k
                            </h4>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection
