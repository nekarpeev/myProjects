@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb', ['custom_URL' => 'article'])
    @slot('title') Редактирование статьи @endslot
    @slot('re_title') {{$article->title}} @endslot
    @slot('parent') Главная @endslot
    @slot('parent_1') Статьи @endslot
    @slot('active') {{$article->title}} @endslot

  @endcomponent

  <div>

  </div>

  <hr />

  <form class="form-horizontal" action="{{route('admin.article.update', $article)}}" method="POST" >
    <input type="hidden" name="modified_by" value="{{Auth::id()}}"/>
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.articles.partials.form')



  </form>



</div>

@endsection
