@include('menu')

<form action="{{ route('aula4.store') }}" method="post">
    @csrf 

    <label for="nome">Name:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <button type="submit">Submit</button>
</form>