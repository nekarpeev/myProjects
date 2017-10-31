<label for="">Статус</label>
<select class="form-control" name="published">
    @if (isset($article->id))
        <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0" selected="">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок статьи" value="{{$article->title or ""}}"
       required>

<label for="">Категория статьи</label>
<select class="form-control" name="categories[]" multiple="">
    <option value="0">-- без категории --</option>
    @include('admin.articles.partials.categories', ['categories' => $categories])
</select>
<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
       value="{{$article->slug or ""}}" readonly="">
<label for="">Краткое описание</label>
<textarea type="text" class="form-control" id="description_short" name="description_short"
          placeholder="Краткое описание" value="{{$article->description_short or ""}}"></textarea>
<label for="">Описание</label>
<textarea type="text" class="form-control" id="description" name="description" placeholder="Описание"
          value="{{$article->description or ""}}"></textarea>
<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок"
       value="{{$article->meta_title or ""}}">
<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание"
       value="{{$article->meta_description or ""}}">
<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова"
       value="{{$article->meta_keyword or ""}}">
<label for="">Изображение</label>
<input type="text" class="form-control" name="image" placeholder="Путь до изображения"
       value="{{$article->image or ""}}">
<label for="">Публиковать изображение</label>
<select class="form-control" name="image_show" placeholder="Публиковать изображение"
        value="{{$article->image_show or ""}}">
    @if (isset($article->image_show))
        <option value="0" @if ($article->image_show == 0) selected="" @endif>Не показывать изображение</option>
        <option value="1" @if ($article->image_show == 1) selected="" @endif>Показывать изображение</option>
    @else
        <option value="0">Не показывать изображение</option>
        <option value="1">Показывать изображение</option>
    @endif

    <hr/>
    <input class="btn btn-primary" type="submit" value="Сохранить">