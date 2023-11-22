<h1>User Login</h1>
<form action="users" method="POST">
    @csrf
    <pre>
   
    <input type="text" name="username" placeholder="Enter name">
    <span>
        @error('username')
        {{$message}}
        @enderror
    </span>
    <br><br>
    <input type="password" name="password" placeholder="Enter password">
    <span class="text-danger">
        @error('password')
        {{$message}}
        @enderror
    </span>
    <br><br>
    <button type="submit">Login</button>
</form>
