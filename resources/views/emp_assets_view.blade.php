<!-- Your existing HTML code -->
@extends('layouts.app')

@section('content')
    <main class="app-content">

        <div class="container">
            <div class="row">
                <!-- Column for images carousel -->
                {{-- {!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!} --}}

                <div class="col-sm-6">
                    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $imagePaths = [];
                            @endphp
                            @if (!empty($assetdetails->file_paths))
                                @php
                                    $imagePaths = json_decode($assetdetails->file_paths, true);
                                @endphp
                            @endif
                            @if (count($imagePaths) > 0)
                                @foreach ($imagePaths as $index => $filePath)
                                    <div class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                                        <img src="{{ url($filePath) }}" class="d-block w-100" alt="Asset Image">
                                    </div>
                                @endforeach
                            @else
                                <p><img width="500px" src="{{ asset('images/noimage.jpg')}}"></p>
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="clearfix">
                        <div id="thumbcarousel" class="carousel slide" data-interval="false">
                            <div class="carousel-inner">
                                <div class="item active">
                                    @if (!empty($assetdetails->file_paths))
                                        @php
                                            $imagePaths = json_decode($assetdetails->file_paths, true);
                                        @endphp
                                        @foreach ($imagePaths as $index => $filePath)
                                            <div data-target="#imageCarousel" data-slide-to="{{ $index }}"
                                                class="thumb">
                                                <img src="{{ url($filePath) }}" alt="Thumbnail Image">
                                            </div>
                                        @endforeach
                                    @else
                                        {{-- <p>No thumbnails available for this asset.</p> --}}
                                    @endif
                                </div><!-- /item -->
                            </div><!-- /carousel-inner -->
                            <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div> <!-- /thumbcarousel -->
                    </div><!-- /clearfix -->
                </div><!---col-sm-6---->

                <!-- Column for motor details form -->
                <div class="col-sm-6">
                    <div class="card-body">
                        <div class="card-header">
                            <h4>ASSETS DETAILS</h4>
                        </div>
                        <br />
                        <!-- Add a border around the details using the CSS class -->
                        <div class="asset-details-box">
                            <dl class="row">
                                <dt class="col-sm-4">Type:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->type ?? '' }}</dd>

                                <dt class="col-sm-4">Product Name:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->product_name ?? '' }}</dd>

                                <dt class="col-sm-4">Model:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->model ?? '' }}</dd>

                                <dt class="col-sm-4">Make:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->make ?? '' }}</dd>

                                <dt class="col-sm-4">Serial No:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->serial_no ?? '' }}</dd>

                                <dt class="col-sm-4">Location:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->location ?? '' }}</dd>

                                <dt class="col-sm-4">Asset Value:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->asset_value ?? '' }}</dd>

                                <dt class="col-sm-4">Asset Specs:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->asset_specs ?? '' }}</dd>

                                <dt class="col-sm-4">Employee Id:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->emp_id ?? '' }}</dd>

                                <dt class="col-sm-4">Employee Name:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->emp_name ?? '' }}</dd>

                                <dt class="col-sm-4">Warranty Start Date:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->warranty_start_date ? date('d-m-Y', strtotime($assetdetails->warranty_start_date)) : '' }}</dd>

                                <dt class="col-sm-4">Warranty End Date:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->warranty_end_date ? date('d-m-Y', strtotime($assetdetails->warranty_end_date)) : '' }}</dd>

                                <dt class="col-sm-4">Date of Purchase:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->date_of_purchase ? date('d-m-Y', strtotime($assetdetails->date_of_purchase)) : '' }}</dd>

                                <dt class="col-sm-4">Vendor Name:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->vendor_name ?? '' }}</dd>

                                <dt class="col-sm-4">Vendor Bill Number:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->vendor_bill_no ?? '' }}</dd>

                                <dt class="col-sm-4">Invoice Value:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->invoice_value ?? '' }}</dd>

                                <dt class="col-sm-4">Parent Asset Code:</dt>
                                <dd class="col-sm-8">{{ $assetdetails->parent_asset_code ?? '' }}</dd>

                                <dt class="col-sm-4">QR Code:</dt>
                                <dd class="col-sm-8">
                                    <a href="{{ url('asset-details', $assetdetails->unique_id) }}" target="_blank">
                                        {!! QrCode::size(130)->generate(url('asset-details', $assetdetails->unique_id)) !!}
                                    </a>
                                </dd>
                                {{-- <dd class="col-sm-8">
                                    {!! QrCode::size(130)->generate(url('asset-details', $assetdetails->unique_id)) !!}
                                </dd> --}}
                            </dl>
                        </div> <!-- End of the box -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

<!-- Add Bootstrap JS file -->
