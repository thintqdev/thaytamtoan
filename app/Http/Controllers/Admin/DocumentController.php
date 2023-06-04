<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('category')->get();

        return view('admin.document.index', ['documents' => $documents]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.document.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $documents = Document::create($request->all());

        return redirect()->route('document.list');
    }

    public function show(Document $document)
    {
        return view('admin.document.detail', [
            'document' => $document
        ]);
    }

    public function edit(Document $document)
    {
        $categories = Category::all();

        return view('admin.document.edit', [
            'document' => $document,
            'categories' => $categories
        ]);
    }

    public function update(Document $document, Request $request)
    {
        $data = $request->all();
        
        if (!$request->status) {
            $data['status'] = 0;
        }
        $document->update($data);

        return redirect()->route('document.list');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return response()->json(['success' => true]);
    }
}
