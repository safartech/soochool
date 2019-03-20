<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Crypto Dashboard - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin Dashboard</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/modern/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('modern/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/vendors/css/cryptocoins/cryptocoins.css') }}">
    <!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
    @yield('css')
    <style>
        .select2{
            width: 100% !important;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modern/css/style.css') }}">
<!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<!-- fixed-top-->
@include('layouts.navbars.modern.main')

<!-- ////////////////////////////////////////////////////////////////////////////-->

@include('layouts.sidebars.modern.main')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body"><div id="crypto-stats-3" class="row">
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="cc BTC warning font-large-2" title="BTC"></i>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4>BTC</h4>
                                        <h6 class="text-muted">Bitcoin</h6>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>$9,980</h4>
                                        <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><canvas id="btc-chartjs" class="height-75"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4>ETH</h4>
                                        <h6 class="text-muted">Ethereum</h6>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>$944</h4>
                                        <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><canvas id="eth-chartjs" class="height-75"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">

                                <div class="row justify-content-around">
                                    <div>
                                        <i class="cc XRP info font-large-2" title="XRP"></i>
                                    </div>
                                    <div>
                                        <h4>XRP</h4>
                                        <h6 class="text-muted">Balance</h6>
                                    </div>
                                    <div class="text-right">
                                        <h4>$1.2</h4>
                                        <h6 class="danger">20% <i class="la la-arrow-down"></i></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><canvas id="xrp-chartjs" class="height-75"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Candlestick Multi Level Control Chart -->

            <!-- Slaes & Purchase Order -->
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div id="accordionCrypto" role="tablist" aria-multiselectable="true">
                        <div class="card collapse-icon accordion-icon-rotate">

                            <div id="heading31" class="card-header bg-info p-1 bg-lighten-1">
                                <a data-toggle="collapse" data-parent="#accordionCrypto" href="#accordionBTC" aria-expanded="true"
                                   aria-controls="accordionBTC" class="card-title lead white">BTC</a>
                            </div>
                            <div id="accordionBTC" role="tabpanel" aria-labelledby="heading31" class="card-collapse collapse show"
                                 aria-expanded="true">
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <div class="media-list list-group">
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                                                    <div class="media-left">
                                                        <p class="text-bold-600 m-0">BTC/USD</p>
                                                        <p class="font-small-2 text-muted m-0">24h Change</p>
                                                        <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                    </div>
                                                    <div class="media-body text-right">
                                                        <p class="text-bold-600 m-0">11916.9</p>
                                                        <p class="font-small-2 text-muted m-0 success">283.1 USD (+2.33%)</p>
                                                        <p class="font-small-2 text-muted m-0 text-bold-600">1029.1906 BTC</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1 bg-info bg-lighten-5">
                                                <a class="media-link" href="#">
                                                    <div class="media-left">
                                                        <p class="text-bold-600 m-0">BTC/EUR</p>
                                                        <p class="font-small-2 text-muted m-0">24h Change</p>
                                                        <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                    </div>
                                                    <div class="media-body text-right">
                                                        <p class="text-bold-600 m-0">9213.3</p>
                                                        <p class="font-small-2 text-muted m-0 success">56.1 EUR (+5.52%)</p>
                                                        <p class="font-small-2 text-muted m-0 text-bold-600">560.1906 BTC</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1 border-bottom-0">
                                                <a class="media-link" href="#">
                                                    <div class="media-left">
                                                        <p class="text-bold-600 m-0">BTC/GBP</p>
                                                        <p class="font-small-2 text-muted m-0">24h Change</p>
                                                        <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                    </div>
                                                    <div class="media-body text-right">
                                                        <p class="text-bold-600 m-0">8015.1</p>
                                                        <p class="font-small-2 text-muted m-0 danger">-183.1 USD (-1.33%)</p>
                                                        <p class="font-small-2 text-muted m-0 text-bold-600">320.1906 BTC</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="heading32" class="card-header bg-info p-1 bg-lighten-1 my-1">
                                <a data-toggle="collapse" data-parent="#accordionCrypto" href="#accordionETH" aria-expanded="false"
                                   aria-controls="accordionETH" class="card-title lead white collapsed">ETH</a>
                            </div>
                            <div id="accordionETH" role="tabpanel" aria-labelledby="heading32" class="card-collapse collapse"
                                 aria-expanded="false">
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <div class="media-list list-group">
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                                                    <div class="media-left">
                                                        <p class="text-bold-600 m-0">ETH/USD</p>
                                                        <p class="font-small-2 text-muted m-0">24h Change</p>
                                                        <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                    </div>
                                                    <div class="media-body text-right">
                                                        <p class="text-bold-600 m-0">11916.9</p>
                                                        <p class="font-small-2 text-muted m-0 success">283.1 USD (+2.33%)</p>
                                                        <p class="font-small-2 text-muted m-0 text-bold-600">1029.1906 ETH</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                                                    <div class="media-left">
                                                        <p class="text-bold-600 m-0">ETH/EUR</p>
                                                        <p class="font-small-2 text-muted m-0">24h Change</p>
                                                        <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                    </div>
                                                    <div class="media-body text-right">
                                                        <p class="text-bold-600 m-0">9213.3</p>
                                                        <p class="font-small-2 text-muted m-0 success">56.1 EUR (+5.52%)</p>
                                                        <p class="font-small-2 text-muted m-0 text-bold-600">560.1906 ETH</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1 border-bottom-0">
                                                <a class="media-link" href="#">
                                                    <div class="media-left">
                                                        <p class="text-bold-600 m-0">ETH/GBP</p>
                                                        <p class="font-small-2 text-muted m-0">24h Change</p>
                                                        <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                    </div>
                                                    <div class="media-body text-right">
                                                        <p class="text-bold-600 m-0">8015.1</p>
                                                        <p class="font-small-2 text-muted m-0 danger">-183.1 USD (-1.33%)</p>
                                                        <p class="font-small-2 text-muted m-0 text-bold-600">320.1906 ETH</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="heading33" class="card-header bg-info p-1 bg-lighten-1">
                                <a data-toggle="collapse" data-parent="#accordionCrypto" href="#accordionXRP" aria-expanded="false"
                                   aria-controls="accordionXRP" class="card-title lead white collapsed">XRP</a>
                            </div>
                            <div id="accordionXRP" role="tabpanel" aria-labelledby="heading33" class="card-collapse collapse"
                                 aria-expanded="false">
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <div class="media-list list-group">
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                                                    <div class="media-left">
                                                        <p class="text-bold-600 m-0">XRP/USD</p>
                                                        <p class="font-small-2 text-muted m-0">24h Change</p>
                                                        <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                    </div>
                                                    <div class="media-body text-right">
                                                        <p class="text-bold-600 m-0">11916.9</p>
                                                        <p class="font-small-2 text-muted m-0 success">283.1 USD (+2.33%)</p>
                                                        <p class="font-small-2 text-muted m-0 text-bold-600">1029.1906 XRP</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1">
                                                <a class="media-link" href="#">
                                                    <div class="media-left">
                                                        <p class="text-bold-600 m-0">XRP/EUR</p>
                                                        <p class="font-small-2 text-muted m-0">24h Change</p>
                                                        <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                    </div>
                                                    <div class="media-body text-right">
                                                        <p class="text-bold-600 m-0">9213.3</p>
                                                        <p class="font-small-2 text-muted m-0 success">56.1 EUR (+5.52%)</p>
                                                        <p class="font-small-2 text-muted m-0 text-bold-600">560.1906 XRP</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="list-group-item list-group-item-action media p-1 border-bottom-0">
                                                <a class="media-link" href="#">
                                                    <div class="media-left">
                                                        <p class="text-bold-600 m-0">XRP/GBP</p>
                                                        <p class="font-small-2 text-muted m-0">24h Change</p>
                                                        <p class="font-small-2 text-muted m-0">24h Volume</p>
                                                    </div>
                                                    <div class="media-body text-right">
                                                        <p class="text-bold-600 m-0">8015.1</p>
                                                        <p class="font-small-2 text-muted m-0 danger">-183.1 USD (-1.33%)</p>
                                                        <p class="font-small-2 text-muted m-0 text-bold-600">320.1906 XRP</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">BTC/USD</h4>

                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li class="text-center mr-4">
                                        <h6 class="text-muted">Last price</h6>
                                        <p class="text-bold-600 mb-0">$ 11916.9</p>
                                    </li>
                                    <li class="text-center mr-4">
                                        <h6 class="text-muted">Daily change</h6>
                                        <p class="text-bold-600 mb-0">$ 283.1</p>
                                    </li>
                                    <li class="text-center">
                                        <h6 class="text-muted">24h volume</h6>
                                        <p class="text-bold-600 mb-0"><i class="cc BTC-alt" title="BTC"></i> 1029.1906 BTC</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body pt-0">
                                <div id="btc-candlestick-control" class="height-350 echart-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trade History & Place Order -->
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Trade History</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn round btn-sm btn-outline-info active">
                                        <input type="radio" name="options" id="option1" checked> Market
                                    </label>
                                    <label class="btn round btn-sm btn-outline-info">
                                        <input type="radio" name="options" id="option2"> Yours
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive mt-1">
                                <table class="table table-xs">
                                    <thead>
                                    <tr>
                                        <th>Price($)</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="success">11900.12</td>
                                        <td><i class="cc BTC-alt"></i> 0.215</td>
                                        <td>11:23:25</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11903.18</td>
                                        <td><i class="cc BTC-alt"></i> 1.545</td>
                                        <td>11:23:05</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11899.56</td>
                                        <td><i class="cc BTC-alt"></i> 0.541</td>
                                        <td>11:22:50</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11910.52</td>
                                        <td><i class="cc BTC-alt"></i> 0.321</td>
                                        <td>11:22:15</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11901.15</td>
                                        <td><i class="cc BTC-alt"></i> 0.548</td>
                                        <td>11:21:25</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11903.45</td>
                                        <td><i class="cc BTC-alt"></i> 0.587</td>
                                        <td>11:21:01</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11895.50</td>
                                        <td><i class="cc BTC-alt"></i> 5.125</td>
                                        <td>11:20:15</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11889.56</td>
                                        <td><i class="cc BTC-alt"></i> 0.894</td>
                                        <td>11:20:03</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11885.69</td>
                                        <td><i class="cc BTC-alt"></i> 0.754</td>
                                        <td>11:19:55</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11891.12</td>
                                        <td><i class="cc BTC-alt"></i> 0.889</td>
                                        <td>11:19:15</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">11889.88</td>
                                        <td><i class="cc BTC-alt"></i> 0.654</td>
                                        <td>11:18:18</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11881.15</td>
                                        <td><i class="cc BTC-alt"></i> 1.254</td>
                                        <td>11:18:01</td>
                                    </tr>
                                    <tr>
                                        <td class="success">11875.75</td>
                                        <td><i class="cc BTC-alt"></i> 0.885</td>
                                        <td>11:17:25</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Place Order</h4>
                            <div class="heading-elements">
                                <h6 class="danger">Fee: 0.2%</h6>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-underline no-hover-bg">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-limit" data-toggle="tab" aria-controls="limit" href="#limit"
                                           aria-expanded="true">Limit</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-market" data-toggle="tab" aria-controls="market" href="#market"
                                           aria-expanded="false">Market</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-stop-limit" data-toggle="tab" aria-controls="stop-limit" href="#stop-limit"
                                           aria-expanded="false">Stop Limit</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane active" id="limit" aria-expanded="true" aria-labelledby="base-limit">
                                        <div class="row">
                                            <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4 pr-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Buy BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">USD Balance: $ 5000.00</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-limit-buy-price">Price</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-limit-buy-price" class="form-control"
                                                                       placeholder="$ 11916.9" name="btc-limit-buy-price">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-limit-buy-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-limit-buy-amount" class="form-control"
                                                                       placeholder="0.026547 BTC" name="btc-limit-buy-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">25%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">50%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">75%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">100%</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-limit-buy-total">Total</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-limit-buy-total" class="form-control"
                                                                       placeholder="$ 318.1856" name="btc-limit-buy-total">
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit" class="btn round btn-success btn-block btn-glow">
                                                                Buy BTC </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-12 col-xl-6 pl-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Sell BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">BTC Balance: 1.2654898</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-labtc-pricbel" for="btc-price">Price</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-price" class="form-control"
                                                                       placeholder="$ 11916.9" name="btc-limit-sell-price">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-limit-sell-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-limit-sell-amount" class="form-control"
                                                                       placeholder="0.026547 BTC" name="btc-limit-sell-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">25%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">50%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">75%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">100%</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-limit-sell-total">Total</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-limit-sell-total" class="form-control"
                                                                       placeholder="$ 318.1856" name="btc-limit-sell-total">
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit" class="btn round btn-danger btn-block btn-glow">
                                                                Sell BTC </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="market" aria-labelledby="base-market">
                                        <div class="row">
                                            <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4 pr-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Buy BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">USD Balance: $ 5000.00</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-market-buy-price">Price</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-market-buy-price" class="form-control"
                                                                       placeholder="Market prise $" name="btc-market-buy-price">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-market-buy-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-market-buy-amount" class="form-control"
                                                                       placeholder="0.026547 BTC" name="btc-market-buy-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">25%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">50%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">75%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">100%</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit" class="btn round btn-success btn-block btn-glow">
                                                                Buy BTC </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-12 col-xl-6 pl-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Sell BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">BTC Balance: 1.2654898</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-mrk-price">Price</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-mrk-price" class="form-control"
                                                                       placeholder="Market prise $" name="btc-market-sell-price">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-market-sell-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-market-sell-amount" class="form-control"
                                                                       placeholder="0.026547 BTC" name="btc-market-sell-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">25%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">50%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">75%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">100%</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit" class="btn round btn-danger btn-block btn-glow">
                                                                Sell BTC </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="stop-limit" aria-labelledby="base-stop-limit">
                                        <div class="row">
                                            <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4 pr-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Buy BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">USD Balance: $ 5000.00</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-buy">Stop</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-buy" class="form-control"
                                                                       placeholder="$ 11916.9" name="btc-stop-buy">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-buy-limit">Limit</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-buy-limit" class="form-control"
                                                                       placeholder="$ 12000.0" name="btc-stop-buy-limit">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-buy-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-buy-amount" class="form-control"
                                                                       placeholder="0.026547 BTC" name="btc-stop-buy-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">25%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">50%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">75%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">100%</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-buy-total">Total</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-stop-buy-total" class="form-control"
                                                                       placeholder="$ 318.1856" name="btc-stop-buy-total">
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit" class="btn round btn-success btn-block btn-glow">
                                                                Buy BTC </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-12 col-xl-6 pl-2 p-0">
                                                <div class="row my-2">
                                                    <div class="col-4">
                                                        <h5 class="text-bold-600 mb-0">Sell BTC</h5>
                                                    </div>
                                                    <div class="col-8 text-right">
                                                        <p class="text-muted mb-0">BTC Balance: 1.2654898</p>
                                                    </div>
                                                </div>
                                                <form class="form form-horizontal">
                                                    <div class="form-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-sell">Stop</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-sell" class="form-control"
                                                                       placeholder="$ 11916.9" name="btc-stop-sell">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-sell-limit">Limit</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-sell-limit" class="form-control"
                                                                       placeholder="$ 12000.0" name="btc-stop-sell-limit">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-sell-amount">Amount</label>
                                                            <div class="col-md-9">
                                                                <input type="number" id="btc-stop-sell-amount" class="form-control"
                                                                       placeholder="0.026547 BTC" name="btc-stop-sell-amount">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3"></div>
                                                            <div class="col-md-9">
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">25%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">50%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">75%</button>
                                                                <button type="button" class="btn round btn-outline-secondary btn-sm">100%</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="btc-stop-sell-total">Total</label>
                                                            <div class="col-md-9">
                                                                <input type="number" disabled id="btc-stop-sell-total" class="form-control"
                                                                       placeholder="$ 318.1856" name="btc-stop-sell-total">
                                                            </div>
                                                        </div>
                                                        <div class="form-actions pb-0">
                                                            <button type="submit" class="btn round btn-danger btn-block btn-glow">
                                                                Sell BTC </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Trade History & Place Order -->


            <!-- Sell Orders & Buy Order -->
            <div class="row match-height">
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sell Order</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">Total BTC available: 6542.56585</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>Price per BTC</th>
                                        <th>BTC Ammount</th>
                                        <th>Total($)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-success bg-lighten-5">
                                        <td>10583.4</td>
                                        <td><i class="cc BTC-alt"></i> 0.45000000</td>
                                        <td>$ 4762.53</td>
                                    </tr>
                                    <tr>
                                        <td>10583.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.04000000</td>
                                        <td>$ 423.34</td>
                                    </tr>
                                    <tr>
                                        <td>10583.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.25100000</td>
                                        <td>$ 2656.51</td>
                                    </tr>
                                    <tr>
                                        <td>10583.8</td>
                                        <td><i class="cc BTC-alt"></i> 0.35000000</td>
                                        <td>$ 3704.33</td>
                                    </tr>
                                    <tr>
                                        <td>10595.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.30000000</td>
                                        <td>$ 3178.71</td>
                                    </tr>
                                    <tr class="bg-danger bg-lighten-5">
                                        <td>10599.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.02000000</td>
                                        <td>$ 211.99</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buy Order</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">Total USD available: 9065930.43</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>Price per BTC</th>
                                        <th>BTC Ammount</th>
                                        <th>Total($)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-danger bg-lighten-5">
                                        <td>10599.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.02000000</td>
                                        <td>$ 211.99</td>
                                    </tr>
                                    <tr>
                                        <td>10583.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.04000000</td>
                                        <td>$ 423.34</td>
                                    </tr>
                                    <tr>
                                        <td>10583.8</td>
                                        <td><i class="cc BTC-alt"></i> 0.35000000</td>
                                        <td>$ 3704.33</td>
                                    </tr>
                                    <tr>
                                        <td>10595.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.30000000</td>
                                        <td>$ 3178.71</td>
                                    </tr>
                                    <tr class="bg-danger bg-lighten-5">
                                        <td>10583.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.25100000</td>
                                        <td>$ 2656.51</td>
                                    </tr>
                                    <tr>
                                        <td>10595.8</td>
                                        <td><i class="cc BTC-alt"></i> 0.29697926</td>
                                        <td>$ 3146.74</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sell Orders & Buy Order -->

            <!-- Active Orders -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Active Order</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i>
                                    Cancel all</button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount BTC</th>
                                        <th>BTC Remaining</th>
                                        <th>Price</th>
                                        <th>USD</th>
                                        <th>Fee (%)</th>
                                        <th>Cancel</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td>11900.12</td>
                                        <td>$ 6979.78</td>
                                        <td>0.2</td>
                                        <td><button class="btn btn-sm round btn-outline-danger"> Cancel</button></td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:50:50</td>
                                        <td class="danger">Sell</td>
                                        <td><i class="cc BTC-alt"></i> 1.38647</td>
                                        <td><i class="cc BTC-alt"></i> 0.38647</td>
                                        <td>11905.09</td>
                                        <td>$ 4600.97</td>
                                        <td>0.2</td>
                                        <td><button class="btn btn-sm round btn-outline-danger"> Cancel</button></td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:49:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.45879</td>
                                        <td><i class="cc BTC-alt"></i> 0.45879</td>
                                        <td>11901.85</td>
                                        <td>$ 5460.44</td>
                                        <td>0.2</td>
                                        <td><button class="btn btn-sm round btn-outline-danger"> Cancel</button></td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.89877</td>
                                        <td><i class="cc BTC-alt"></i> 0.89877</td>
                                        <td>11899.25</td>
                                        <td>$ 10694.6</td>
                                        <td>0.2</td>
                                        <td><button class="btn btn-sm round btn-outline-danger"> Cancel</button></td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="danger">Sell</td>
                                        <td><i class="cc BTC-alt"></i> 0.45712</td>
                                        <td><i class="cc BTC-alt"></i> 0.45712</td>
                                        <td>11908.58</td>
                                        <td>$ 5443.65</td>
                                        <td>0.2</td>
                                        <td><button class="btn btn-sm round btn-outline-danger"> Cancel</button></td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td>11900.12</td>
                                        <td>$ 6979.78</td>
                                        <td>0.2</td>
                                        <td><button class="btn btn-sm round btn-outline-danger"> Cancel</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Active Orders -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('assets/modern/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('assets/modern/vendors/js/charts/chart.min.js') }}"></script>
<script src="{{ asset('assets/modern/vendors/js/charts/echarts/echarts.js') }}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset('assets/modern/js/core/app-menu.js') }}"></script>
<script src="{{ asset('assets/modern/js/core/app.js') }}"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('assets/modern/js/scripts/pages/dashboard-crypto.js') }}"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>