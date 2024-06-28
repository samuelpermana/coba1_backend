<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('cms.faq.index', compact('faqs'));
    }

    public function indexWeb()
    {
        $faqs = Faq::all();
        return view('faq', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        Faq::create($validatedData);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return view('cms.faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('cms.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq->update($validatedData);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ deleted successfully');
    }
}
