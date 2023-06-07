<h1>Create Group</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea>

    <label for="contacts">Contacts</label>
    <select name="contacts[]" id="contacts" multiple>
        @foreach ($contacts as $contact)
            <option value="{{ $contact->id }}">{{ $contact->name }}</option>
        @endforeach
    </select>

    <button type="submit">Create Group</button>
</form>