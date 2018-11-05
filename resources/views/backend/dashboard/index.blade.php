@extends('backend.general.master')
@section('content')
	    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="mini-stat clearfix bg-primary">
                <span class="mini-stat-icon"><i class="mdi mdi-check-all"></i></span>
                <div class="mini-stat-info text-right text-white">
                    <span class="counter" id="transaction_success"></span>
                    Transaction success
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="mini-stat clearfix bg-primary">
                <span class="mini-stat-icon"><i class="mdi mdi-backup-restore"></i></span>
                <div class="mini-stat-info text-right text-white">
                    <span class="counter" id="transaction_return_success"></span>
                    return success
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="mini-stat clearfix bg-primary">
                <span class="mini-stat-icon"><i class="mdi mdi-account"></i></span>
                <div class="mini-stat-info text-right text-white">
                    <span class="counter" id="member"></span>
                   Users
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="mini-stat clearfix bg-primary">
                <span class="mini-stat-icon"><i class="mdi mdi-tshirt-crew"></i></span>
                <div class="mini-stat-info text-right text-white">
                    <span class="counter" id="count_product"></span>
                    Stock All Product
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-4">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Email Sent</h4>

                    <ul class="list-inline widget-chart m-t-20 text-center">
                        <li>
                            <h4 class=""><b>3652</b></h4>
                            <p class="text-muted m-b-0">Marketplace</p>
                        </li>
                        <li>
                            <h4 class=""><b>5421</b></h4>
                            <p class="text-muted m-b-0">Last week</p>
                        </li>
                        <li>
                            <h4 class=""><b>9652</b></h4>
                            <p class="text-muted m-b-0">Last Month</p>
                        </li>
                    </ul>

                    <div id="morris-area-example" style="height: 300px"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Revenue</h4>

                    <ul class="list-inline widget-chart m-t-20 text-center">
                        <li>
                            <h4 class=""><b>5248</b></h4>
                            <p class="text-muted m-b-0">Marketplace</p>
                        </li>
                        <li>
                            <h4 class=""><b>321</b></h4>
                            <p class="text-muted m-b-0">Last week</p>
                        </li>
                        <li>
                            <h4 class=""><b>964</b></h4>
                            <p class="text-muted m-b-0">Last Month</p>
                        </li>
                    </ul>

                    <div id="morris-bar-example" style="height: 300px"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Monthly Earnings</h4>

                    <ul class="list-inline widget-chart m-t-20 text-center">
                        <li>
                            <h4 class=""><b>3654</b></h4>
                            <p class="text-muted m-b-0">Marketplace</p>
                        </li>
                        <li>
                            <h4 class=""><b>954</b></h4>
                            <p class="text-muted m-b-0">Last week</p>
                        </li>
                        <li>
                            <h4 class=""><b>8462</b></h4>
                            <p class="text-muted m-b-0">Last Month</p>
                        </li>
                    </ul>

                    <div id="morris-donut-example" style="height: 300px"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->


    <div class="row">

        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 m-b-15 header-title">Recent Candidates</h4>
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td><span class="badge badge-default">Deactive</span></td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>61</td>
                                    <td>2012/12/02</td>
                                    <td>$372,000</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td><span class="badge badge-default">Deactive</span></td>
                                    <td>59</td>
                                    <td>2012/08/06</td>
                                    <td>$137,500</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
	<!-- end row -->
@endsection