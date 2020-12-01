<div>
    <div class="row">
        <div class="col-lg-3 col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap align-items-center">
                        <div class="img-sm bg-primary rounded-md d-flex align-items-center justify-content-center text-white">
                            <i class="mdi mdi-chart-line-variant icon-md"></i>
                        </div>
                        <div class="text-right text-md-center text-lg-left ml-lg-4">
                            <h1 class="font-weight-bold mb-0">81977</h1>
                            <p class="mb-0">Sales</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap align-items-center">
                        <div class="img-sm bg-danger rounded-md d-flex align-items-center justify-content-center text-white">
                            <i class="mdi mdi-emoticon icon-md"></i>
                        </div>
                        <div class="text-right text-md-center text-lg-left ml-lg-4">
                            <h1 class="font-weight-bold mb-0">69163</h1>
                            <p class="mb-0">Revenue</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap align-items-center">
                        <div class="img-sm bg-warning rounded-md d-flex align-items-center justify-content-center text-white">
                            <i class="mdi mdi-run icon-md"></i>
                        </div>
                        <div class="text-right text-md-center text-lg-left ml-lg-4">
                            <h1 class="font-weight-bold mb-0">75891</h1>
                            <p class="mb-0">Visitors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap align-items-center">
                        <div class="img-sm bg-success rounded-md d-flex align-items-center justify-content-center text-white">
                            <i class="mdi mdi-chart-donut icon-md"></i>
                        </div>
                        <div class="text-right text-md-center text-lg-left ml-lg-4">
                            <h1 class="font-weight-bold mb-0">93171</h1>
                            <p class="mb-0">Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h4 class="card-title mb-lg-0">Overview</h4>
                    <div class="w-50 mx-auto">
                        <canvas id="traffic-chart" width="100" height="100"></canvas>
                    </div>
                    <div id="traffic-chart-legend" class="chartjs-legend traffic-chart-legend"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">Activity</h6>
                    </div>
                    <div class="list d-flex pb-3">
                        <img class="img-sm rounded-md" src="{{ asset('public/assets/images/user.jpg') }}" alt="">
                        <div class="wrapper w-100 ml-3">
                            <p><b>Dobrick </b>published an article</p>
                            <small class="text-primary font-weight-medium">2 hours ago</small>
                        </div>
                    </div>
                    <div class="list d-flex py-3">
                        <img class="img-sm rounded-md" src="{{ asset('public/assets/images/user.jpg') }}" alt="">
                        <div class="wrapper w-100 ml-3">
                            <p><b>Stella </b>created an event</p>
                            <small class="text-primary font-weight-medium">3 hours ago</small>
                        </div>
                    </div>
                    <div class="list d-flex py-3">
                        <img class="img-sm rounded-md" src="{{ asset('public/assets/images/user.jpg') }}" alt="">
                        <div class="wrapper w-100 ml-3">
                            <p><b>Peter </b>submitted the reports</p>
                            <small class="text-primary font-weight-medium">1 hours ago</small>
                        </div>
                    </div>
                    <div class="list d-flex pt-3">
                        <img class="img-sm rounded-md" src="{{ asset('public/assets/images/user.jpg') }}" alt="">
                        <div class="wrapper w-100 ml-3">
                            <p><b>Nateila </b>updated the docs</p>
                            <small class="text-primary font-weight-medium">1 hours ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h4 class="card-title">Sales</h4>
                    <canvas id="analysis-chart"></canvas>
                    <div class="d-lg-flex justify-content-around mt-3">
                        <div class="text-center mb-3 mb-lg-0">
                            <h3 class="font-weight-normal text-primary">+40%</h3>
                            <p class="text-primary font-weight-medium mb-0">Growth</p>
                        </div>
                        <div class="text-center mb-3 mb-lg-0">
                            <h3 class="font-weight-normal text-danger">2%</h3>
                            <p class="text-danger font-weight-medium mb-0">Refund</p>
                        </div>
                        <div class="text-center">
                            <h3 class="font-weight-normal text-success">+23%</h3>
                            <p class="text-success font-weight-medium mb-0">Online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
