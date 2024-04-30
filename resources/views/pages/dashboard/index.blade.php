@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Welcome back,</h2>
                        <p class="mb-md-0">Your analytics dashboard template.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor">Analytics</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                        <i class="mdi mdi-download text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-clock-outline text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <button class="btn btn-primary mt-2 mt-xl-0">Download report</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                    <ul class="nav nav-tabs px-4 border-left-0 border-top-0 border-right-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview"
                                role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab"
                                aria-controls="sales" aria-selected="false">Sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="purchases-tab" data-bs-toggle="tab" href="#purchases" role="tab"
                                aria-controls="purchases" aria-selected="false">Purchases</a>
                        </li>
                    </ul>
                    <div class="tab-content py-0 px-0 border-left-0 border-bottom-0 border-right-0">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div
                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-calendar-heart"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                                href="#" role="button" id="dropdownMenuLinkA"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-currency-usd"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Revenue</small>
                                        <h5 class="me-2 mb-0">$577545</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-eye"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="me-2 mb-0">9833550</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-download"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Downloads</small>
                                        <h5 class="me-2 mb-0">2233783</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-flag"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Flagged</small>
                                        <h5 class="me-2 mb-0">3497843</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div
                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-calendar-heart"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                                href="#" role="button" id="dropdownMenuLinkB"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkB">
                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-currency-usd"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Revenue</small>
                                        <h5 class="me-2 mb-0">$577545</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-eye"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="me-2 mb-0">9833550</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-download"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Downloads</small>
                                        <h5 class="me-2 mb-0">2233783</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-flag"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Flagged</small>
                                        <h5 class="me-2 mb-0">3497843</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div
                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-calendar-heart"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Start date</small>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium"
                                                href="#" role="button" id="dropdownMenuLinkC"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkC">
                                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-currency-usd"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Revenue</small>
                                        <h5 class="me-2 mb-0">$577545</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-eye"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total views</small>
                                        <h5 class="me-2 mb-0">9833550</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-download"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Downloads</small>
                                        <h5 class="me-2 mb-0">2233783</h5>
                                    </div>
                                </div>
                                <div
                                    class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                                    <div class="icon-box-secondary me-3">
                                        <i class="mdi mdi-flag"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Flagged</small>
                                        <h5 class="me-2 mb-0">3497843</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 grid-margin stretch-card">
            <div class="card">
                <div id="cashSalesCarousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body border-bottom">
                                <p class="card-title">Cash sales</p>
                                <div class="row">
                                    <div class="col-6">
                                        <canvas id="cash-sales-chart"></canvas>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center ms-2">
                                            <h2 class="font-weight-bold mb-0 me-1">30%</h2>
                                            <i class="mdi mdi-chevron-up text-success icon-md"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <p>Sales last month</p>
                                        <h2 class="mb-0">8543</h2>
                                        <div class="d-flex align-items-center mt-2">
                                            <small>0.321%</small>
                                            <i class="mdi mdi-chevron-up"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="icon-box-primary icon-box-lg">
                                            <i class="mdi mdi-wallet"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5>Gross sales of July</h5>
                                <p class="text-muted mb-0">To start a blog, think of a topic about and
                                    first brainstorm party is ways to write details</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body border-bottom">
                                <p class="card-title">Cash sales</p>
                                <div class="row">
                                    <div class="col-6">
                                        <canvas id="cash-sales-chart-b"></canvas>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center ms-2">
                                            <h2 class="font-weight-bold mb-0 me-1">41%</h2>
                                            <i class="mdi mdi-chevron-up text-success icon-md"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <p>Sales last month</p>
                                        <h2 class="mb-0">1133</h2>
                                        <div class="d-flex align-items-center mt-2">
                                            <small>0.387%</small>
                                            <i class="mdi mdi-chevron-up"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="icon-box-primary icon-box-lg">
                                            <i class="mdi mdi-wallet"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5>Gross sales of August</h5>
                                <p class="text-muted mb-0">To start a blog, think of a topic about and
                                    first brainstorm party is ways to write details</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-white" href="#cashSalesCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-white" href="#cashSalesCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 grid-margin stretch-card">
            <div class="card">
                <div id="monthlyIncomeCarousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body border-bottom">
                                <p class="card-title">Monthly income</p>
                                <div class="row">
                                    <div class="col-6">
                                        <canvas id="monthly-income-chart"></canvas>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center ms-2">
                                            <h2 class="font-weight-bold mb-0 me-1">16%</h2>
                                            <i class="mdi mdi-chevron-up text-warning icon-md"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <p>Sales income</p>
                                        <h2 class="mb-0">20087</h2>
                                        <div class="d-flex align-items-center mt-2">
                                            <small>0.754%</small>
                                            <i class="mdi mdi-chevron-up"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="icon-box-warning icon-box-lg">
                                            <i class="mdi mdi-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5>Gross sales of January</h5>
                                <p class="text-muted mb-0">The first is a non technical method which
                                    requires the use of adware removal software. Download free </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body border-bottom">
                                <p class="card-title">Monthly income</p>
                                <div class="row">
                                    <div class="col-6">
                                        <canvas id="monthly-income-chart-b"></canvas>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center ms-2">
                                            <h2 class="font-weight-bold mb-0 me-1">23%</h2>
                                            <i class="mdi mdi-chevron-up text-warning icon-md"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <p>Sales income</p>
                                        <h2 class="mb-0">7368</h2>
                                        <div class="d-flex align-items-center mt-2">
                                            <small>0.489%</small>
                                            <i class="mdi mdi-chevron-up"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="icon-box-warning icon-box-lg">
                                            <i class="mdi mdi-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5>Gross sales of February</h5>
                                <p class="text-muted mb-0">The first is a non technical method which
                                    requires the use of adware removal software. Download free </p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-white" href="#monthlyIncomeCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-white" href="#monthlyIncomeCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 grid-margin stretch-card">
            <div class="card">
                <div id="yearlySalesCarousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body border-bottom">
                                <p class="card-title">Yearly sales</p>
                                <div class="row">
                                    <div class="col-6">
                                        <canvas id="yearly-sales-chart"></canvas>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center ms-2">
                                            <h2 class="font-weight-bold mb-0 me-1">52%</h2>
                                            <i class="mdi mdi-chevron-down text-danger icon-md"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <p>Purchases</p>
                                        <h2 class="mb-0">8304</h2>
                                        <div class="d-flex align-items-center mt-2">
                                            <small>0.846%</small>
                                            <i class="mdi mdi-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="icon-box-info icon-box-lg">
                                            <i class="mdi mdi-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5>Gross sales of March</h5>
                                <p class="text-muted mb-0">While most people enjoy casino gambling, sports
                                    betting, lottery and bingo playing for the fun and </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body border-bottom">
                                <p class="card-title">Yearly sales</p>
                                <div class="row">
                                    <div class="col-6">
                                        <canvas id="yearly-sales-chart-b"></canvas>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center ms-2">
                                            <h2 class="font-weight-bold mb-0 me-1">29%</h2>
                                            <i class="mdi mdi-chevron-down text-danger icon-md"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <p>Purchases</p>
                                        <h2 class="mb-0">8543</h2>
                                        <div class="d-flex align-items-center mt-2">
                                            <small>0.795%</small>
                                            <i class="mdi mdi-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="icon-box-info icon-box-lg">
                                            <i class="mdi mdi-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5>Gross sales of April</h5>
                                <p class="text-muted mb-0">While most people enjoy casino gambling, sports
                                    betting, lottery and bingo playing for the fun and </p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-white" href="#yearlySalesCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-white" href="#yearlySalesCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 grid-margin stretch-card">
            <div class="card">
                <div id="dailyDepositsCarousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body border-bottom">
                                <p class="card-title">Daily deposits</p>
                                <div class="row">
                                    <div class="col-6">
                                        <canvas id="daily-deposits-chart"></canvas>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center ms-2">
                                            <h2 class="font-weight-bold mb-0 me-1">19%</h2>
                                            <i class="mdi mdi-chevron-up text-success icon-md"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <p>Security deposits</p>
                                        <h2 class="mb-0">2388</h2>
                                        <div class="d-flex align-items-center mt-2">
                                            <small>0.321%</small>
                                            <i class="mdi mdi-chevron-up"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="icon-box-success icon-box-lg">
                                            <i class="mdi mdi-calendar-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5>Gross sales of May</h5>
                                <p class="text-muted mb-0">According to the research firm Frost & Sullivan,
                                    the estimated size of the North American used test</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body border-bottom">
                                <p class="card-title">Daily deposits</p>
                                <div class="row">
                                    <div class="col-6">
                                        <canvas id="daily-deposits-chart-b"></canvas>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center ms-2">
                                            <h2 class="font-weight-bold mb-0 me-1">33%</h2>
                                            <i class="mdi mdi-chevron-up text-success icon-md"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <p>Security deposits</p>
                                        <h2 class="mb-0">7589</h2>
                                        <div class="d-flex align-items-center mt-2">
                                            <small>0.321%</small>
                                            <i class="mdi mdi-chevron-up"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="icon-box-success icon-box-lg">
                                            <i class="mdi mdi-calendar-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5>Gross sales of June</h5>
                                <p class="text-muted mb-0">According to the research firm Frost & Sullivan,
                                    the estimated size of the North American used test</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-white" href="#dailyDepositsCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-white" href="#dailyDepositsCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Cash deposits</p>
                    <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is
                        ways to write details</p>
                    <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3 legend-small"></div>
                    <canvas id="cash-deposits-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Total sales</p>
                    <h1>$ 28835</h1>
                    <h4>Gross sales over the years</h4>
                    <p class="text-muted">Today, many people rely on computers to do homework, work, and
                        create or store useful information. Therefore, it is important </p>
                    <div id="total-sales-chart-legend" class="legend-small"></div>
                </div>
                <canvas id="total-sales-chart"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Recent Purchases</p>
                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status report</th>
                                    <th>Office</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Gross amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jeremy Ortega</td>
                                    <td>Levelled up</td>
                                    <td>Catalinaborough</td>
                                    <td>$790</td>
                                    <td>06 Jan 2018</td>
                                    <td>$2274253</td>
                                </tr>
                                <tr>
                                    <td>Alvin Fisher</td>
                                    <td>Ui design completed</td>
                                    <td>East Mayra</td>
                                    <td>$23230</td>
                                    <td>18 Jul 2018</td>
                                    <td>$83127</td>
                                </tr>
                                <tr>
                                    <td>Emily Cunningham</td>
                                    <td>support</td>
                                    <td>Makennaton</td>
                                    <td>$939</td>
                                    <td>16 Jul 2018</td>
                                    <td>$29177</td>
                                </tr>
                                <tr>
                                    <td>Minnie Farmer</td>
                                    <td>support</td>
                                    <td>Agustinaborough</td>
                                    <td>$30</td>
                                    <td>30 Apr 2018</td>
                                    <td>$44617</td>
                                </tr>
                                <tr>
                                    <td>Betty Hunt</td>
                                    <td>Ui design not completed</td>
                                    <td>Lake Sandrafort</td>
                                    <td>$571</td>
                                    <td>25 Jun 2018</td>
                                    <td>$78952</td>
                                </tr>
                                <tr>
                                    <td>Myrtie Lambert</td>
                                    <td>Ui design completed</td>
                                    <td>Cassinbury</td>
                                    <td>$36</td>
                                    <td>05 Nov 2018</td>
                                    <td>$36422</td>
                                </tr>
                                <tr>
                                    <td>Jacob Kennedy</td>
                                    <td>New project</td>
                                    <td>Cletaborough</td>
                                    <td>$314</td>
                                    <td>12 Jul 2018</td>
                                    <td>$34167</td>
                                </tr>
                                <tr>
                                    <td>Ernest Wade</td>
                                    <td>Levelled up</td>
                                    <td>West Fidelmouth</td>
                                    <td>$484</td>
                                    <td>08 Sep 2018</td>
                                    <td>$50862</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card border-0 bg-primary text-white">
                <div id="downloads-carousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">Downloads</p>
                                <h1>8543</h1>
                                <h4>Growth 58%</h4>
                            </div>
                            <canvas height="110" id="downloads-chart-a"></canvas>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">Uploads</p>
                                <h1>4533</h1>
                                <h4>Growth 32%</h4>
                            </div>
                            <canvas height="110" id="downloads-chart-b"></canvas>
                        </div>
                    </div>
                    <a class="carousel-control-prev control-light" href="#downloads-carousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next control-light" href="#downloads-carousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card border-0 bg-warning text-white">
                <div id="feedbacks-carousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">feedbacks</p>
                                <h1>3568</h1>
                                <h4>Growth 12%</h4>
                            </div>
                            <canvas height="110" id="feedbacks-chart-a"></canvas>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">feedbacks</p>
                                <h1>8290</h1>
                                <h4>Growth 11%</h4>
                            </div>
                            <canvas height="110" id="feedbacks-chart-b"></canvas>
                        </div>
                    </div>
                    <a class="carousel-control-prev control-light" href="#feedbacks-carousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next control-light" href="#feedbacks-carousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card border-0 bg-success text-white">
                <div id="customers-carousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">customers</p>
                                <h1>4567</h1>
                                <h4>Growth 31%</h4>
                            </div>
                            <canvas height="110" id="customers-chart-a"></canvas>
                        </div>
                        <div class="carousel-item">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">Users</p>
                                <h1>1782</h1>
                                <h4>Growth 62%</h4>
                            </div>
                            <canvas height="110" id="customers-chart-b"></canvas>
                        </div>
                    </div>
                    <a class="carousel-control-prev control-light" href="#customers-carousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next control-light" href="#customers-carousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
