<h2>{{$title}} {{$re_title or ''}}</h2>
<ol class="breadcrumb">
  <li><a href="{{route('admin.index')}}">{{$parent}}</a></li>
  @if(!empty($parent_1))
  <li><a href="{{route('admin.' . $custom_URL . '.index')}}">{{$parent_1 or ''}}</a></li>
  <li class="active">{{$active}}</li>
@else
  <li class="active">{{$active}}</li>
@endif
</ol>
