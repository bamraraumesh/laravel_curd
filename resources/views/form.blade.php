<!-- resources/views/form.blade.php -->
<form action="{{ route('submit.form') }}" method="post">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="age">Age:</label>
    <input type="number" name="age" id="age" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <button type="submit">Submit</button>
</form>
