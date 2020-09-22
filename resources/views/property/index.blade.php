@extends('property.master')
@section('content')
<div class="container">
<h1>Listagem de Imoveis</h1>



<?php

if (!empty($properties)) {
    echo "<table class='table table-striped table-hover'>";

    echo "<thead class='bg-primary text-white'>
            <td>Título</td>
            <td>Valor da Locação</td>
            <td>Valor da compra</td>
            <td></td>
        </thead>
    ";
    foreach ($properties as $prop) {
        $linkReadMode = url('imoveis/' . $prop->name);
        $linkEdit = url('imoveis/editar/' . $prop->name);
        $linkRemove = url('imoveis/remover/' . $prop->name);
        echo "<tr>
<td>{$prop->title}</td>
<td>R$ " . number_format($prop->rental_price, 2, ',', '.') . "</td>
<td>R$ " . number_format($prop->sale_price, 2, ',', '.') . "</td>

<td><a href='{$linkReadMode}'>Ver mais</a> |  <a href='{$linkEdit}'>Editar</a> | <a href='{$linkRemove}'>Remover</a>
       </tr>

       ";
    }

    echo "<table>";
}
?>
</div>
@endsection
