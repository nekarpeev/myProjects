@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb', ['custom_URL' => 'category'])
    @slot('title') Редактирование категории @endslot
    @slot('re_title') {{$category->title}} @endslot
    @slot('parent') Главная @endslot
    @slot('parent_1') Категории @endslot
    @slot('active') {{$category->title}} @endslot

  @endcomponent

  <div>

  </div>

  <hr />

  <form class="form-horizontal" action="{{route('admin.category.update', $category)}}" method="POST" >
    <input type="hidden" name="modified_by" value="{{Auth::id()}}"/>
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.categories.partials.form')



  </form>



</div>

@endsection
