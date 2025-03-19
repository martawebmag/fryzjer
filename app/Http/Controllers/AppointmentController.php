<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Wyświetlanie wszystkich wizyt
    public function index()
    {
        $user = Auth::user();  // Pobierz aktualnie zalogowanego użytkownika

        // Jeśli użytkownik jest klientem, wyświetl tylko jego wizyty
        if ($user->role == 'client') {
            $appointments = Appointment::where('user_id', $user->id)->orderBy('date', 'asc')->orderBy('time', 'asc')->get();  // Pobierz wizyty przypisane do klienta
            return view('appointments.index', compact('appointments'));
        } else {
            $appointments = Appointment::orderBy('date', 'asc')->orderBy('time', 'asc')->get();  // Admin widzi wszystkie wizyty
            return view('admin.index', compact('appointments'));
        }
    

    }

    // Formularz rezerwacji wizyty
    public function create()
    {
        $services = Service::all();
        return view('appointments.create', compact('services'));
    }

    // Zapisywanie nowej wizyty
    public function store(Request $request)
    {
        // Walidacja danych
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'service_id' => 'required|exists:services,id',
        ]);
    
        // Tworzenie nowej wizyty
        Appointment::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'zaplanowana',
        ]);
    
        return redirect()->route('appointments.index')->with('success', 'Wizyta została zaplanowana!');
    }

    // Edytowanie wizyty
    public function edit(Appointment $appointment)
    {
        $services = Service::all();
        return view('appointments.edit', compact('appointment', 'services'));
    }

    // Aktualizacja wizyty
    public function update(Request $request, Appointment $appointment)
    {
        // Walidacja danych
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'service_id' => 'required|exists:services,id',
        ]);
    

        $appointment->update([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'zaplanowana',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Wizyta została zaktualizowana!');
    }

    // Usuwanie wizyty
    public function destroy(Appointment $appointment)
    {
        try {
            $appointment->delete();
            return redirect()->route('appointments.index')->with('success', 'Wizyta została usunięta.');
        } catch (\Exception $e) {
            return redirect()->route('appointments.index')->with('error', 'Nie udało się usunąć wizyty.');
        }
    }
}
