<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    private function currentUser()
    {
        $user = auth('api')->user();

        if (!$user) {
            $user = auth()->user();
        }

        abort_unless($user, 401, 'Unauthenticated.');

        return $user;
    }

    public function index(Request $request)
    {
        $user = $this->currentUser();

        $search = trim($request->query('search', ''));

        $query = Contact::where('user_id', $user->id);

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%");
            });
        }

        $contacts = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email:rfc',
                'max:254',
                'regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
            ],
            'phone' => ['required', 'regex:/^[6-9][0-9]{9}$/'],
            'address' => ['nullable', 'string', 'max:2000'],
        ]);

        $contact = new Contact($validated);
        $contact->user_id = $this->currentUser()->id;
        $contact->save();

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact created successfully.');
    }
    public function edit(string $id)
    {
        $contact = Contact::where(
            'user_id',
            $this->currentUser()->id
        )->findOrFail($id);

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $user = $this->currentUser();

        $contact = Contact::where('user_id', $user->id)
            ->findOrFail($contact->id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email:rfc',
                'max:254',
                'regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
            ],
            'phone' => ['required', 'regex:/^[6-9][0-9]{9}$/'],
            'address' => ['nullable', 'string', 'max:2000'],
        ]);

        $contact->update($validated);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    public function destroy(string $id)
    {
        $contact = Contact::where(
            'user_id',
            $this->currentUser()->id
        )->findOrFail($id);

        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
