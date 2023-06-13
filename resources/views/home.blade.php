<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  @auth

  <h1>Welcome {{ auth()->user()->name }}</h1>

  <form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
  </form>
  
  
  @else 

  
  <div style="border: 2px solid black" class="p-4 border border-gray-100 rounded bg-gray-100">
    <h1 class="text-2xl font-bold">Register here</h1>
    <form action="/register" method="POST">
      @csrf
      <input type="text" name="name" placeholder="Name" class="border border-gray-200 rounded p-2 mt-2 w-full">
      <input type="email" name="email" placeholder="Email" class="border border-gray-200 rounded p-2 mt-2 w-full">
      <input type="password" name="password" placeholder="Password" class="border border-gray-200 rounded p-2 mt-2 w-full">
      <button type="submit" class="bg-blue-500 text-white p-2 rounded mt-2 w-full">Register</button>
    </form>
  </div>

  @endauth
</body>
</html>