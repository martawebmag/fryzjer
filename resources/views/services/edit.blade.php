@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6 px-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edytuj usługę</h2>

    <form action="{{ route('services.update', $service->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT') <!-- Używamy metody PUT dla aktualizacji -->
        
        <!-- Nazwa usługi -->
        <div>
            <label for="name" class="block text-gray-700 font-medium">Nazwa usługi</label>
            <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
            @error('name') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Cena -->
        <div>
            <label for="price" class="block text-gray-700 font-medium">Cena</label>
            <input type="number" id="price" name="price" value="{{ old('price', $service->price) }}" step="0.01" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
            @error('price') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Czas trwania -->
        <div>
            <label for="duration" class="block text-gray-700 font-medium">Czas trwania (minuty)</label>
            <input type="number" id="duration" name="duration" value="{{ old('duration', $service->duration) }}" class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
            @error('duration') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Przycisk zapisz -->
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Zapisz zmiany</button>
        </div>
    </form>
</div>

@endsection
