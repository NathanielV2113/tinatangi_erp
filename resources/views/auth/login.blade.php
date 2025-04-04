<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>Login</title>
</head>

<body style="font-family: PT Sans; background-color: var(--white); color: var(--black); justify-items:center;">
  <div class="justify-center px-6 py-12"
    style="display: flex; background-color: var(--accent-white); margin-top: 10%; width:850px; border-radius: 20px;">
    <div style="width:50%;">
      <img src="./images/coffee.jpg" style="width: 100%;border-radius: 20px 0 0 20px;">
    </div>

    <div style="width:50%; padding: 100px 50px 0 50px;">
      <form class="space-y-6" action="{{route('login.auth')}}" method="POST">
        @csrf
        @method('post')
        <div>
          <label for="email" class="block" style="font-weight: 500; font-size: large;">Email address</label>
          <div class="mt-1">
            <input name="email" type="email" autocomplete="email" required placeholder="example@mail.com" class="block w-full border-0 px-4 py-4 text-black-900 shadow-sm ring-2 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/14" style="font-size:17px;margin-top:10px;padding-left: 10px;padding-right:10px;border-radius: 10px;">
          </div>
          @error('email')
          <span class="text-red-500">{{ $errors->first('email') }}</span>
          @enderror
        </div>

        <div style="margin-top: 20px;">
          <div class="flex items-center justify-between">
            <label for="password" class="block" style="font-weight: 500; font-size: large;">Password</label>
          </div>
          <div class="mt-1">
            <input name="password" type="password" autocomplete="current-password" required class="block w-full border-0 px-4 py-4 text-black-900 shadow-sm ring-2 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/14" style="font-size:17px;margin-top:10px;padding-left: 10px;padding-right:10px;border-radius: 10px;">
          </div>
          @error('password')
          <span class="text-red-500">{{ $errors->first('password') }}</span>
          @enderror
        </div>
        <div style="margin-top: 20px; ">
          <a href="" style="color:var(--pastel_blue);font-size:16px" class="font-semibold hover:text-indigo-500">Forgot password?</a>
        </div>

        <div style="justify-items: center; width: 100%;">
          <button type="submit" class="flex justify-center font-bold text-white">Log in</button>
        </div>
      </form>
    </div>
  </div>
  <!-- <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
        @endif
        </div> -->
</body>
<style>
  button {
    margin-top: 50px;
    padding: 20px 0 20px 0;
    background-color: var(--light_blue);
    width: 70%;
    border-radius: 10px;
  }

  button:hover {
    background-color: var(--light_blue)
  }
</style>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</html>