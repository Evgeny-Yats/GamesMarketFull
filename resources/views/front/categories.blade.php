@extends('layouts.main');
@section('page-title')| Товары в категории@endsection
@section('content-title'){{$content_title}}@endsection

@section('main-content')
    <div class="row">
        <div class="col-sm">
            <aside>
                <form action="">

                    {{--<div class="form-group">--}}
                    {{--<label for="name" class="from-control">Категория</label>--}}
                    {{--<select name="name">--}}
                    {{--<option value="1"></option>--}}
                    {{--<option value="2"></option>--}}
                    {{--</select>--}}
                    {{--</div>--}}


                    <div class="d-flex">
                        <div class="form-group d-flex">
                            <label for="name" class="fl">Имя</label>
                            <input type="text" class="myClass" name="name" value="{{ request()->name }}">
                        </div>

                        <div class="form-group d-flex">
                            <label for="price_from" class="fl">Цена от</label>
                            <input type="text" class="myClass" name="price_from" value="{{ request()->price_from }}">
                            <label for="price_to" class="fl">Цена до</label>
                            <input type="text" class="myClass" name="price_to" value="{{ request()->price_to }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary fg">Применить</button>

                    <a href="{{route('categories' , $cats->id)}}" class="btn btn-danger dg fg">Сбросить</a>

                </form>
            </aside>
        </div>
    </div>
    <div class="products-columns">
        @foreach($productsPagination->itemsOnPage as $producti)
            <div class="products-columns__item">
                <div class="products-columns__item__title-product"><a href="{{route('product', ['product_id' => $producti->id])}}" class="products-columns__item__title-product__link">{{$producti->name}}</a></div>
                <div class="products-columns__item__thumbnail"><a href="{{route('product', ['product_id' => $producti->id])}}" class="products-columns__item__thumbnail__link"><img src="{{$producti->pic}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                <div class="products-columns__item__description"><span class="products-price">{{$producti->price}} руб</span><a href="{{route('cart.add', ['product_id' => $producti->id])}}" class="btn btn-blue">Купить</a></div>
            </div>
        @endforeach
    </div>
@endsection

@section('content-footer')
   {!! $productsPagination->renderPagination() !!}
@endsection
