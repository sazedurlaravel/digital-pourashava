@extends('pourashava_frontend.layouts.app')

@section('style')
    <style>
        body,
        html {
            height: 100%;
        }


        /* remove outer padding */
        .main .row {
            padding: 0px;
            margin: 0px;
        }

        /* ul.nav li:hover > ul.dropdown-menu {
                            display: none;
                        } */

        /*Remove rounded coners*/

        nav.sidebar.navbar {
            border-radius: 0px;
        }

        nav.sidebar,
        .main {
            -webkit-transition: margin 200ms ease-out;
            -moz-transition: margin 200ms ease-out;
            -o-transition: margin 200ms ease-out;
            transition: margin 200ms ease-out;
        }

        /* Add gap to nav and right windows.*/
        .main {
            padding: 10px 10px 0 10px;
        }

        /* .....NavBar: Icon only with coloring/layout.....*/

        /*small/medium side display*/
        @media (min-width: 768px) {

            /*Allow main to be next to Nav*/
            .main {
                position: absolute;
                width: calc(100% - 40px);
                /*keeps 100% minus nav size*/
                margin-left: 40px;
                float: right;
            }

            /*lets nav bar to be showed on mouseover*/
            nav.sidebar:hover+.main {
                margin-left: 200px;
            }

            /*Center Brand*/
            nav.sidebar.navbar.sidebar>.container .navbar-brand,
            .navbar>.container-fluid .navbar-brand {
                margin-left: 0px;
            }

            /*Center Brand*/
            nav.sidebar .navbar-brand,
            nav.sidebar .navbar-header {
                text-align: center;
                width: 100%;
                margin-left: 0px;
            }

            /*Center Icons*/
            nav.sidebar a {
                padding-right: 13px;
            }

            /*adds border top to first nav box */
            nav.sidebar .navbar-nav>li:first-child {
                border-top: 1px #e5e5e5 solid;
            }

            /*adds border to bottom nav boxes*/
            nav.sidebar .navbar-nav>li {
                border-bottom: 1px #e5e5e5 solid;
            }

            /* Colors/style dropdown box*/
            nav.sidebar .navbar-nav .open .dropdown-menu {
                position: static;
                float: none;
                width: auto;
                margin-top: 0;
                background-color: transparent;
                border: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
            }

            /*allows nav box to use 100% width*/
            nav.sidebar .navbar-collapse,
            nav.sidebar .container-fluid {
                padding: 0 0px 0 0px;
            }

            /*colors dropdown box text */
            .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
                color: #777;
            }

            /*gives sidebar width/height*/
            nav.sidebar {
                /* width: 200px; */
                height: 100%;
                float: left;
                z-index: 8000;
                margin-bottom: 0px;
            }

            /*give sidebar 100% width;*/
            nav.sidebar li {
                width: 100%;
                padding-right: 46px;
            }

            /* Move nav to full on mouse over*/
            nav.sidebar:hover {
                margin-left: 0px;
            }

            /*for hiden things when navbar hidden*/
            .forAnimate {
                opacity: 0;
            }
        }

        /* .....NavBar: Fully showing nav bar..... */

        @media (min-width: 1330px) {

            /*Allow main to be next to Nav*/
            .main {
                width: calc(100% - 200px);
                /*keeps 100% minus nav size*/
                margin-left: 200px;
            }

            /*Show all nav*/
            nav.sidebar {
                margin-left: 0px;
                float: left;
            }

            /*Show hidden items on nav*/
            nav.sidebar .forAnimate {
                opacity: 1;
            }
        }

        nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover,
        nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
            color: #CCC;
            background-color: transparent;
        }

        nav:hover .forAnimate {
            opacity: 1;
        }

        section {
            padding-left: 15px;
        }

    </style>
@endsection

@section('content')

    <main>
        <div class="container">
            <div class="row UMainContain" style="margin:10px 0;">
                <div class="col-sm-3 col-lg-3">
                    @include('pourashava_frontend.includes.sidebar')
                </div>
                <div class="col-sm-6 col-lg-9" style="padding:10px 10px;">
                    <div class="card card-info">
                        <div class="row">
                            <div class=" col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                                <h4 class="" style="font-weight: bold"> টোটাল ব্যালেন্স : {{$wallets->where('status',1)->sum('amount')}} টাকা </h4>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                                <a onclick="wallet_form('{{ route('pourashava_frontend.user.wallet.request',$pname) }}')"
                                    data-toggle="modal" data-target="#walletForm" href="#" class="btn btn-primary"> </i>
                                    রিকুয়েস্ট এড মানি </a>
                            </div>
                        </div>
                        <div class="card-body">



                            <table id="data_table" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th> সিরিয়াল </th>
                                        <th> টাকার পরিমান </th>
                                        <th> তারিখ </th>
                                        <th> স্ট্যাটাস </th>
                                        {{-- <th> অ্যাকশন </th> --}}

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($wallets as $wallet)
                                    <tr>
                                        <td> {{ ++$loop->index }} </td>
                                        <td> {{ $wallet->amount }} </td>
                                        <td> {{ $wallet->date }} </td>
                                        <td> @if ($wallet->status == 0)
                                            <a href="#" class="btn btn-warning">Pending</a>
                                            @else
                                            <a href="#" class="btn btn-success">Success</a>
                                            @endif
                                        </td>
                                        {{-- <td>
                                            {{-- <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                  <li><a href="#">Normal</a></li>
                                                  
                                                </ul>
                                              </div> 

                                            <div class="dropdown">
                                                <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-align-left"></i>
                                                </a>
                
                                                <div  @if ($wallet->status == 0) class="dropdown-menu dropdown-menu-right"  @endif aria-labelledby="dropdownMenuLink">
                                                
                                               
                                                    @if ($wallet->status == 0)
                                                    <a class="dropdown-item" onclick="wallet_form('{{ route('pourashava_frontend.user.wallet.update',[$pname, $wallet->id]) }}','{{ $wallet->amount }}')" data-toggle="modal" data-target="#walletForm" href="#"> এডিট </a>
                                                    @endif
                                                </div>
                                            </div> 
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>






                    {{-- modal form --}}
                    <div class="modal fade" id="walletForm" data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="walletFormLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="margin:100px">
                                <div class="modal-header">
                                
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="walletFormTag" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"> টাকার পরিমান:</label>
                                            <input type="hidden" name="pname" value="{{$pname}}" >
                                            <input type="text" name="amount"
                                                class="form-control @error('amount.*') is-invalid @enderror" id="amount"
                                                required>

                                            @error('amount.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="float-right">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> ক্যান্সেল
                                            </button>
                                            <button type="submit" class="btn btn-primary"> সেভ করুন </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function wallet_form(form_url, amount = null) {
            $("#walletFormTag").attr("action", form_url)

          if (amount) {
                // put method is not exist, add this field
                if (!$('#put_method').length) {
                    let put_method_field = `<input type='hidden' name='_method' id='put_method' value='put' />`
                    $("#walletFormTag").prepend(put_method_field)
                }

                // division value added in input field
                $("#amount").val(amount)

            } else {
                if ($('#put_method').length) {
                    // put method is exist, remove this field
                    $("#put_method").remove();
                }
            }
        }

    </script>
@endsection


@push('scripts')
   
@endpush
