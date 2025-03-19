@extends('layouts.app')

@section('content')

<section class="relative w-full h-[600px] bg-cover bg-center" style="background-image: url('{{ asset('build/assets/hairdresser-4666064_1280.jpg') }}');">
    <div class="absolute inset-0 bg-black opacity-60"></div>
    <div class="relative z-10 text-center text-white p-8 md:p-16">
        <h1 class="text-3xl md:text-4xl font-bold mb-4 leading-tight">
            Zadbaj o swoje włosy z najlepszymi profesjonalistami
        </h1>
        <p class="text-lg md:text-xl mb-20 max-w-3xl mx-auto">
            Profesjonalne usługi fryzjerskie w komfortowej atmosferze.
        </p>
      

        @auth
        <a href="{{ route ('appointments.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white mt-10 py-3 px-8 rounded-lg text-xl font-semibold transition duration-300 hover:scale-105">
            Zarezerwuj wizytę
        </a>
        @else
        <a href="{{ route ('login') }}" class="bg-orange-500 hover:bg-orange-600 text-white mt-10 py-3 px-8 rounded-lg text-xl font-semibold transition duration-300 hover:scale-105">
            Zarezerwuj wizytę
        </a>
        @endauth
      
    </div>
</section>


<div id="app">
    <example-component></example-component>
</div>
@vite('resources/js/app.js')


@endsection