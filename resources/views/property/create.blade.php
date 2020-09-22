@extends('property.master')
@section('content')
<div class="container my-5">
    <h2>Criação de imovéis</h2>


    <form action="<?= url('/imoveis/save') ?>" method="POST">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control">
        </div>


        <div class="form-group">
            <label for="description">Título</label>
            <input type="text" name="description" class="form-control">
        </div>



        <div class="form-group">
            <label for="rental_price">Locação:</label>
            <input type="text" name="rental_price" class="form-control">
        </div>



        <div class="form-group">
            <label for="sale_price">Compra</label>
            <input type="text" name="sale_price" class="form-control">
        </div>






        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
