@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="card-title mb-0 flex-grow-1">আপনার পছন্দের প্লানটি বেছে নিন! </h4>
                <div class="flex-shrink-0 align-self-end">
                    <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded monthly active" id="monthly" data-bs-toggle="pill" href="#month" role="tab" aria-controls="month" aria-selected="false">মাসিক</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded yearly " id="yearly" data-bs-toggle="pill" href="#year" role="tab" aria-controls="year" aria-selected="true">বাৎসরিক</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="month" role="tabpanel" aria-labelledby="monthly">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card mb-xl-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <h5 class="font-size-16">পরিচিতি</h5>
                                            <h1 class="mt-3">ফ্রী <span class="text-muted font-size-16 fw-medium">/ মাস</span></h1>
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
                                                <a href="#" class="btn btn-outline-primary w-100">বাছাই করি</a>
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
                                            <h5 class="font-size-16">ছোট দোকান</h5>
                                            <h1 class="mt-3">১০০ <span class="text-muted font-size-16 fw-medium">/ মাস</span></h1>
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
                                                <a href="#" class="btn btn-outline-primary w-100">বাছাই করি</a>
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
                                            <h5 class="font-size-16 text-white">বড় দোকান</h5>
                                            <h1 class="mt-3 text-white">৫০০ <span class="text-white font-size-16 fw-medium">/ মাস</span></h1>
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
                                                <a href="#" class="btn btn-light w-100">বাছাই করি</a>
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
                                            <h5 class="font-size-16">ভি আই পি</h5>
                                            <h1 class="mt-3">১২০০ <span class="text-muted font-size-16 fw-medium">/ মাস</span></h1>
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
                                                <a href="#" class="btn btn-outline-primary w-100">বাছাই করি</a>
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
                    <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="yearly">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="card mb-xl-0">
                                    <div class="card-body">
                                        <div class="p-2">
                                            <h5 class="font-size-16">পরিচিতি</h5>
                                            <h1 class="mt-3">১০০০ <span class="text-muted font-size-16 fw-medium">/ বৎসর</span></h1>
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
                                                <a href="#" class="btn btn-outline-primary w-100">বাছাই করি</a>
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
                                            <h5 class="font-size-16">ছোট দোকান</h5>
                                            <h1 class="mt-3">১০০০ <span class="text-muted font-size-16 fw-medium">/ বৎসর</span></h1>
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
                                                <a href="#" class="btn btn-outline-primary w-100">বাছাই করি</a>
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
                                            <h5 class="font-size-16 text-white">বড় দোকান</h5>
                                            <h1 class="mt-3 text-white">৫০০০ <span class="text-white font-size-16 fw-medium">/ বৎসর</span></h1>
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
                                                <a href="#" class="btn btn-light w-100">বাছাই করি</a>
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
                                            <h5 class="font-size-16">ভি আই পি</h5>
                                            <h1 class="mt-3">১২০০০ <span class="text-muted font-size-16 fw-medium">/ বৎসর</span></h1>
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
                                                <a href="#" class="btn btn-outline-primary w-100">বাছাই করি</a>
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
