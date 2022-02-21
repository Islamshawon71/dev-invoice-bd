@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Start your creative project right plans</h4>
                <div class="flex-shrink-0 align-self-end">
                    <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded monthly" id="monthly" data-bs-toggle="pill" href="#month" role="tab" aria-controls="month" aria-selected="false">Monthly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded yearly active" id="yearly" data-bs-toggle="pill" href="#year" role="tab" aria-controls="year" aria-selected="true">Yearly</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="monthly">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card mb-xl-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <h5 class="font-size-16">Starter</h5>
                                            <h1 class="mt-3">$29 <span class="text-muted font-size-16 fw-medium">/ Month</span></h1>
                                            <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited
                                                period of time</p>
                                            <div class="mt-4 pt-2 text-muted">
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                    work and
                                                    reviews</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                    tracking
                                                </p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <a href="#" class="btn btn-outline-primary w-100">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card mb-xl-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <h5 class="font-size-16">Professional</h5>
                                            <h1 class="mt-3">$49 <span class="text-muted font-size-16 fw-medium">/ Month</span></h1>
                                            <p class="text-muted mt-3 font-size-15">For larger businesses or those with onal administration needs</p>
                                            <div class="mt-4 pt-2 text-muted">
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                    work and
                                                    reviews</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                    tracking
                                                </p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <a href="#" class="btn btn-outline-primary w-100">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-primary mb-xl-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <div class="pricing-badge">
                                                <span class="badge">Featured</span>
                                            </div>
                                            <h5 class="font-size-16 text-white">Enterprise</h5>
                                            <h1 class="mt-3 text-white">$79 <span class="text-white font-size-16 fw-medium">/ Month</span></h1>
                                            <p class="text-white-50 mt-3 font-size-15">For extra large businesses or those in regulated industries</p>
                                            <div class="mt-4 pt-2 text-white">
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Verifide
                                                    work and
                                                    reviews</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Project
                                                    tracking
                                                </p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <a href="#" class="btn btn-light w-100">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <h5 class="font-size-16">Unlimited</h5>
                                            <h1 class="mt-3">$99 <span class="text-muted font-size-16 fw-medium">/ Month</span></h1>
                                            <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited
                                                period of time</p>
                                            <div class="mt-4 pt-2 text-muted">
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                    work and
                                                    reviews</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                    tracking
                                                </p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <a href="#" class="btn btn-outline-primary w-100">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane fade active show" id="year" role="tabpanel" aria-labelledby="yearly">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <h5 class="font-size-16">Starter</h5>
                                            <h1 class="mt-3">$129 <span class="text-muted font-size-16 fw-medium">/ Yearly</span></h1>
                                            <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited
                                                period of time</p>
                                            <div class="mt-4 pt-2 text-muted">
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                    work and
                                                    reviews</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                    tracking
                                                </p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <a href="#" class="btn btn-outline-primary w-100">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <h5 class="font-size-16">Professional</h5>
                                            <h1 class="mt-3">$149 <span class="text-muted font-size-16 fw-medium">/ Yearly</span></h1>
                                            <p class="text-muted mt-3 font-size-15">For larger businesses or those with onal administration needs</p>
                                            <div class="mt-4 pt-2 text-muted">
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                    work and
                                                    reviews</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                    tracking
                                                </p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <a href="#" class="btn btn-outline-primary w-100">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3">
                                <div class="card bg-primary mb-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <div class="pricing-badge">
                                                <span class="badge">Featured</span>
                                            </div>
                                            <h5 class="font-size-16 text-white">Enterprise</h5>
                                            <h1 class="mt-3 text-white">$179 <span class="text-white font-size-16 fw-medium">/ Yearly</span></h1>
                                            <p class="text-white-50 mt-3 font-size-15">For extra large businesses or those in regulated industries</p>
                                            <div class="mt-4 pt-2 text-white">
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Verifide
                                                    work and
                                                    reviews</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Project
                                                    tracking
                                                </p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <a href="#" class="btn btn-light w-100">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <h5 class="font-size-16">Unlimited</h5>
                                            <h1 class="mt-3">$199 <span class="text-muted font-size-16 fw-medium">/ Yearly</span></h1>
                                            <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited
                                                period of time</p>
                                            <div class="mt-4 pt-2 text-muted">
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                    work and
                                                    reviews</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                    tracking
                                                </p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                    Ac managers</p>
                                                <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                    proposals</p>
                                            </div>

                                            <div class="mt-4 pt-2">
                                                <a href="#" class="btn btn-outline-primary w-100">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </div>
                    <!-- end tab pane -->
                </div>
                <!-- end tab content -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

@endsection
@section('scripts')
    @parent

@endsection
