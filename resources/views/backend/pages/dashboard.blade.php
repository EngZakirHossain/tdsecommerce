@extends('backend.layouts.master').
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('admin_content')

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/backend') }}/images/services-icon/01.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Orders</h5>
                        <h4 class="fw-medium font-size-24">{{ $total_order_count }} <i
                                class="mdi mdi-arrow-up text-success ms-2"></i>
                        </h4>
                        <div class="mini-stat-label bg-success">
                            <p class="mb-0">+ 12%</p>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ route('admin.order.list') }}" class="text-white-50"><i
                                    class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/backend') }}/images/services-icon/02.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Revenue</h5>
                        <h4 class="fw-medium font-size-24">{{ $total_earning }} <i
                                class="mdi mdi-arrow-down text-danger ms-2"></i></h4>
                        <div class="mini-stat-label bg-danger">
                            <p class="mb-0">- 28%</p>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ route('admin.order.list') }}" class="text-white-50"><i
                                    class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/backend') }}/images/services-icon/03.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Customers</h5>
                        <h4 class="fw-medium font-size-24">{{ $total_customers }} <i
                                class="mdi mdi-arrow-up text-success ms-2"></i>
                        </h4>
                        <div class="mini-stat-label bg-info">
                            <p class="mb-0"> 00%</p>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/backend') }}/images/services-icon/04.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">PRODUCTS</h5>
                        <h4 class="fw-medium font-size-24">{{ $total_products }} <i
                                class="mdi mdi-arrow-up text-success ms-2"></i>
                        </h4>
                        <div class="mini-stat-label bg-warning">
                            <p class="mb-0">{{ $total_categories }}</p>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ route('admin.products.index') }}" class="text-white-50"><i
                                    class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Monthly Earning</h4>
                    <div class="row">
                        <div class="col-lg-7">
                            <div>
                                <div id="chart-with-area" class="ct-chart earning ct-golden-section">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <p class="text-muted mb-4">This month We Complete</p>
                                        <h3>{{ $this_month_order }}</h3>
                                        <p class="text-muted mb-5">Orders Of Our total Order </p>
                                        <span class="peity-donut"
                                            data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                            data-width="72"
                                            data-height="72">{{ $this_month_order }}/{{ $total_order_count }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <p class="text-muted mb-4">This month Our Sell </p>
                                        <h3>${{ $this_month_revenue }}</h3>
                                        <p class="text-muted mb-5">Of our Total Sell.</p>
                                        <span class="peity-donut"
                                            data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                            data-width="72"
                                            data-height="72">{{ $this_month_revenue }}/{{ $total_earning }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end card -->
        </div>

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title mb-4">Sales Analytics</h4>
                    </div>
                    <div class="wid-peity mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <p class="text-muted">Online</p>
                                    <h5 class="mb-4">$ {{ $total_earning }}</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <span class="peity-line" data-width="100%"
                                        data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                        data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wid-peity mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <p class="text-muted">Offline</p>
                                    <h5 class="mb-4">6,451</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <span class="peity-line" data-width="100%"
                                        data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                        data-height="60">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <p class="text-muted">Marketing</p>
                                    <h5>84,574</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <span class="peity-line" data-width="100%"
                                        data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}'
                                        data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Transaction</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">(#) Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <th scope="row">#100{{ $loop->index + 1 }}</th>
                                        <th scope="row">{{ $order->billing->name }}</th>
                                        <td>{{ $order->created_at->format('d-M-Y H:i:s') }}</td>
                                        <td>${{ $order->sub_total }}</td>
                                        <td>${{ $order->discount_amount }}({{ $order->coupon_name }})</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>
                                            <div>
                                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Chat</h4>
                    <div class="chat-conversation">
                        <ul class="conversation-list" data-simplebar style="max-height: 367px;">
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/backend') }}/images/users/user-2.jpg"
                                        class="avatar-xs rounded-circle" alt="male">
                                    <span class="time">10:00</span>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <span class="user-name">John Deo</span>
                                        <p>
                                            Hello!
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/backend') }}/images/users/user-3.jpg"
                                        class="avatar-xs rounded-circle" alt="Female">
                                    <span class="time">10:01</span>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <span class="user-name">Smith</span>
                                        <p>
                                            Hi, How are you? What about our next meeting?
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/backend') }}/images/users/user-2.jpg"
                                        class="avatar-xs rounded-circle" alt="male">
                                    <span class="time">10:04</span>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <span class="user-name">John Deo</span>
                                        <p>
                                            Yeah everything is fine
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/backend') }}/images/users/user-3.jpg"
                                        class="avatar-xs rounded-circle" alt="male">
                                    <span class="time">10:05</span>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <span class="user-name">Smith</span>
                                        <p>
                                            Wow that's great
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/backend') }}/images/users/user-3.jpg"
                                        class="avatar-xs rounded-circle" alt="male">
                                    <span class="time">10:08</span>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <span class="user-name mb-2">Smith</span>

                                        <img src="{{ asset('assets/backend') }}/images/small/img-1.jpg" alt=""
                                            height="48" class="rounded me-2">
                                        <img src="{{ asset('assets/backend') }}/images/small/img-2.jpg" alt=""
                                            height="48" class="rounded">
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-sm-9 col-8 chat-inputbar">
                                <input type="text" class="form-control chat-input" placeholder="Enter your text">
                            </div>
                            <div class="col-sm-3 col-4 chat-send">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sales Report</h4>

                    <div class="cleafix">
                        <p class="float-start"><i class="mdi mdi-calendar me-1 text-primary"></i> Jan
                            01
                            - Jan 31</p>
                        <h5 class="font-18 text-end">$4230</h5>
                    </div>

                    <div id="ct-donut" class="ct-chart wid"></div>

                    <div class="mt-4">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td><span class="badge bg-primary">Desk</span></td>
                                    <td>Desktop</td>
                                    <td class="text-end">54.5%</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-success">Mob</span></td>
                                    <td>Mobile</td>
                                    <td class="text-end">28.0%</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-warning">Tab</span></td>
                                    <td>Tablets</td>
                                    <td class="text-end">17.5%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Activity</h4>
                    <ol class="activity-feed">
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <span class="date">Jan 22</span>
                                <span class="activity-text">Responded to need “Volunteer
                                    Activities”</span>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <span class="date">Jan 20</span>
                                <span class="activity-text">At vero eos et accusamus et iusto odio
                                    dignissimos ducimus qui deleniti atque...<a href="#" class="text-success">Read
                                        more</a></span>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <span class="date">Jan 19</span>
                                <span class="activity-text">Joined the group “Boardsmanship
                                    Forum”</span>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <span class="date">Jan 17</span>
                                <span class="activity-text">Responded to need “In-Kind
                                    Opportunity”</span>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <span class="date">Jan 16</span>
                                <span class="activity-text">Sed ut perspiciatis unde omnis iste natus
                                    error sit rem.</span>
                            </div>
                        </li>
                    </ol>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">Load More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="py-4">
                                <i class="ion ion-ios-checkmark-circle-outline display-4 text-success"></i>

                                <h5 class="text-primary mt-4">Order Successful</h5>
                                <p class="text-muted">Thanks you so much for your order.</p>
                                <div class="mt-4">
                                    <a href="" class="btn btn-primary btn-sm">Chack Status</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="text-center text-white py-4">
                                <h5 class="mb-4 text-white-50 font-size-16">Top Product Sale</h5>
                                <h1>1452</h1>
                                <p class="font-size-14 pt-1">Computer</p>
                                <p class="text-white-50 mb-0">At solmen va esser necessi far uniform
                                    myth... <a href="#" class="text-white">View more</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Client Reviews</h4>
                            <p class="text-muted mb-3 pb-4">" Everyone realizes why a new common
                                language would be desirable one could refuse to pay expensive
                                translators it would be necessary. "</p>
                            <div class="float-end mt-2">
                                <a href="#" class="text-primary">
                                    <i class="mdi mdi-arrow-right h5"></i>
                                </a>
                            </div>
                            <h6 class="mb-0"><img src="{{ asset('assets/backend') }}/images/users/user-3.jpg"
                                    alt="" class="avatar-sm rounded-circle me-2"> James Athey
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
