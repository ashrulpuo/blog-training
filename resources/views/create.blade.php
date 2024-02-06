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
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Tajuk</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Tarikh Publish</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="inputAddress2"
                            placeholder="Apartment, studio, or floor">
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
