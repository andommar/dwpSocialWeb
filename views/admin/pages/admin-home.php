<div class="d-flex justify-content-between flex-wrap align-items-center">
    <h1>Admin Dashboard</h1>
</div>
<!-- Total stats section -->
<div class="row">
    <div class="my-3">
        <section id="totalStats">
            <h4 class="text-muted">Stats</h4>
            <div class="d-flex justify-content-around">
                <div class="col-sm-2">
                    <div class="card border-left border-primary shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs weight-bold text-uppercase">
                                        Users
                                    </div>
                                    <div class="font-weight-bold text-uppercase">
                                        <h5>53630</h5>
                                    </div>
                                    <!-- <h5 class="card-title">Users</h5>
                                    <p class="card-text">41233</p> -->
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="card border-left border-primary shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs weight-bold text-uppercase">
                                        Posts
                                    </div>
                                    <div class="font-weight-bold text-uppercase">
                                        <h5>53630</h5>
                                    </div>
                                    <!-- <h5 class="card-title">Users</h5>
                                    <p class="card-text">41233</p> -->
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-paragraph fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="card border-left border-primary shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs weight-bold text-uppercase">
                                        Comments
                                    </div>
                                    <div class="font-weight-bold text-uppercase">
                                        <h5>53630</h5>
                                    </div>
                                    <!-- <h5 class="card-title">Users</h5>
                                    <p class="card-text">41233</p> -->
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="card border-left border-primary shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs weight-bold text-uppercase">
                                        Upvotes
                                    </div>
                                    <div class="font-weight-bold text-uppercase">
                                        <h5>53630</h5>
                                    </div>
                                    <!-- <h5 class="card-title">Users</h5>
                                    <p class="card-text">41233</p> -->
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-arrow-up fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="card border-left border-primary shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs weight-bold text-uppercase">
                                        Downvotes
                                    </div>
                                    <div class="font-weight-bold text-uppercase">
                                        <h5>53630</h5>
                                    </div>
                                    <!-- <h5 class="card-title">Users</h5>
                                    <p class="card-text">41233</p> -->
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-arrow-down fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Graphs section -->
<div class="row">
    <div class="my-3">
    <section id="graphs">
        <h4 class="text-muted">Graphs</h4>
        <div class="d-flex justify-content-around">
            <div class="col-md-5">
                <div class="card mb-4 shadow">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        New users
                    </div>
                    <div class="card-body"><canvas id="myLineChart" width="100%" height="80"></canvas></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Posts per category
                    </div>
                    <div class="card-body"><canvas id="myPieChart" width="100%" height="80"></canvas></div>
                </div>
            </div>
        </div>
    </section>
    </div>
</div>

<script src="views/admin/js/charts.js"></script>
