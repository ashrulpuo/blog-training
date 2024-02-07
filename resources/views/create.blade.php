@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="card col-md-8">
        <div class="card-body">
            <div class="col-auto col-md-12">
                <h2>
                    <center>Daftar Blog</center>
                </h2>
                <hr>
                </br>
                <form action="{{ route('form-submit') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Tajuk</label>
                        <input type="text" class="form-control" id="tajuk" name="tajuk">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tarikh Publish</label>
                        <input type="text" class="form-control" id="tarikh_publish" name="tarikh_publish">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Content</label>
                          <textarea id="summernote" name="editordata"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end">Hantar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
