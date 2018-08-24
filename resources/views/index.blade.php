@extends('layouts.base')
@section('css')
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{url('css/datatables.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container" style="padding-top: 2%">
        <!--Begin::Section-->
            <div>
                <input type="hidden" id="data_route" value="{{ route('datatable.getData') }}">
                <div class="table-responsive">
                    <table id="data" class="table table-hover table-condensed table-striped" style="width:100%; padding-top:1%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>First Invoice</th>
                                <th>URL</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        <!--End::Section-->
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('js/home.js') }}"></script>
@endsection