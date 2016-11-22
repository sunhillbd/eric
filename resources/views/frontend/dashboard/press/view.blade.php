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

                                    @if(!$formData->isEmpty())

                                        <table id="example" class="display" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Article Docs</th>
                                                <th>Article Title</th>
                                                <th>Publications</th>
                                                <th>Time of Publishment</th>
                                                <th>Author</th>
                                                <th>Article Translation</th>
                                                <th>Confirmation Status</th>
                                                <th>Review Status</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Article Docs</th>
                                                <th>Article Title</th>
                                                <th>Publications</th>
                                                <th>Time of Publishment</th>
                                                <th>Author</th>
                                                <th>Article Translation</th>
                                                <th>Confirmation Status</th>
                                                <th>Review Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>

                                            @foreach($formData as $data)

                                                <tr>
                                                    <td>

                                                        <a href="{{ asset('uploads/'.$data->documents[0]->document_name) }}">

                                                            {{ $data->article_title or 'N/A' }}
                                                        </a>

                                                    </td>
                                                    <td>{{ $data->article_title or 'N/A' }}</td>
                                                    <td>{{ $data->publication_name or 'N/A' }}</td>
                                                    <td>{{ $data->when_published or 'N/A' }}</td>
                                                    <td>{{ $data->author_name or 'N/A' }}</td>
                                                    <td>
                                                        {{ isset($data->is_in_english) && $data->is_in_english == 1? 'Yes':'No'  }}
                                                    </td>
                                                    <td>
                                                        {{ isset($data->is_confirm) && $data->is_confirm == 1? 'confirm':'pending'  }}
                                                    </td>
                                                    <td>
                                                        {{ isset($data->is_reviewed) && $data->is_reviewed == 1? 'reviewed':'pending'  }}
                                                    </td>

                                                    <td>

                                                        <a class="btn-xs btn-success" href="{{ route('dashboard.edit',$data->id) }} ">
                                                            {{--<i class="glyphicon glyphicon-edit"></i>--}}edit
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