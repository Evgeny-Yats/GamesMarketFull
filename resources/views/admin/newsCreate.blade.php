@extends('admin.base')

@section('main-content')
    <div class="row mb-3">
        <h2 class="col-lg-12">Добавить новость</h2>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12" style="min-height: 1.5rem; color: red">
            {{$message}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form id="newsForm" enctype="multipart/form-data" method="POST"  action="{{route('admin.news.create_post')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="inputTitle">Заголовок</label>
                    <input type="text" name="title" placeholder="Заголовок" class="form-control" id="inputTitle" value="{{isset(Request::all()['title']) ? Request::all()['title'] : ''}}">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <label for="inputText">Текст</label>
                <textarea form="newsForm" name="text" id="inputText" placeholder="Текст новости" class="form-control" rows="10">{{isset(Request::all()['text']) ? Request::all()['text'] : ''}}</textarea>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3" style="height: 150px; background-color: #5a6268">
                <img src="" alt="картинка новости" style="display: none;">
            </div>
            <label for="file">Картинка</label>
            <input form="newsForm" name="thumbnail" type="file" id="file" class="form-control-file mb-3">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <label for="inputExcerpt">Отрывок</label>
                <textarea form="newsForm" name="excerpt" id="inputExcerpt" placeholder="Отрывок" class="form-control" rows="5">{{isset(Request::all()['excerpt']) ? Request::all()['excerpt'] : ''}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button form="newsForm" type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{route('admin.news')}}" class="btn btn-primary ml-3">Назад</a>
        </div>
    </div>
@endsection
