@extends('admin.layout.app')

@section('title')
    Admin | Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header ribbon ribbon-top ribbon-ver border-0 ">
                <div class="ribbon-target bg-danger" style="top: -2px; right: 20px;">
                    <i class="fa fa-star text-white"></i>
                </div>
                <div class="card-title">
                    <div class="card-label">
                        <div class="font-size-h3 font-weight-bolder">Donor</div>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-1 d-flex flex-column">
                <!--begin::Items-->
                <div class="mb-0">
                    <div class="row row-paddingless">
                        <!--begin::Item-->
                        <div class="col mt-1">
                            <div class="d-flex align-items-center mr-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                                    <div class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-danger">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\General\Heart.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </span>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div>
                                    <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                       {{ $donCount }}
                                    </div>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">Total</div>
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header ribbon ribbon-top ribbon-ver border-0 ">
                <div class="ribbon-target bg-danger" style="top: -2px; right: 20px;">
                    <i class="fa fa-star text-white"></i>
                </div>
                <div class="card-title">
                    <div class="card-label">
                        <div class="font-size-h3 font-weight-bolder">Blood Bag</div>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-1 d-flex flex-column">
                <!--begin::Items-->
                <div class="mb-0">
                    <div class="row row-paddingless">
                        <!--begin::Item-->
                        <div class="col mt-1">
                            <div class="d-flex align-items-center mr-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                                    <div class="symbol-label">
                                        <span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Shopping\Bag2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M5.94290508,4 L18.0570949,4 C18.5865712,4 19.0242774,4.41271535 19.0553693,4.94127798 L19.8754445,18.882556 C19.940307,19.9852194 19.0990032,20.9316862 17.9963398,20.9965487 C17.957234,20.9988491 17.9180691,21 17.8788957,21 L6.12110428,21 C5.01653478,21 4.12110428,20.1045695 4.12110428,19 C4.12110428,18.9608266 4.12225519,18.9216617 4.12455553,18.882556 L4.94463071,4.94127798 C4.97572263,4.41271535 5.41342877,4 5.94290508,4 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M7,7 L9,7 C9,8.65685425 10.3431458,10 12,10 C13.6568542,10 15,8.65685425 15,7 L17,7 C17,9.76142375 14.7614237,12 12,12 C9.23857625,12 7,9.76142375 7,7 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div>
                                    <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                       {{ $bloodCount }}
                                    </div>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">Total</div>
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header ribbon ribbon-top ribbon-ver border-0 ">
                <div class="ribbon-target bg-primary" style="top: -2px; right: 20px;">
                    <i class="fa fa-star text-white"></i>
                </div>
                <div class="card-title">
                    <div class="card-label">
                        <div class="font-size-h3 font-weight-bolder">Male</div>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-1 d-flex flex-column">
                <!--begin::Items-->
                <div class="mb-0">
                    <div class="row row-paddingless">
                        <!--begin::Item-->
                        <div class="col mt-1">
                            <div class="d-flex align-items-center mr-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                    <div class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-primary">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Clothes\Tie.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M14.1124454,7.00625159 C14.0755336,7.00212117 14.0380145,7 14,7 L10,7 C9.96198549,7 9.92446641,7.00212117 9.88755465,7.00625159 L7.34761705,4.55799196 C6.95060373,4.17530866 6.9382927,3.54346816 7.32009765,3.14561006 L8.41948359,2 L15.5805164,2 L16.6799023,3.14561006 C17.0617073,3.54346816 17.0493963,4.17530866 16.6523829,4.55799196 L14.1124454,7.00625159 Z" fill="#000000"/>
                                                    <path d="M13.7640285,9 L15.4853424,18.1494183 C15.5450675,18.4668794 15.4477627,18.7936387 15.2240963,19.0267093 L12.7215131,21.6345146 C12.7120098,21.6444174 12.7023037,21.6541236 12.6924008,21.6636269 C12.2939201,22.0460293 11.6608893,22.0329953 11.2784869,21.6345146 L8.77590372,19.0267093 C8.55223728,18.7936387 8.45493249,18.4668794 8.5146576,18.1494183 L10.2359715,9 L13.7640285,9 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </span>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div>
                                    <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                       {{ $male}}
                                    </div>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">Total Male</div>
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header ribbon ribbon-top ribbon-ver border-0 ">
                <div class="ribbon-target bg-success" style="top: -2px; right: 20px;">
                    <i class="fa fa-star text-white"></i>
                </div>
                <div class="card-title">
                    <div class="card-label">
                        <div class="font-size-h3 font-weight-bolder">Female</div>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-1 d-flex flex-column">
                <!--begin::Items-->
                <div class="mb-0">
                    <div class="row row-paddingless">
                        <!--begin::Item-->
                        <div class="col mt-1">
                            <div class="d-flex align-items-center mr-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
                                    <div class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-success">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                            <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Clothes\Shoes.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M4.35382545,3.51940376 C6.20314785,4.719483 7.41853936,6.04634841 8,7.5 C8.53027592,8.8256898 9.58778788,10.5731684 11.1725359,12.7424359 L11.172541,12.7424321 C11.942465,13.7963354 13.3054464,14.2315179 14.543649,13.8187837 L16.5029346,13.1656885 C16.8142402,13.0619199 17.1566464,13.1174848 17.4191624,13.3143718 L22.0098387,16.757379 C22.2307526,16.9230645 22.2755242,17.2364651 22.1098387,17.457379 C22.0284486,17.5658993 21.9064589,17.6366926 21.7718561,17.653518 L13.3911672,18.7011121 C11.9299707,18.8837616 10.4865853,18.248799 9.63388047,17.0482364 C8.12985357,14.9306473 7.08522674,13.5812351 6.5,13 C5.79078111,12.2956184 4.85091459,11.4260353 3.68040043,10.3912505 L3.6804015,10.3912493 C2.37085218,9.23355149 1.90266445,7.39267277 2.5,5.75 L3.16654581,3.91707883 C3.31753225,3.50186612 3.77652734,3.28766841 4.19174005,3.43865485 C4.24865064,3.45934961 4.3030274,3.48643943 4.35382545,3.51940376 Z" fill="#000000"/>
                                                    <path d="M2.5,8.5 C3.16666667,11.8333333 3.5,14 3.5,15 C3.5,16 3.5,17.3333333 3.5,19 L5,19 C5,16.3333333 5,14.5833333 5,13.75 C5,12.9166667 5.5,12.6666667 6.5,13 L2.5,8.5 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </span>
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div>
                                    <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                       {{ $female}}
                                    </div>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">Total Female</div>
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card card-custom card-stretch gutter-b ">
            <div class="card-header h-auto border-0">
                <div class="card-title">
                    <h3 class="card-label">
                        <span class="d-block text-dark font-weight-bolder">Blood Type</span>
                    </h3>
                </div>
            </div>
            <div class="card-body pt-0 pb-0">
                <div id="chart1">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                data: [{{ $pA }}, {{ $nA}}, {{ $pB }}, {{ $nB }}, {{ $pO }}, {{ $nO }}, {{ $pAB }}, {{ $nAB }}
                ]
            }],
            chart: {
                type: 'bar',
                height: 375
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '40%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: true,

            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'
                ],
            },
            fill: {
                opacity: 1
            },
            noData: {
                text: 'Loading ....',
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    </script>
@endpush
