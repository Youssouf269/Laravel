@extends("layouts.template")

@section("titre")
Résultat du formulaire 
@endsection

@section("contenu")

{{-- Pour afficher une variable dans un fichier blade on fait => {{ $nom_variable}} --}}  
Votre nom est {{ $request->nom }} <br>

Votre prenom est {{ $request->prenom }} <br>

votre mail est {{ $request->email }} <br>

votre message est {{ $request->message }} <br>

@php
$tva=20;
$ht=$request->ht;
$ttc=$ht*(1+$tva/100);
$notes=[12,15,17];
@endphp

Le montant TTC est : {{$ttc}}£ <hr>
<h2>liste des notes</h2>

@foreach($notes as $note)
{{$note}}
@endforeach

@endsection