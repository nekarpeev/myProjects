@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb', ['custom_URL' => 'category'])
    @slot('title') Создание категории @endslot
      @slot('parent') Главная @endslot
      @slot('parent_1') Категории @endslot
      @slot('active') Создание категории @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('admin.category.store')}}" method="post">
    {{ csrf_field() }}
  <input type="hidden" name="created_by" value="{{Auth::id()}}"/>
    {{-- Form include --}}
    @include('admin.categories.partials.form')

  </form>
</div>

@endsection
