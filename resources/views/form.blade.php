<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        h1, h2 {
            text-align: center;
        }
        form {
            max-width: 400px;
            width: 100%;
            padding: 10px;
        }
        form div {
            margin-bottom: 15px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .error-messages ul {
            color: red;
        }
    </style>
</head>
<body>

<h1>Submit a Message</h1>

<!-- Display validation errors -->
@if ($errors->any())
    <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('messages.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
    </div>
    <div>
        <label for="message">Message:</label>
        <textarea id="message" name="message">{{ old('message') }}</textarea>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

<h2>All Messages</h2>
<ul>
    @foreach ($messages as $message)
        <li>{{ $message->name }} ({{ $message->email }}) said: "{{ $message->message }}" on {{ $message->created_at }}</li>
    @endforeach
</ul>

</body>
</html>
