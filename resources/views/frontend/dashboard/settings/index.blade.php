{{--{{ dd($formData) }}--}}

@extends('frontend.dashboard.layouts.dashboard')

@section('styles')

    {!! Html::style('css/datatable.min.css') !!}
@endsection

@section('content')
    <div class="static-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div >
                            <div class="form-group">
                                <div class="col-md-12">


                                    <div class="columnbox" style="background-color: rgb(240,240,240)">

                                        <div class="panel panel-default">

                                            <div class="panel-body">

                                                <a data-toggle="modal" data-target="#myModal"  href="javascript:void(0)"><i class="fa fa-wrench"></i> &nbsp;<span>Update Password</span></a></li>

                                            </div>

                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <a href="{{ route('payment.edit') }}"><i class="fa fa-pencil-square-o"></i> &nbsp;<span>Update Plan</span></a></li>
                                            </div>

                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .container-fluid -->
        </div> <!-- #page-content -->
    </div>

    @include('frontend.dashboard.settings.update-password')
@endsection

