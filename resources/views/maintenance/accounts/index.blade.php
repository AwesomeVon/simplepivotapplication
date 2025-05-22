@extends('layouts.app')
@section('content')
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="mb-0" >Employee Details</h3>
                        <p>List > View</p>
                    </div>
                    <div class="monitor_list_widget">
                        <div class="simgle_monitor_list">
                            <div class="simgle_monitor_count d-flex align-items-center">
                                <span>Active</span>
                                <div id="monitor_1"></div>
                            </div>
                            <div class="simgle_monitor_count align-items-center">
                                <span  class="counterActive"></span>
                                </div>
                        </div>
                        <div class="simgle_monitor_list">
                            <div class="simgle_monitor_count d-flex align-items-center">
                                <span>Inactive</span>
                                <div id="monitor_2"></div>
                            </div>
                                <div class="simgle_monitor_count align-items-center">
                                <span  class="counterInactive"></span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="white_card mb_30 card_height_100">
            <div class="white_card_header ">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Registered Employee</h3>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#createModal">
                        <p>Create</p>
                    </a>
                </div>
            </div>
            <div class="white_card_body pt-0">
                <div class="QA_section">
                    <div class="QA_table mb-0 transaction-table">
                        <div class="table-responsive">
                            <table class="table text-center table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Employee Name</th>
                                        <th>Address</th>
                                        <th>Birth date</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Civil Status</th>
                                        <th class="text-small">Contact #</th>
                                        <th class="text-small">Salary</th>
                                        <th class="text-small">Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody t-id="userTableBody">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('maintenance.accounts._modals._add')
@include('maintenance.accounts._modals._update')
<script src="{{ asset('js/_accounts/_index.js')}}"></script>
@endsection