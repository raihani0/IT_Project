<?php

namespace App\Http\Controllers;

// Import model Bantuan
use App\Models\Bantuan;

// Import return type View
use Illuminate\View\View;

// Import Http Request
use Illuminate\Http\Request;

// Import RedirectResponse
use Illuminate\Http\RedirectResponse;

// Import Facades Storage
use Illuminate\Support\Facades\Storage;

class BantuanController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        // Get all bantuans
        $bantuans = Bantuan::latest()->paginate(10);

        // Render view with bantuans
        return view('bantuans.index', compact('bantuans'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('bantuans.create');
    }

    /**
     * store
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        // Upload image
        $image = $request->file('image');
        $imagePath = $image->storeAs('public/bantuans', $image->hashName());

        // Create bantuan
        Bantuan::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        // Redirect to index
        return redirect()->route('bantuans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  string $id
     * @return View
     */
    public function show(string $id): View
    {
        // Get bantuan by ID
        $bantuan = Bantuan::findOrFail($id);

        // Render view with bantuan
        return view('bantuans.show', compact('bantuan'));
    }

    /**
     * edit
     *
     * @param  string $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Get bantuan by ID
        $bantuan = Bantuan::findOrFail($id);

        // Render view with bantuan
        return view('bantuans.edit', compact('bantuan'));
    }

    /**
     * update
     *
     * @param  Request $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate form
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        // Get bantuan by ID
        $bantuan = Bantuan::findOrFail($id);

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/bantuans', $image->hashName());

            // Delete old image
            Storage::delete('public/bantuans/' . $bantuan->image);

            // Update bantuan with new image
            $bantuan->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        } else {
            // Update bantuan without image
            $bantuan->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        }

        // Redirect to index
        return redirect()->route('bantuans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        // Get bantuan by ID
        $bantuan = Bantuan::findOrFail($id);

        // Delete image
        Storage::delete('public/bantuans/' . $bantuan->image);

        // Delete bantuan
        $bantuan->delete();

        // Redirect to index
        return redirect()->route('bantuans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
