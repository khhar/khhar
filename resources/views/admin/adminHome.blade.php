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
        <p class="error-or-success"></p>
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
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="votes-inp film-name-inp" type="text" value="{{ $film->film_name }}" />
                        </td>
                        <td><input class="votes-inp film-votes-inp" type="number" value="{{ $film->votes }}" min="0" /></td>
                        <td><button type="button" class="btn btn-warning film-update-btn" data-id="{{ $film->id }}">Edit</button></td>
                        <td><button  type="button" class="btn btn-danger del-film" data-toggle="modal" data-target="#myModal" data-id="{{ $film->id }}">Delete</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-1"></div>

@stop