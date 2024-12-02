<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BantuanController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $bantuans = Bantuan::latest()->paginate(10);
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
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'status' => 'required|boolean'
        ]);

        Bantuan::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);

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
        $bantuan = Bantuan::findOrFail($id);
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
        $bantuan = Bantuan::findOrFail($id);
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
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'status' => 'required|boolean'
        ]);

        $bantuan = Bantuan::findOrFail($id);

        $bantuan->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);

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
        $bantuan = Bantuan::findOrFail($id);
        $bantuan->delete();

        return redirect()->route('bantuans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
