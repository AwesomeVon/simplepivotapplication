@extends('layouts.app')
@section('content')
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="mb-0" >Sales Person Details</h3>
                        <p>List > View</p>
                    </div>
                    <div class="monitor_list_widget">
                       <!--  <div class="simgle_monitor_list">
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
                        </div> -->
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
                        <h3 class="m-0">Registered Sales Person</h3>
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
                                        <th width="20%">Sales Person</th>
                                        @foreach($item_list as $item)
                                            <th>{{ $item->item_name }}</th>
                                        @endforeach
                                        <th width="5%">Edit</th>
                                        <th width="5%">Delete</th>

                                    </tr>
                                </thead>
                                <tbody t-id="userTableBody">
                                    @foreach($sales_person_list as $spl)
                                        <tr>
                                            <td>{{ $spl->name }}</td>
                                            @foreach($item_list as $item)
                                                <td>{{ $sales_data[$spl->id][$item->item_name] ?? 0 }}</td>
                                            @endforeach
                                            <td><a class="btn btn-default update" u-id="{{$spl->id}}" data-toggle="modal" data-target="#updateModal" data-toggle="tooltip" 
                                                data-placement="top" title="Update Sales Person Details">
                                                <i class="fa fa-pen fa-xs editBtn"></i>
                                            </a></td>
                                            <td id="'+ran+'" class="pro_ran_data p-1">
                                                <a class="btn btn-default delete" id="{{$spl->id}}" title="Delete Sales Person Details">
                                                <i class="fa fa-times fa-xs editBtn"  style="color: red;"></i>
                                            </a>
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sales._modals._add')
@include('sales._modals._update')
<script src="{{ asset('js/_sales/_index.js')}}"></script>
@endsection