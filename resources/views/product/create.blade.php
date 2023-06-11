@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить продукт</h1>
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
                <div class="col-6">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="preview_image" class="custom-file-input" id="preview_image">
                                    <label class="custom-file-label" for="preview_image">Выберите фотографию товара</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="hover_image" class="custom-file-input" id="hover_image">
                                    <label class="custom-file-label" for="hover_image">Выберите hover-фотографию товара</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Наименование">
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('number') }}" name="number" class="form-control" placeholder="Артикул">
                        </div>

                        <div class="form-group">
                            <textarea name="description" class="form-control" placeholder="Описание" cols="30" rows="5">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <textarea name="content" class="form-control" placeholder="Контент" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('price') }}" name="price" class="form-control" placeholder="Цена">
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ old('count') }}" name="count" class="form-control" placeholder="Количество товара">
                        </div>

                        <div class="form-group">
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>Выберите категорию</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="group_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>Выберите группу</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="select2" id="product_tags" name="tags[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <select class="select2" id="product_colors" name="colors[]" multiple="multiple" data-placeholder="Выберите цвета" style="width: 100%;">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
