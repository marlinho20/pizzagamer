@extends('adm.common.template')

@section('content')
   <section>
      <h2>Artigos</h2>

      <div class="content">
         <div class="left">
            @include('adm.posts.common.menu', ['menu', $menu])
         </div>
         <div class="right post">
            <header>
               <h2><i class="fa-solid fa-pen-to-square"></i> Artigos</h2>

               <form class="form-search" id="form-post-search" action="{{ route('artigos.search.ajax') }}" method="post">
                  @csrf
                  <button><i class="fa-solid fa-magnifying-glass"></i></button>
                  <input type="text" name="s" value="{{ $search }}">
               </form>
            </header>

            @include('adm.common.list-post-or-video', [
               'articles' => $articles,
               'route' => 'artigos',
               'param' => 'post'
            ])
         </div>
      </div>
   </section>
@endsection