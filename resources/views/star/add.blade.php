@extends('layouts.app')

@section('title','inscription user')
@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @elseif(session('failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
            </div>
        @endif

        <form method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
            @csrf
            <div><h1>Ajouter des profils au catalogue de la fiche</h1></div>
            <div class="form-group">
                <label for="formGroupExampleInput">lastname</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="lastname" placeholder="" required><br/>
                @if($errors->has('lastname'))
                    <div class="error">{{$errors->first('lastname') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">firstname</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="firstname" placeholder="" required><br/>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">File(picture)</label>
                <input type="file" class="form-control"  name="file" placeholder="" required><br/>

                @if($errors->has('file'))
                    <div class="error">{{$errors->first('file') }}</div>
                @endif

            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Description</label>
                <textarea class="form-control"  name="description" placeholder=""></textarea><br/>

                @if($errors->has('description'))
                    <div class="error">{{$errors->first('description') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary"> {{ __('ajouter') }}</button>
        </form>


    </div>
@endsection


