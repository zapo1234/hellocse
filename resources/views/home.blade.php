@extends('layouts.app')
<style>
    .edit a{color:white;padding: 2%;background:green;height: 20px;border-radius:10px;width:100px;text-decoration: none;}
    .delete a{color:white;padding: 2%;background:red;height: 20px;border-radius:10px;width:100px;text-decoration: none;}
    .cards{font-family: arial;font-size:16px;text-transform: uppercase;}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="cards">{{ __('Dashboard') }} liste de tous les profils présent dans les fiches</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if (session('succes_delete'))
                            <div class="alert alert-success" role="alert">
                                {{ session('sucess_delete') }}
                            </div>
                        @endif
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
                                    <td class="edit"><a href="star/edit/{{$resultats->id}}">Edit</a></td>
                                    <td class="delete"><a href="star/delete/{{$resultats->id}}">delete</a></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div id="zapo"></div>
                        <div class="pagition">
                            {{ $result->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
