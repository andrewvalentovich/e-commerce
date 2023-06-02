@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Main</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <input type="hidden" name="id" value="{{ $product->id }}">

                                @if(isset($product->preview_image))
                                    <div class="form-group">
                                        <img src="{{ asset('storage/' . $product->preview_image) }}" alt="preview_image" style="max-height: 400px; max-width: 400px;"/>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите фотографию товара</label>
                                        </div>
    {{--                                    <div class="input-group-append">--}}
    {{--                                        <span class="input-group-text">Загрузить</span>--}}
    {{--                                    </div>--}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ old('title') ?? $product->title }}" name="title" class="form-control" placeholder="Наименование">
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ old('number') ?? $product->number }}" name="number" class="form-control" placeholder="Артикул">
                                </div>

                                <div class="form-group">
                                    <textarea name="description" class="form-control" placeholder="Описание" cols="30" rows="5">{{ old('description') ?? $product->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <textarea name="content" class="form-control" placeholder="Контент" cols="30" rows="10">{{ old('content') ?? $product->content }}</textarea>
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ old('price') ?? $product->price }}" name="price" class="form-control" placeholder="Цена">
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ old('count') ?? $product->count }}" name="count" class="form-control" placeholder="Количество товара">
                                </div>

                                <div class="form-group">
                                    <select name="category_id" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" disabled>Выберите категорию</option>
                                        @foreach($categories as $category)
                                            @if($category->id == $product->category->id)
                                                <option selected value="{{ $category->id }}">{{ $category->title }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="" id="product_tags1" name="tags[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            @if(in_array($tag->id, $product->tags->pluck('id')->toArray()))
                                                <option selected value="{{ $tag->id }}">{{ $tag->title }}</option>
                                            @else
                                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <select class="" id="product_colors1" name="colors[]" multiple="multiple" data-placeholder="Выберите цвета" style="width: 100%;">
                                        @foreach($colors as $color)
                                            @if(in_array($color->id, $product->colors->pluck('id')->toArray()))
                                                <option selected value="{{ $color->id }}">{{ $color->name }}</option>
                                            @else
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Apply">
                                </div>
                            </form>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
