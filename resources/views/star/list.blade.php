@extends('layouts.app')

@section('content')

    @if (session('succes_delete'))
        <div class="alert alert-success" role="alert">
            {{ session('succes_delete') }}
        </div>
    @elseif(session('failed'))
        <div class="alert alert-danger" role="alert">
            {{ session('failed') }}
        </div>
    @endif

    <div class="container">
        <div id="resultats"></div>
        <!--resultat ajax -->

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
                    <td><a href="edit/{{$resultats->id}}">Edit</a></td>
                    <td><a href="delete/{{$resultats->id}}">delete</a></td>

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
