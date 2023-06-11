@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Товар</h1>
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $product->preview_image) }}" alt="preview_image" style="max-height: 400px; max-width: 400px;"/>
                                            <img src="{{ asset('storage/' . $product->hover_image) }}" alt="hover_image" style="max-height: 400px; max-width: 400px;"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Наименование</th>
                                        <td>{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Артикул</th>
                                        <td>{{ $product->number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Описание</th>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Контент</th>
                                        <td>{{ $product->content }}</td>
                                    </tr>
                                    <tr>
                                        <th>Цена</th>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Количество</th>
                                        <td>{{ $product->count }}</td>
                                    </tr>
                                    <tr>
                                        <th>Опубликовано</th>
                                        @if($product->is_published)
                                            <td>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" checked disabled>
                                                  <label class="form-check-label">Опубликовано</label>
                                                </div>
                                            </td>
                                        @else
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" disabled>
                                                    <label class="form-check-label">Не опубликовано</label>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Категория</th>
                                        <td>{{ $product->category->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Группа</th>
                                        <td>{{ $product->group->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Тэги</th>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                @if($loop->index == $product->tags->count() - 1)
                                                    {{ $tag->title }}
                                                @else
                                                    {{ $tag->title . "," }}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Цвета</th>
                                        <td style="vertical-align: middle">
                                            @foreach($product->colors as $color)
                                                @if($product->colors->count() > 1)
                                                    @if($loop->index == $product->colors->count() - 1)
                                                        {{ $color->name }}
                                                        <span style="
                                                            display: inline-block;
                                                            border-radius: 2px;
                                                            border: 1px solid lightgray;
                                                            width: 16px;
                                                            height: 16px;
                                                            background-color: {{ $color->code }};
                                                        "></span>
                                                    @else
                                                        {{ $color->name }}
                                                        <span style="
                                                            display: inline-block;
                                                            border-radius: 2px;
                                                            border: 1px solid lightgray;
                                                            width: 16px;
                                                            height: 16px;
                                                            background-color: {{ $color->code }};
                                                        "></span>
                                                        {{ "," }}
                                                    @endif
                                                @else
                                                    {{ $color->name . '<span style="width: 15px, height: 15px, background-color:'. $color->code .';"></span>' }}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
