@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb', ['custom_URL' => 'article'])
    @slot('title') Создание статьи @endslot
    @slot('parent') Главная @endslot
    @slot('parent_1') Статьи @endslot
    @slot('active') Создание статьи @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('admin.article.store')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="created_by" value="{{Auth::id()}}"/>
    {{-- Form include --}}
    @include('admin.articles.partials.form')
  </form>
</div>



@endsection
