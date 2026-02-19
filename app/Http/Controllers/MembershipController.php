<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Membership;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = Membership::all(); // Mengambil semua data paket
        return view('memberships.index', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('memberships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('membership-image', 'public');
        }

        Membership::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'duration_in_days' => $request->duration_in_days,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('memberships.index')->with('success', 'Paket Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $membership = Membership::findOrFail($id);
        return view('memberships.show', compact('membership'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $membership = Membership::findOrFail($id);
        return view('memberships.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $membership = Membership::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'duration_in_days' => $request->duration_in_days,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            if ($membership->image) {
                Storage::disk('public')->delete($membership->image);
            }
            $data['image'] = $request->file('image')->store('membership-image', 'public');
        }

        $membership->update($data);

        return redirect()->route('memberships.index')->with('success', 'Paket berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membership = Membership::findOrFail($id);

        // Hapus file gambar jika ada
        if ($membership->image) {
            Storage::disk('public')->delete($membership->image);
        }

        $membership->delete();

        return redirect()->route('memberships.index')->with('success', 'Paket berhasil dihapus!');
    }
}
