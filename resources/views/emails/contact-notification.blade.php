<h3>New contact message</h3>

<p>
    <strong>Name</strong>
    <br />
    {{ $contactEntity->first_name . " " . $contactEntity->last_name }}
</p>

<p>
    <strong>Email</strong>
    <br />
    {{ $contactEntity->email }}
</p>

<p>
    <strong>Phone</strong>
    <br />
    {{ $contactEntity->phone }}
</p>

<p>
    <strong>Subject</strong>
    <br />
    {{ $contactEntity->subject }}
</p>

<p>
    <strong>Message</strong>
    <br />
    {{ $contactEntity->message }}
</p>
