<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // Wyświetlanie wszystkich usług
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    // Formularz dodawania usługi
    public function create()
    {
        return view('services.create');
    }

    // Zapisywanie nowej usługi
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:5',
        ]);

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);

        return redirect()->route('services.index')->with('success', 'Usługa została dodana!');
    }

    // Edytowanie usługi
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    // Aktualizacja usługi
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:5',
        ]);

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);

        return redirect()->route('services.index')->with('success', 'Usługa została zaktualizowana!');
    }

    // Usuwanie usługi
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Usługa została usunięta.');
    }
}
