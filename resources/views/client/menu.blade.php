<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu - QR MENU</title>
    <link rel="shortcut icon" type="image/png" href="/images/favicon.png" />
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" rel="stylesheet" />
    <link href="{{ asset('lib/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/site.css') }}" />

    <style>
        td {
            vertical-align: middle !important;
        }

        .spacer {
            height: 70px;
        }
    </style>
    <link href="{{ asset('css/orderMenu.css') }}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-dark bg-primary box-shadow mb-3">
                <div class="container">
                    <a class="navbar-brand" href="/Account/Login">QR MENU</a>
                    <button class="custom-toggler navbar-toggler" type="button" data-toggle="collapse"
                        data-target=".navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"
                                style="color:#fafafa; font-size:28px;"></i></span>
                    </button>
                    {{-- <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                        <ul class="navbar-nav mx-auto">

                        </ul>

                        <ul class="nav navbar-top-links">

                            <li class="nav-item">

                                <div class="dropdown profile-element">
                                    <a class="nav-link" data-toggle="dropdown" aria-expanded="false">
                                        <span>
                                            <i class="fa fa-cutlery mr-2"></i><i class="fa fa-chevron-down ml-1"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                        <li class="dropdown-item">
                                            <a href="/restaurant/restaurantmanager">Management Panel</a>
                                        </li>

                                        <li class="dropdown-item">
                                            <a href="/Account/ChangePassword">Change Password</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="dropdown-item"><a href="/Account/logout">Logout</a></li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div> --}}
                </div>
            </nav>
            <div class="wrapper wrapper-content">
                <div class="container" style="height: 100%;">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="ibox float-e-margins" id="fboxSf">
                                <div class="ibox-title">
                                    <h3 class="col-md-12">GIỎ HÀNG <i class="fa fa-cart-arrow-down float-right"></i>
                                    </h3>
                                    <input hidden value="&#x20AB;" id="txtCurrency" />
                                    <input hidden value="TOTAL" id="txtTotal" />
                                    <input hidden value="Your cart is empty yet." id="txtEmptyCart" />
                                    <input hidden value="Please complete your selections." id="txtSelectOptions" />
                                </div>
                                <div class="ibox-content ibox-br">
                                    <div class="sk-spinner sk-spinner-wave">
                                        <div class="sk-rect1"></div>
                                        <div class="sk-rect2"></div>
                                        <div class="sk-rect3"></div>
                                        <div class="sk-rect4"></div>
                                        <div class="sk-rect5"></div>
                                    </div>
                                    <form method="post" action="/Order/AddOrder">
                                        <input name="RestaurantId" id="txtRestaurantId" hidden value="1" />
                                        <input name="UserId" id="txtUserId" hidden
                                            value="fc275c06-8043-46b1-aed2-71843b4dce61" />
                                        <input name="TableId" id="txtTableId" hidden value="35" />

                                        <table class="table table-borderless">
                                            <tbody id="cartContentsHtml">
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="form-group" id="txtOrderIsReady">
                                            <textarea class="form-control" name="OrderNote" maxlength="70" rows="2" placeholder="Ghi chú"></textarea>
                                        </div>
                                        <button type="submit" onclick="startOrder()" id="placeOrder"
                                            class="btn btn-primary btn-outline btn-block mt-4 btn-sm"> Gọi món</button>
                                        <input name="__RequestVerificationToken" type="hidden"
                                            value="CfDJ8F3jakzp7iNKmGggKggWDcQXBqw6-LL4c2M1rUeXjN_YDVjRXttRroJt9FtbIXGT7110Myr23rrWoQN3ePVGJs52IzVXzhvfA3FYVUHI7rRKuCf3ddDC929cxKYzIGW99K6tSn2CaNEad_l7IEfVbzxWMTEw6mA6c_f-_5YNpJHcJnwsnG-W_e0rk8eNmaqPmA" />
                                    </form>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6" style="padding-right:7px">
                                    <button onclick="callTheWaiter()" id="btnCallWaiter"
                                        class="call-button btn-block"><img
                                            src="{{ asset('images/call-waiter.png') }}" /> Gọi nhân viên</button>
                                </div>
                                <div class="col-6" style="padding-left:7px">
                                    <button onclick="callPayment()" id="btnCallBill"
                                        class="call-button btn-block"><img src="/images/get-money.png" /> Gọi thanh
                                        toán</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="ibox-content m-b-sm border-bottom" id="welcome-lg">
                                <div class="p-xs">
                                    <div class="float-left m-r-md">
                                        <img alt="image" class="img-md"
                                            src="/images/icon_staff.svg">
                                    </div>
                                    {{-- <div class="float-right m-r-md">
                                        <button onclick="changeView(1)"
                                            class="btn btn-primary btn-outline btn-flat btn-sm"><i
                                                class="fa fa-list-ul mt-1"></i></button>
                                        <button onclick="changeView(0)"
                                            class="btn btn-primary btn-outline btn-flat btn-sm"><i
                                                class="fa  fa-th-large mt-1"></i></button>
                                    </div> --}}
                                    <h2 class="text-qrRest-dark font-weight-bold text-styling"> Xin chào Linh !</h2>
                                    <span>Bạn đang ngồi bàn {{ $tableNo }}</span>
                                </div>
                            </div>

                            {{-- <div class="ibox-content m-b-sm border-bottom" id="welcome-sm">
                                <div class="p-xs text-center">
                                    <div class="m-r-md">
                                        <img alt="image" class="img-md"
                                            src="/images/logos/80735333-a467-43a8-ad98-36c55b23711b.jpg">
                                    </div>

                                    <h2 class="text-qrRest-dark font-weight-bold text-styling"> welcome Linh</h2>
                                    <span>Linh</span>
                                    <div class="mt-4">
                                        <button onclick="changeView(1)"
                                            class="btn btn-primary btn-outline btn-flat btn-sm"><i
                                                class="fa fa-list-ul mt-1"></i></button>
                                        <button onclick="changeView(0)"
                                            class="btn btn-primary btn-outline btn-flat btn-sm"><i
                                                class="fa  fa-th-large mt-1"></i></button>
                                    </div>
                                </div>
                            </div> --}}

                            <div id="isList">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3 class="col-md-12"> <i class="fa fa-star-o text-qrRest"></i>Drinks</h3>
                                    </div>
                                    <div class="ibox-content ibox-br">
                                        <div class="sk-spinner sk-spinner-wave">
                                            <div class="sk-rect1"></div>
                                            <div class="sk-rect2"></div>
                                            <div class="sk-rect3"></div>
                                            <div class="sk-rect4"></div>
                                            <div class="sk-rect5"></div>
                                        </div>
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td class="">
                                                        <img src="/images/sp1.jpg" alt="" width="90%">
                                                    </td>
                                                    <td style="width:70%;" class="cart-item-upFont">
                                                        Cola<br />
                                                        <a class="text-menu-description text-muted">with iced
                                                            service</a>
                                                    </td>
                                                    <td class="cart-item-upFont">
                                                        10.000
                                                    </td>
                                                    <td class="actionOfMenu">
                                                        <div class="row">
                                                            <input class="menu-quantity-input ml-3" id="txtQuantity-3"
                                                                value="1" />
                                                            <div onclick="addTocart('3', true)"
                                                                class="menu-button ml-1">
                                                                <i class="fa fa-plus" style="margin-top:5px"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br />
                    <br />

                    <div class="modal inmodal" id="modal-dialog" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <h4 id="txtMenuName" class="modal-title mx-auto"></h4>
                                </div>
                                <div class="ibox no-margins" id="boxBA">
                                    <div class="first ibox-content" style="border-top:none;padding:0">
                                        <div class="sk-spinner sk-spinner-wave">
                                            <div class="sk-rect1"></div>
                                            <div class="sk-rect2"></div>
                                            <div class="sk-rect3"></div>
                                            <div class="sk-rect4"></div>
                                            <div class="sk-rect5"></div>
                                        </div>

                                        <div class="content">
                                            <div class="numbers-row">
                                                <input type="text" value="1" id="qty_1"
                                                    class="qty2 form-control" name="quantity">
                                            </div>
                                            <span id="txtFeatureValidation" class="text-danger"></span>
                                            <div id="menuFeatureList">
                                            </div>

                                        </div>
                                        <div class="footer" style="position:inherit">
                                            <div class="row small-gutters">
                                                <div class="col-4">
                                                    <button onclick="cancelModal()"
                                                        class="btn btn-sm btn-outline btn-default btn-block">
                                                        Cancel
                                                        <i class="fa fa-times mt-1"></i>
                                                    </button>
                                                </div>
                                                <div class="col-8">
                                                    <button onclick="addTocart(0, false)"
                                                        class="btn btn-sm btn-outline btn-primary btn-block">
                                                        add
                                                        <i class="fa fa-long-arrow-right mt-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /Row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal inmodal" id="call-done-modal" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="ibox">
                                    <div class="ibox-content">
                                        <p class="p-y m-t text-center">
                                            <i class="fa fa-check fa-5x text-success"></i>
                                        </p>
                                        <div class="modal-body">
                                            <h3 class="text-center"> We are coming as soon as possible </h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary text-white"
                                                data-dismiss="modal" style="color:#910400;">Okey</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="footer exact-fit">
                <div class="container" id="lg-footer">
                    <div class="float-right"> <strong>Version</strong> 1.0.0</div>
                    <div> &#xA9; 2023</div>
                </div>
                <div class="container" id="sm-footer">
                    <div class="text-center count-info">
                        <button onclick="goToPanel()" class="btn btn-default mobile-cart btn-lg"><i
                                class="fa fa-cog"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/toastr/toastr.min.js') }}"></script>

    <script src="/js/menuController.js"></script>

</body>

</html>
