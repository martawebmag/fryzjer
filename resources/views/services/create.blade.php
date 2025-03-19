@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6 px-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Dodaj usługę</h2>

    <form action="{{ route('services.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <!-- Nazwa usługi -->
        <div>
            <label for="name" class="block text-gray-700 font-medium">Nazwa usługi</label>
            <input type="text" id="name" name="name" required 
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('name') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Cena -->
        <div>
            <label for="price" class="block text-gray-700 font-medium">Cena</label>
            <input type="number" id="price" name="price" step="0.01" required 
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('price') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Czas trwania -->
        <div>
            <label for="duration" class="block text-gray-700 font-medium">Czas trwania (minuty)</label>
            <input type="number" id="duration" name="duration" required 
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('duration') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Przycisk dodaj -->
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Dodaj
            </button>
        </div>
    </form>
</div>

@endsection
