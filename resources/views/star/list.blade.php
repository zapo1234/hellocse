@extends('layouts.app')

@section('content')
    <div class="container">

        <div id="search">
            <form action="/search" method="get">
                <input type="search" name="search" id="recher" class="form -control">
                <button class="btn btn-primary" type="submit">search</button>
            </form>
        </div>
        <div id="resultats"></div>
        <!--resultat ajax -->
        <div class="col-md-5" align="right">
            <a href="{{ url('/pdf') }}" class="btn btn-danger">Convert into PDF</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">description</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach($result as $resultats)
                <tr>
                    <td>{{ $resultats->lastname }}</td>
                    <td>{{ $resultats->firstname }}</td>
                    <td>{{ $resultats->description }}</td>
                    <td><a href="star/{{$resultats->id}}">Edit</a></td>
                    <td><a href="star/{{$resultats->id}}">delete</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div id="zapo"></div>
        <div class="pagition">
            {{ $result->links() }}
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>




@endsection
