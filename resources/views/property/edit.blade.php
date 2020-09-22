@extends('property.master')
@section('content')
<div class="container">
<h2>Criação de imovéis</h2>
<?php
$properties = $properties[0];

?>

<form action="<?= url('/imoveis/update', ['id' => $properties->id]) ?>" method="POST">
    <?= csrf_field() ?>
    <?= method_field('PUT') ?>

    <div class="form-group">
    <label for="title">Título</label>
    <input type="text" name="title" id="title" value="<?= $properties->title ?>" class="form-control">
    </div>
    <div class="form-group">
    <label for="description">Descrição</label>
    <input type="text" name="description" id="description" value="<?= $properties->description ?>" class="form-control">
    </div>
    <div class="form-group">
    <label for="rental_price">Valor da locação</label>
    <input type="text" name="rental_price" id="rental_price" value="<?= $properties->rental_price ?>" class="form-control">
    </div>
    <div class="form-group">
    <label for="sale_price">Valor de compra</label>
    <input type="text" name="sale_price" id="sale_price" value="<?= $properties->sale_price ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
</div>
@endsection
