<?php

namespace App\Http\Controllers;

use App\Models\avocat;
use Illuminate\Http\Request;

class AvocatController extends Controller
{
    public function index()
    {
        $avocats = avocat::orderBy('id', 'desc')->paginate(5);

        return view('avocat.index', compact('avocats'));
    }

    public function create()
    {
        return view('avocat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:avocats,email',
            'joining_date' => 'required',
            'joining_salary' => 'required'
        ]);

        avocat::create($request->except('_token'));

        return redirect()->route('avocat.index')
            ->withSuccess('avocat has been created successfully.');
    }

    public function show(avocat $avocat)
    {
        return view('avocat.show', compact('avocat'));
    }

    public function edit(avocat $avocat)
    {
        return view('avocat.edit', compact('avocat'));
    }

    public function update(Request $request, avocat $avocat)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:avocats,email,' . $avocat->id,
            'joining_date' => 'required',
            'joining_salary' => 'required'
        ]);

        $avocat->update($request->all());

        return redirect()->route('avocat.index')
            ->withSuccess('avocat details has been updated successfully.');
    }

    public function destroy(avocat $avocat)
    {
        $avocat->delete();

        return redirect()->route('avocat.index')
            ->withSuccess('avocat has been delete successfully.');
    }
}
