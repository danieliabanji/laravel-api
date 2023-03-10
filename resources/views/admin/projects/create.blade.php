@extends('layouts.admin')

@section('title', 'Aggiugni un nuovo progetto')

@section('content')
    <div class="container">
        <h2 class="mt-3 mb-3 text-center">Aggiungi un nuovo progetto</h2>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Inserisci il titolo del progetto</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    required maxlength="150">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-text">* Massimo 150 caratteri</div>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Inserisci la descrizione</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"></textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                <label for="create_cover_image" class="form-label">Immagine</label>
                <input type="file" name="cover_image" id="create_cover_image"
                    class="form-control  @error('cover_image') is-invalid @enderror">
                @error('cover_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="git_link" class="form-label">Git</label>
                <input type="text" class="form-control @error('git_link') is-invalid @enderror" id="git_link"
                    name="git_link">
                @error('git_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Select Type</label>
                <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                    <option value="">Select type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select multiple class="form-select" name="tags[]" id="tags">
                    <option value="">Seleziona tag</option>
                    @forelse ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @empty
                        <option value="">No tag</option>
                    @endforelse

                </select>

            </div>

            <button type="submit" class="btn btn-success">Aggiungi</button>
            <button type="reset" class="btn btn-danger">Resetta</button>
        </form>
    </div>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
