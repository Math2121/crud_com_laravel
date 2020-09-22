
@extends('property.master')
@section('content')
<div class="container my-5">

<h2>Página de Descrição</h2>

<?php

if (!empty($properties)){
    foreach($properties as $property){
?>
<h5>Título do imóvel: <?=$property->title?> </h5>


<p>Descrição: <?=$property->description?> </p>

<p>Valor da locação: R$<?=number_format($property->rental_price, 2, ',', '.')?> </p>


<p>Valor de venda: R$<?=number_format($property->sale_price, 2, ',', '.')?></p>

<?php }} ?>

</div>
@endsection
