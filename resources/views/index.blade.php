@extends('layouts.base')
@section('css')
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{url('css/datatables.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container" style="padding-top: 2%">
        <!--Begin::Section-->
        <select name="category" id="category" class="form-control">
            <option value="">Поиск по категории</option>
            @foreach($categories as $category)
                <option value="{{ $category['alias'] }}"> {{ $category['title'] }} </option>
            @endforeach
        </select>


            <div style="padding-top: 2%">
                <input type="hidden" id="data_route" value="{{ route('datatable.getData') }}">
                <div class="table-responsive">
                    <table id="data" class="table table-hover table-condensed table-striped" style="width:100%; padding-top:1%">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Изображение</th>
                                <th>Описание</th>
                                <th>Первая Продажа</th>
                                <th>Ссылка</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Категория</th>
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