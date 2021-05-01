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

        <form method="post" action="{{route('edit', $data['id']) }}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <input type="hidden" class="form-control" id="formGroupExampleInput" name="nom" placeholder="" required
                       value="{{ $data['id'] }}">
                <label for="formGroupExampleInput">lastname</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="lastname" placeholder="" required
                       value="{{ $data['lastname'] }}">

                @if($errors->has('lastname'))
                    <div class="error">{{$errors->first('lastname') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">firstname</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="firstname" placeholder=""
                       required value="{{ $data['firstname'] }}">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">File(picture)</label>
                <span class="name">Name picture :{{ $data['file'] }}</span>
                <input type="file" class="form-control"  name="file" placeholder=""><br/>

                @if($errors->has('file'))
                    <div class="error">{{$errors->first('file') }}</div>
                @endif

            </div>


            <div class="form-group">
                <label for="formGroupExampleInput2">Description</label>
                <textarea  class="form-control" id="formGroupExampleInput2" name="description" placeholder=""
                           value="{{ $data['description'] }}">{{ $data['description'] }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary"> {{ __('modifier') }}</button>
        </form>

    </div>

    </div>
@endsection


