@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="d-flex justify-content-between">
          <a href="{{route('admin.posts.index')}}" class="btn btn-primary mb-3 mx-1">Tutti i post</a>
          <div>
            <a href="{{route('admin.posts.simone')}}" class="btn btn-primary mb-3 mx-1">Post Simone</a>
            <a href="{{route('admin.posts.alessio')}}" class="btn btn-primary mb-3 mx-1">Post Alessio</a>
          </div>
      </div>
      <h1>Post di Jacopo Damiani</h1>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Tag</th>
                <th scope="col" class="text-center">Gestisci</th>
              </tr>
            </thead>
            <tbody class="table-light text-dark">
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->author}}</td>
                    <td>{{($post->category)?$post->category->name:'Nessuna Categoria'}}</td>
                    <td>
                      @if (count($post->tags))
                      <ul>
                        @foreach ($post->tags as $tag)
                        <li>
                          {{($tag->name)}}
                        </li> 
                          @endforeach
                      </ul>
                      @else
                        <div>Nessun Tag</div>
                      @endif
                    </td>
                    <td class="text-center">
                        <a href="{{route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-success">Vedi</a>
                        <a href="{{route('admin.posts.edit', ['post' => $post->id])}}"  class="btn btn-warning">Modifica</a>
                        <form class="d-inline-block" action="{{route('admin.posts.destroy', ['post' => $post])}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection