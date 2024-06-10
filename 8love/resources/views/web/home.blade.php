@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Dashboard</h4>
                </li>
                <li class="breadcrumb-item">
                    <a href="index-2.html">
                        <i data-feather="home"></i></a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
            <div class="row ">
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-style1">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">New Orders</h4>
                                <span>524</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-style2">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">New Booking</h4>
                                <span>1,258</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-style3">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Inquiry</h4>
                                <span>10,225</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-style4">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Earning</h4>
                                <span>$2,658</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    <div class="progress-bar l-bg-green" role="progressbar" data-width="25%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Revenue Chart</h4>
                            <div class="card-header-action">
                                <ul class="nav nav-pills" role="tablist" id="chart-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active card-tab-style" data-toggle="tab" data-id="1"
                                            role="tab" aria-selected="true">2017</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link card-tab-style" data-toggle="tab" data-id="2"
                                            role="tab" aria-selected="false">2018</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link card-tab-style" data-toggle="tab" data-id="3"
                                            role="tab" aria-selected="false">2019</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Revenue Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Assign Project List</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="proTeamScroll">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Cust.</th>
                                            <th>Project</th>
                                            <th>Assign Date</th>
                                            <th>Team</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="table-img"><img src="assets/img/users/user-8.png" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0 font-13">Wordpress Website</h6>
                                            <p class="m-0 font-12">
                                                Assigned to<span class="col-green font-weight-bold"> Airi
                                                    Satou</span>
                                            </p>
                                        </td>
                                        <td>20-02-2018</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-8.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-9.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-10.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="badge-outline col-red">High</div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">50%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-success" data-width="50%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img"><img src="assets/img/users/user-1.png" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0 font-13">Android Game App</h6>
                                            <p class="m-0 font-12">
                                                Assigned to<span class="col-green font-weight-bold"> Sarah
                                                    Smith</span>
                                            </p>
                                        </td>
                                        <td>22-05-2019</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-4.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-7.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-2.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="badge-outline col-green">Low</div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">55%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-purple" data-width="55%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img"><img src="assets/img/users/user-5.png" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0 font-13">Java Web Service</h6>
                                            <p class="m-0 font-12">
                                                Assigned to<span class="col-green font-weight-bold"> Cara
                                                    Stevens</span>
                                            </p>
                                        </td>
                                        <td>11-04-2019</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-3.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-7.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-8.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="badge-outline col-blue">Medium</div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">70%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar" data-width="70%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img"><img src="assets/img/users/user-9.png" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0 font-13">Wedding IOS App</h6>
                                            <p class="m-0 font-12">
                                                Assigned to<span class="col-green font-weight-bold"> John
                                                    Doe</span>
                                            </p>
                                        </td>
                                        <td>19-05-2019</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-2.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-10.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-4.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="badge-outline col-red">High</div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">45%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-cyan" data-width="45%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img"><img src="assets/img/users/user-10.png" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0 font-13">Blize Admin Template</h6>
                                            <p class="m-0 font-12">
                                                Assigned to<span class="col-green font-weight-bold"> Ashton
                                                    Cox</span>
                                            </p>
                                        </td>
                                        <td>25-07-2019</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-1.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-5.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-7.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="badge-outline col-blue">Medium</div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">67%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-red" data-width="67%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img"><img src="assets/img/users/user-4.png" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0 font-13">React js website</h6>
                                            <p class="m-0 font-12">
                                                Assigned to<span class="col-green font-weight-bold"> Sarah
                                                    Smith </span>
                                            </p>
                                        </td>
                                        <td>11-08-2019</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-5.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-8.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-3.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="badge-outline col-green">Low</div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">41%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-orange" data-width="41%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img"><img src="assets/img/users/user-10.png" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0 font-13">SEO improvement</h6>
                                            <p class="m-0 font-12">
                                                Assigned to<span class="col-green font-weight-bold"> Janak
                                                    Gandhi</span>
                                            </p>
                                        </td>
                                        <td>22-02-2018</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-3.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-9.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-1.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="badge-outline col-red">High</div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">70%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-success" data-width="70%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img"><img src="assets/img/users/user-6.png" alt="">
                                        </td>
                                        <td>
                                            <h6 class="mb-0 font-13">Laravel Website</h6>
                                            <p class="m-0 font-12">
                                                Assigned to<span class="col-green font-weight-bold"> Mili
                                                    Rain</span>
                                            </p>
                                        </td>
                                        <td>31-03-2019</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-4.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-7.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="assets/img/users/user-2.png" alt="user"
                                                        data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="badge-outline col-green">Low</div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">55%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-purple" data-width="55%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-toggle="tooltip" title="" data-original-title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a data-toggle="tooltip" title="" data-original-title="Delete"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Project Team</h4>
                        </div>
                        <div class="card-body">
                            <div class="media-list position-relative">
                                <div class="table-responsive" id="project-team-scroll">
                                    <table class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Employees</th>
                                                <th>Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-truncate">Project X</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list m-b-0">
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-8.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Wildan Ahdian"></li>
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-9.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="John Deo"></li>
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-10.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Sarah Smith"></li>
                                                        <li class="avatar avatar-sm"><span
                                                                class="badge badge-primary">+3</span></li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$8999</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">Project AB2</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list m-b-0">
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-1.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Wildan Ahdian"></li>
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-3.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="John Deo"></li>
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-2.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Sarah Smith"></li>
                                                        <li class="avatar avatar-sm"><span
                                                                class="badge badge-primary">+1</span></li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$5550</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">Project DS3</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list m-b-0">
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-5.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Wildan Ahdian"></li>
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-9.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Sarah Smith"></li>
                                                        <li class="avatar avatar-sm"><span
                                                                class="badge badge-primary">+4</span></li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$9000</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">Project XCD</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list m-b-0">
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-8.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Wildan Ahdian"></li>
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-3.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="John Deo"></li>
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-5.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Sarah Smith"></li>
                                                        <li class="avatar avatar-sm"><span
                                                                class="badge badge-primary">+2</span></li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$7500</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">Project Z2</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list m-b-0">
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-8.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Wildan Ahdian"></li>
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-10.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Sarah Smith"></li>
                                                        <li class="avatar avatar-sm"><span
                                                                class="badge badge-primary">+3</span></li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$8500</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">Project GTe</td>
                                                <td class="text-truncate">
                                                    <ul class="list-unstyled order-list m-b-0">
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-3.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Wildan Ahdian"></li>
                                                        <li class="team-member team-member-sm"><img class="rounded-circle"
                                                                src="assets/img/users/user-5.png" alt="user"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Sarah Smith"></li>
                                                        <li class="avatar avatar-sm"><span
                                                                class="badge badge-primary">+3</span></li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$8500</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="schart1"></div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Target</p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$15.3k
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Last week
                                    </p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$2.8k
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted text-truncate">Last Month
                                    </p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$12.5k
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="schart2"></div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Target</p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$15.3k
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Last week
                                    </p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$2.8k
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted text-truncate">Last Month
                                    </p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$12.5k
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="schart3"></div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Target</p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$15.3k
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Last week
                                    </p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$2.8k
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted text-truncate">Last Month
                                    </p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$12.5k
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Visitors By Countries</h4>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-12 col-sm-12 col-lg-8">
                                    <div id="visitorMap"></div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <div class="row m-b-15">
                                        <div class="col-9">India</div>
                                        <div class="col-3 text-right">28%</div>
                                        <div class="col-12">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-success" data-width="28%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-b-15">
                                        <div class="col-9"> Canada</div>
                                        <div class="col-3 text-right">21%</div>
                                        <div class="col-12">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-orange" data-width="21%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-b-15">
                                        <div class="col-9"> Australia</div>
                                        <div class="col-3 text-right">33%</div>
                                        <div class="col-12">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-purple" data-width="33%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-b-15">
                                        <div class="col-9">Egypt</div>
                                        <div class="col-3 text-right">42%</div>
                                        <div class="col-12">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-amber" data-width="42%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-b-15">
                                        <div class="col-9">Thailand</div>
                                        <div class="col-3 text-right">56%</div>
                                        <div class="col-12">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-cyan" data-width="56%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">Panama</div>
                                        <div class="col-3 text-right">39%</div>
                                        <div class="col-12">
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-pink" data-width="39%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>Top 5 Products</h4>
                            <div class="card-header-action dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <li class="dropdown-title">Select Period</li>
                                    <li><a href="#" class="dropdown-item">Today</a></li>
                                    <li><a href="#" class="dropdown-item">Week</a></li>
                                    <li><a href="#" class="dropdown-item active">Month</a></li>
                                    <li><a href="#" class="dropdown-item">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body" id="top-5-scroll">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-3.png"
                                        alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">112 Sales</div>
                                        </div>
                                        <div class="media-title">Mobile</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="61%"></div>
                                                <div class="budget-price-label">$24,897</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="38%">
                                                </div>
                                                <div class="budget-price-label">$18,865</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-4.png"
                                        alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">49 Sales</div>
                                        </div>
                                        <div class="media-title">Laptop</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="78%"></div>
                                                <div class="budget-price-label">$74,568</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="55%">
                                                </div>
                                                <div class="budget-price-label">$65,892</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-1.png"
                                        alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">63 Sales</div>
                                        </div>
                                        <div class="media-title">Headphone</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="38%"></div>
                                                <div class="budget-price-label">$2,859</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="25%">
                                                </div>
                                                <div class="budget-price-label">$1,872</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-2.png"
                                        alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">28 Sales</div>
                                        </div>
                                        <div class="media-title">Tablet</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="48%"></div>
                                                <div class="budget-price-label">$11,238</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="33%">
                                                </div>
                                                <div class="budget-price-label">$7,564</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-5.png"
                                        alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">19 Sales</div>
                                        </div>
                                        <div class="media-title">Camera</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="91%"></div>
                                                <div class="budget-price-label">$7,285</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="74%">
                                                </div>
                                                <div class="budget-price-label">$5,147</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-primary" data-width="20"></div>
                                <div class="budget-price-label">Selling Price</div>
                            </div>
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-danger" data-width="20"></div>
                                <div class="budget-price-label">Product Cost</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
