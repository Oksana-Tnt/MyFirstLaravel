<?php

namespace App\Http\Controllers;

use App\Models\Pizza;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PizzaController extends Controller
{
    public function index(Request $request)
    {
        $gusti = Pizza::all()->pluck("gusto");
        if (empty($request->gusto)) {
            $pizzas = Pizza::all();
        } else {
            $pizzas = Pizza::where("gusto", $request->gusto)->get();
        }
        return view("pages.pizze", compact("pizzas", "gusti"));
    }
    public function store(Request $request)
    {

        print_r($request->thumbnail);
        $validated = $request->validate([
            'gusto' => 'required|max:255',
            'prezzo' => 'required|numeric|min:0',
            'available' => 'required|numeric|min:0|max:1',
            'thumbnail' => 'image|max:2048'
        ]);

        if ($request->hasFile('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $validated['thumbnail'] = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
            // $validated['thumbnail'] = $request->file('thumbnail')->store('uploads', 'public');
        }

        Pizza::create($validated);

        return redirect()->route('pizze')->with('success', 'Pizza creata con successo');
    }
    public function show(int $id)
    {
        $pizza = Pizza::find($id);
        return view("pages.detail", compact("pizza"));
    }
    public function destroy(int $id)
    {
        Pizza::destroy($id);
        return redirect()->route('pizze')->with('success', 'Pizza eliminata con successo');
    }
    public function edit(int $id)
    {
        $pizza = Pizza::find($id);

        return view('pages.edit', compact('pizza'));
    }
    public function update(Request $request, int $id)
    {
        Pizza::find($id)->update([
            'gusto' => $request->gusto,
            'prezzo' => $request->prezzo,
            'available' => $request->available,
        ]);
        return redirect()->route('pizze')->with('success', 'Pizza e stata modificata');
    }
}
