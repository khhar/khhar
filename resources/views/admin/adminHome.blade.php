@extends('layout.admin.app')

@section('content')

    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        {{ Form::open(['route' => 'filmInsert', 'class' => 'form-inline']) }}
            <div class="form-group">
                <input type="text" class="form-control film-insert-inp" name="film" placeholder="Film name">
            </div>
            <button type="submit" class="btn btn-success film-insert-btn">Insert</button>
        {{ Form::close() }}
        <span class="error-or-success"></span>
        <div class="container">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="col-sm-4">Film</th>
                    <th class="col-sm-4">Votes</th>
                    <th class="col-sm-1">Update</th>
                    <th class="col-sm-1">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($films as $film)
                    <tr>
                        <td><input class="votes-inp film-name-inp" type="text" value="{{ $film->film_name }}" /></td>
                        <td><input class="votes-inp film-votes-inp" type="number" value="{{ $film->votes }}" min="0" /></td>
                        <td><button type="button" class="btn btn-success film-update-btn">Update</button></td>
                        <td><span class="glyphicon glyphicon-remove del-film" data-toggle="modal" data-target="#myModal" data-id="{{ $film->id }}"></span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-1"></div>

@stop