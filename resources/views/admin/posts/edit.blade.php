@extends('admin.layout')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Crear Publicacion</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.posts.create') }}">Crear</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@stop

@section('content')
@if ($post->photos->count())
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($post->photos as $photo)
                <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                    {{ method_field('DELETE') }} {{ csrf_field() }}
                    <div class="col-md-2">
                        <button class="btn btn-sm btn-danger" style="position: absolute"><i
                                class="fas fa-times"></i></button>
                        <img class="img-responsive" style="width: 150px" src="{{ url($photo->url) }}"></img>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<form class="row" id="post-form" method="POST" action="{{ route('admin.posts.update', $post) }}">
    {{ csrf_field() }} {{ method_field('PUT') }}
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Titulo de la publicacion</label>
                    <input name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $post->title) }}" placeholder="Introduce el titulo de la publicacion">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Contenido de la publicacion</label>
                    <textarea name="body" id="editor" rows="10" class="form-control @error('body') is-invalid @enderror"
                        placeholder="Introduce el contenido de la publicacion">{{ old('body', $post->body) }}</textarea>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Contenido embebido (iframe)</label>
                    <textarea name="iframe" id="editor" rows="2" class="form-control @error('iframe') is-invalid @enderror"
                        placeholder="Introduce contenido embebido (iframe) de audio o video">{{ old('iframe', $post->iframe) }}</textarea>
                    @error('iframe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Fecha de Publicacion:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input name="published_at"
                               class="form-control float-right"
                               value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"
                               type="text"
                               id="daterangepicker">
                    </div>
                </div>
                <div class="form-group">
                    <label>Categorias</label>
                    <select name="category_id" class="select2 form-control @error('category_id') is-invalid @enderror">
                        <option value="">Selecciona una Categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>
                            {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Etiquetas</label>
                    <select name="tags[]" class="select2 form-control @error('tags') is-invalid @enderror"
                        multiple="multiple"
                        data-placeholder="Selecciona una o mas etiquetas" style="width: 100%;">
                        @foreach($tags as $tag)
                        <option
                            {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tags')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Extracto de la publicacion</label>
                    <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror"
                        placeholder="Introduce el extracto de la publicacion">{{ old('excerpt', $post->excerpt) }}</textarea>
                    @error('excerpt')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="dropzone"></div>
                </div>
                <div class="form-control">
                    <button type="submit" class="btn btn-primary btn-block">Guardar Publicacion</button>
                </div>
            </div>
        </div>
    </div>
</form>

@stop

@push('styles')
<!-- daterange picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css')}}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<!-- InputMask -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $('#daterangepicker').daterangepicker({
        singleDatePicker: true
    });

    $('.select2').select2({
        tags: true
    })

    CKEDITOR.replace('editor');
    CKEDITOR.config.height = '225px';

    var myDropzone = new Dropzone('.dropzone', {
        url: '{{ $post->url }}/photos',
        paramName: 'photo',
        acceptedFiles: 'image/*',
        maxFilesize: 2,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'
    });

    myDropzone.on('error', function(file, res){
        var msg = res.photo[0];
        $('.dz-error-message:last > span').text(msg);
    });

    Dropzone.autoDiscover = false;

</script>
@endpush
