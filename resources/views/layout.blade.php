<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Manawa Dashboard - @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/manawa.css')}}" rel="stylesheet">
    <link href="{{asset('theme/manawa-table.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="{{asset('theme/js/vendor/jquery-slim.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme/datatables/datatables.js')}}"></script>
</head>

<body style="background-image: linear-gradient(to right, #27AE60 , #3EFE8F);">
{{--<div class="preloader">--}}
{{--    <div class="loading">--}}
{{--        <img src="{{asset('image/infinity.svg')}}" alt="">--}}
{{--    </div>--}}
{{--</div>--}}
<div class="row" style="width:90%; margin-left: auto; margin-right: auto; padding-left: 0; padding-right: 0; margin-top: 20px; color: white;">
    <div class="col-md-9">
        <h1 style="font-weight: bold;">Manawa</h1>
    </div>
    <div class="col-md-3 kolom-profile">
        <div class="row rounded profile">
            <div class="col-md-3 d-flex justify-content-end pr-0"><img src="https://ui-avatars.com/api/?rounded=true&name=Faathir+Muhammad&background=EB5757&color=fff&size=45&bold=true&font-size=0.4"></div>
            <div class="col-md-9">
                <h5 style="font-weight: bold;margin: 0;">Faathir Muhammad</h5>
                <h6 style="margin: 0;">Administrator</h6>
            </div>
            <div class="profile-content">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between font-weight-bold"><i data-feather="settings"></i> Setting</a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between font-weight-bold"><i data-feather="log-out"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="boxed">
    <div class="row" style="padding-right: 30px">
        <div class="col-md-2" style="padding-left: 0px; padding-right: 0px; padding-top: 30px; padding-bottom: 30px;">
            <ul class="menu">
                <li class="menu-item {{ request()->is('/') ? ' menu-active' : '' }}">
                    <div class="menu-icon"><i data-feather="home"></i> </div>
                    <div class="menu-text">Dashboard</div>
                </li>
                <li class="menu-item {{ request()->is('account/*') ? ' menu-active' : '' }}">
                    <div class="menu-icon"><i data-feather="users"></i> </div>
                    <div class="menu-text" data-value="account">Account</div>
                    <ul class="sub-menu " id="sub-menu-account">
                        <li class="sub-menu-item {{ request()->is('account/administrator') ? ' sub-menu-active' : '' || request()->is('account/administrator/*') ? ' sub-menu-active' : ''}}"><a href="{{route('acc.admin')}}">Administrator</a></li>
                        <li class="sub-menu-item {{ request()->is('account/farmer') ? ' sub-menu-active' : '' || request()->is('account/farmer/*') ? ' sub-menu-active' : ''}}"><a href="{{route('acc.farmer')}}">Farmer</a></li>
                        <li class="sub-menu-item {{ request()->is('account/user') ? ' sub-menu-active' : '' || request()->is('account/user/*') ? ' sub-menu-active' : ''}}"><a href="{{route('acc.user')}}">User</a></li>
                    </ul>
                </li>
                <li class="menu-item {{ request()->is('livestock/*') ? ' menu-active' : '' }}">
                    <div class="menu-icon"><i data-feather="gitlab"></i> </div>
                    <div class="menu-text" data-value="livestock">Livestock</div>
                    <ul class="sub-menu " id="sub-menu-livestock">
                        <li class="sub-menu-item {{ request()->is('livestock/product') ? ' sub-menu-active' : '' || request()->is('livestock/product/*') ? ' sub-menu-active' : ''}}"><a href="{{route('live.product')}}">Product</a></li>
                        <li class="sub-menu-item {{ request()->is('livestock/user') ? ' sub-menu-active' : '' || request()->is('livestock/user/*') ? ' sub-menu-active' : ''}}"><a href="{{route('live.user')}}">User's Livestock</a></li>
                    </ul>
                </li>
                <li class="menu-item {{ request()->is('transaction/*') ? ' menu-active' : '' }}">
                    <div class="menu-icon"><i data-feather="bar-chart-2"></i> </div>
                    <div class="menu-text" data-value="transaction">Transaction</div>
                    <ul class="sub-menu " id="sub-menu-transaction">
                        <li class="sub-menu-item {{ request()->is('transaction/view') ? ' sub-menu-active' : '' || request()->is('transaction/view/*') ? ' sub-menu-active' : ''}}"><a href="{{route('trc.view')}}">Transaction</a></li>
                        <li class="sub-menu-item {{ request()->is('transaction/confirmation') ? ' sub-menu-active' : '' || request()->is('transaction/confirmation/*') ? ' sub-menu-active' : ''}}"><a href="{{route('trc.confirmation')}}">Confirmation</a></li>
                        <li class="sub-menu-item {{ request()->is('transaction/withdrawal') ? ' sub-menu-active' : '' || request()->is('transaction/withdrawal/*') ? ' sub-menu-active' : ''}}"><a href="{{route('trc.withdrawal')}}">Withdrawal</a></li>
                    </ul>
                </li>
                <li class="menu-item {{ request()->is('crm/*') ? ' menu-active' : '' }}">
                    <div class="menu-icon"><i data-feather="message-circle"></i> </div>
                    <div class="menu-text" data-value="crm">CRM</div>
                    <ul class="sub-menu " id="sub-menu-crm">
                        <li class="sub-menu-item {{ request()->is('crm/notifikasi') ? ' sub-menu-active' : '' || request()->is('crm/notifikasi/*') ? ' sub-menu-active' : ''}}"><a href="{{route('crm.notif')}}">Notification</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-md-10" style="border-left: 1px solid lightgray; padding-top: 2em;">
            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('theme/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
<script src="{{asset('theme/js/vendor/fontawesome.js')}}"></script>
<script src="{{asset('theme/js/vendor/sweetalert.js')}}"></script>

<!-- Icons -->
<script src="{{asset('theme/js/vendor/feather-icons.js')}}"></script>
{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        // $(".preloader").fadeOut(1000);--}}
{{--        setTimeout(function(){--}}
{{--            $(".preloader").fadeOut()--}}
{{--        }, 2000);--}}
{{--    })--}}
{{--</script>--}}
@yield('jquery')
<script>
    feather.replace()
</script>
<script>
    $(document).ready(function () {
        $(".menu-text").click(function () {
            var testo = $(this).data("value");
            $("#sub-menu-"+testo).toggle();
        })

        if($(".sub-menu-active")[0]){
            $(".sub-menu-active").parent().show();
        }

        $(".profile").click(function (e) {
            $(".profile-content").show();
            $(this).css("background-color","rgba(41, 43, 44,0.2)");
        })
    })

    $(document).mouseup(function(e){
        var container = $(".profile-content");

        // If the target of the click isn't the container
        if(!container.is(e.target) && container.has(e.target).length === 0){
            container.hide();
            $(".profile").css("background-color","transparent")
            $(".profile").hover(function () {
                $(this).css("background-color","rgba(41, 43, 44,0.2)");
            })
        }
    });

</script>
</body>
</html>
