@extends('layouts.app')

@section('content')
    <main class="app-content ">


        <div class="container ">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    // Clear the success message after a timeout (e.g., 5 seconds)
                    setTimeout(function() {
                        $('.alert').alert('close');
                    }, 5000);
                </script>
            @endif
            {{--  <h1>Employee Staff</h1> <hr>
      --}}
            {{--  <div class="row"> --}}
            {{--  <div class="col-md-2 "> --}}

            <div class="navigation">
                <ul class="nav nav-pills {{-- flex-column --}}" id="myTabs" role="tablist">

                    <li class="{{-- nav-item --}}list active">
                        <a class="{{-- nav-link --}} active" id="basic_information-tab" data-toggle="tab"
                            href="#basic_information" role="tab" aria-controls="home" aria-selected="true"
                            title="Basic Info">
                            {{-- <span class="icon"><ion-icon name="information-circle-outline"></ion-icon></span> --}}
                            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                            <span class="text">Basic Info</span>
                        </a>
                    </li>

                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}} " id="hr_information-tab" data-toggle="tab" href="#hr_information"
                            role="tab" aria-controls="contact" aria-selected="false" title="Hr Info">
                            <span class="icon"><ion-icon name="accessibility-outline"></ion-icon></span>
                            <span class="text">Hr Info</span>
                        </a>
                    </li>
                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}}" id="information-tab" data-toggle="tab" href="#information"
                            role="tab" aria-controls="contact" aria-selected="false" title="Personal Info">
                            <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                            <span class="text">Personal Info</span>
                        </a>
                    </li>
                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}}" id="familyinformation-tab" data-toggle="tab"
                            href="#familyinformation" role="tab" aria-controls="contact" aria-selected="false"
                            title="Family Info">
                            <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
                            <span class="text">Family Info</span>
                        </a>
                    </li>
                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}}" id="previous-tab" data-toggle="tab" href="#previous"
                            role="tab" aria-controls="contact" aria-selected="false" title="Previous Info">
                            {{-- <span class="icon"><ion-icon name="backspace-outline"></ion-icon></span> --}}
                            <span class="icon"><ion-icon name="arrow-back-outline"></ion-icon></span>
                            <span class="text">Previous Info</span>
                        </a>
                    </li>
                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}}" id="bankinformation-tab" data-toggle="tab" href="#bankinformation"
                            role="tab" aria-controls="contact" aria-selected="false" title="Bank Info">
                            {{-- <span class="icon"><ion-icon name="cash-outline"></ion-icon></span> --}}
                            <span class="icon"><ion-icon name="card-outline"></ion-icon></span>
                            <span class="text">Bank Info</span>
                        </a>
                    </li>
                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}}" id="attachements-tab" data-toggle="tab" href="#attachements"
                            role="tab" aria-controls="contact" aria-selected="false" title="Attachements Info">
                            <span class="icon"><ion-icon name="attach-outline"></ion-icon></span>
                            <span class="text">Attachements Info</span>
                        </a>
                    </li>
                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}}" id="residential-tab" data-toggle="tab" href="#residential"
                            role="tab" aria-controls="contact" aria-selected="false" title="Residential Info">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="text">Residential Info</span>
                        </a>
                    </li>

                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}}" id="salary-tab" data-toggle="tab" href="#salary"
                            role="tab" aria-controls="contact" aria-selected="false" title="Salary Info">
                            <span class="icon"><ion-icon name="wallet-outline"></ion-icon></span>
                            <span class="text">Salary Info</span>
                        </a>
                    </li>

                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}}" id="address-tab" data-toggle="tab" href="#address"
                            role="tab" aria-controls="contact" aria-selected="false" title="Address Info">
                            <span class="icon"><ion-icon name="location-outline"></ion-icon></span>
                            <span class="text">Address Info</span>
                        </a>
                    </li>
                    
                    <li class="{{-- nav-item --}}list">
                        <a class="{{-- nav-link --}}" id="acadamicdetails-tab" data-toggle="tab" href="#acadamicdetails"
                            role="tab" aria-controls="contact" aria-selected="false" title="Acadamic Details">
                            <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
                            <span class="text">Acadamic Details</span>
                        </a>
                    </li>

                </ul>
            </div>
            {{--  </div> --}}
            <div class="col-md-10">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="basic_information" role="tabpanel"
                        aria-labelledby="basic_information-tab">
                        @include('emp_basic_info')
                    </div>

                    <div class="tab-pane fade " id="hr_information" role="tabpanel"
                        aria-labelledby="hr_information-tab">
                        @include('emp_hr_info')
                    </div>
                    <div class="tab-pane fade" id="information" role="tabpanel"
                        aria-labelledby="personal-information-tab">
                        @include('emp_personal_info',['countries' => $countries])
                    </div>
                    <div class="tab-pane fade" id="familyinformation" role="tabpanel"
                        aria-labelledby="familyinformation-tab">
                        @include('emp_family_info', ['familyInfoData' => $familyInfoData])
                    </div>
                    <div class="tab-pane fade" id="previous" role="tabpanel" aria-labelledby="previous-tab">
                        @include('emp_previous_info')
                    </div>
                    <div class="tab-pane fade" id="bankinformation" role="tabpanel"
                        aria-labelledby="bankinformation-tab">
                        @include('emp_bank_info', ['bankdata' => $bankdata])
                    </div>
                    <div class="tab-pane fade" id="attachements" role="tabpanel" aria-labelledby="attachements-tab">
                        @include('emp_attachements_info', ['attachments' => $attachments])
                    </div>

                    <div class="tab-pane fade" id="residential" role="tabpanel" aria-labelledby="residential-tab">
                        @include('emp_residential_info', ['visattachements' => $visattachements])
                    </div>

                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        @include('emp_address_info', ['address' => $address])
                    </div>

                    <div class="tab-pane fade" id="salary" role="tabpanel" aria-labelledby="salary-tab">
                        @include('emp_salary_info')
                    </div>

                    <div class="tab-pane fade" id="acadamicdetails" role="tabpanel" aria-labelledby="acadamicdetails-tab">
                        @include('emp_acadamic_info', ['acadamics' => $acadamics])
                    </div>

                </div>
            </div>
            {{-- </div> --}}
        </div>

    </main>


    <!-- Vanilla JavaScript for Handling Active Links -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const list = document.querySelectorAll('.list');

            function activateLink() {
                list.forEach((item) => item.classList.remove('active'));
                this.classList.add('active');
            }

            list.forEach((item) => item.addEventListener('click', activateLink));
        });
    </script>

    <!-- Vanilla JavaScript for Remembering Bootstrap Tab State -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the active tab from localStorage
            var activeTab = localStorage.getItem('activeTab');

            // Set a default tab if activeTab is not set
            activeTab = activeTab || 'basic_information';

            // Set the active tab if it exists
            if (activeTab) {
                // Find the anchor element with the given activeTab ID
                var tab = document.querySelector('#myTabs a[href="#' + activeTab + '"]');

                // Check if the anchor element exists and has an href attribute
                if (tab && tab.getAttribute('href')) {
                    tab.click();
                }
            }

            // Store the active tab in localStorage when a tab is clicked
            var tabLinks = document.querySelectorAll('#myTabs a');
            tabLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    // Use closest to find the closest ancestor anchor element
                    var anchor = e.target.closest('a');

                    // Check if the anchor element exists and has an href attribute
                    if (anchor && anchor.getAttribute('href')) {
                        localStorage.setItem('activeTab', anchor.getAttribute('href').substring(1));
                    }
                });
            });
        });
    </script>

    <!-- Ionicons Library -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
