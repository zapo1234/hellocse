@section('content')

    <div class="container">
        <div id="resultats"></div>
        <!--// afficher le contenu -->
      <div class="file"> <img src="{{asset('upload')}}/{{ $content->file }}" with="100" height="50">
          <span class="name">{{ $content->lastname }} {{ $content->firstname }}</span> </div>
        <div class ="content">{{  $content->description }}  </div>d>


@endsection
