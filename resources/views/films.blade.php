@extends('layout.app')

@section('content')

    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="container">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-4">Film</th>
                    <th class="col-sm-4">Votes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($films as $film)
                    <tr>
                        <td>{{ $film->film_name }}</td>
                        <td>{{ $film->votes }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-1"></div>

@stop