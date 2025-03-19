@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6 px-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edytuj wizytę</h2>

    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Data wizyty -->
        <div>
            <label for="date" class="block text-gray-700 font-medium">Data wizyty</label>
            <input type="date" id="date" name="date" required 
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('date', date('Y-m-d')) }}">
            @error('date') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Godzina wizyty -->
        <div>
            <label for="time" class="block text-gray-700 font-medium">Godzina wizyty</label>
            <input type="time" id="time" name="time" required 
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('date', date('H:i')) }}">
            @error('time') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Usługa -->
        <div>
            <label for="service_id" class="block text-gray-700 font-medium">Usługa</label>
            <select name="service_id" id="service_id" required 
                class="mt-2 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ $appointment->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->name }} ({{ $service->price }} zł)
                    </option>
                @endforeach
            </select>
            @error('service_id') 
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Przycisk Zapisz zmiany -->
        <div class="flex justify-end">
            <button type="submit" class="bg-purple-700 text-white py-2 px-6 rounded-lg hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Zapisz zmiany
            </button>
        </div>
    </form>
</div>

@endsection
