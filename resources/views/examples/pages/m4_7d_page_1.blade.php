<!--
Praktikum DBWT. Autoren:
Yasin Karakoc, 3517727
Tobias Schnürpel, 3516803
-->
@extends('examples.layout.m4_7d_layout')
@section('title', 'Page 1')
@section('header')
    <header class="mb-16 mt-16">
        <div class="prose container-fluid">
            <h1>Welcome to page 1</h1>
        </div>
    </header>
@endsection
@section('main')
    <main class="mb-16">
        <div class="prose container-fluid">
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>
    </main>
@endsection
@section('footer')
    <div class="bg-primary w-full p-8 mt-auto">
        <span>This is the footer of page 1.</span>
    </div>
@endsection
