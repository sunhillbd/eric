
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
                        <div>
                            <div class="form-group" >
                                <div class="col-md-12">



                                  @if(!$formCategories->isEmpty())

                                        <table id="example" class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Category</th>

                                                <th>Status</th>
                                                <th>Review</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Category</th>

                                                <th>Status</th>
                                                <th>Review</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>

                                            @foreach($formCategories as $formCategory)

                                                <tr>
                                                    <td>{{ isset($formCategory->name)? ucwords(str_replace('_',' ',$formCategory->name )) : 'N/A' }}</td>
                                                    <td>{{ $formCategory->pivot->status or 'N/A' }}</td>
                                                    <td> Pending</td>
                                                    <td>

                                                        <a class="btn-xs btn-success" href="{{ route('dashboard.view',$formCategory->name) }} ">
                                                            {{--<i class="glyphicon glyphicon-edit"></i>--}}details
                                                        </a>

                                                    </td>

                                                </tr>
                                            @endforeach



                                            </tbody>
                                        </table>


                                  @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .container-fluid -->
        </div> <!-- #page-content -->
    </div>
@endsection

@section('scripts')

    {!! Html::script('js/datatable.min.js') !!}
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>


@endsection