@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список статей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Статьи @endslot
        @endcomponent

        <hr>

        <a href="{{route('admin.article.create')}}" class="btn btn-primary pull-right"><i
                    class="fa fa-plus-square-o"></i> Создать статью</a>
        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th>Категории</th>
            <th class="text-right">Действия</th>
            </thead>
            <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->published}}</td>
                    <td>
                        @forelse ($categoryables as $categoryable)
                            @if ($article->id == $categoryable->categoryable_id and $categoryable->categoryable_type == 'App\Models\Article')
                                @foreach ($categories as $category)
                                    @if ($categoryable->category_name_id == $category->id)
                                        {{$category->title}}
                                    @endif
                                @endforeach
                            @endif
                        @empty
                            <h4>без категории</h4>

                        @endforelse
                    </td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')) {return true} else{return false}"
                              action="{{route("admin.article.destroy", $article)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE"/>
                            {{ csrf_field() }}
                            <a href="{{route("admin.article.edit", $article)}}">
                                <button type="button" class="btn"><i style="color: #636b6f;"
                                                                     class="fa fa-pencil-square-o"></i></button>
                            </a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
