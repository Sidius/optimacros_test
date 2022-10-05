@extends('admin.layouts.layout')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('admin.layouts.page-header')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title ?? null }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            @isset($articles)
                <div class="card-body">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">New article</a>
{{--                    @if($poem_categories->count())--}}
                    @if(count($articles))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-wrap">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->content }}</td>
                                            <td><img src="{{ $article->image }}" alt="{{ $article->title }}" style="width: 30em;"></td>
                                            <td style="width: 7em;">
                                                <a href="{{ route('admin.articles.edit', ['article' => $article->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin.articles.destroy', ['article' => $article->id]) }}" method="post" class="float-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Подтвердите удаление')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Статей нет...</p>
                    @endif
                </div>

                <div class="card-footer clearfix">
                    {{ $articles->links('vendor.pagination.my-pagination') }}
                </div>
            @endisset
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
