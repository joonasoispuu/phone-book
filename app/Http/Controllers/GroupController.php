<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Contact;

class GroupController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('groups.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Groups_Title' => 'required|string|max:255',
            'Groups_Desc' => 'nullable|string',
            'contacts' => 'nullable|array',
            'contacts.*' => 'exists:contacts,id',
        ]);

        $group = new Group();
        $group->Groups_Title = $validatedData['Groups_Title'];
        $group->Groups_Desc = $validatedData['Groups_Desc'];
        $group->save();

        if (isset($validatedData['contacts'])) {
            $group->contacts()->attach($validatedData['contacts']);
        }

        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }
}