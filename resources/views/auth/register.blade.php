<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>Register</title>
</head>

<body style="font-family: Figtree; background-color: var(--white); color: var(--black); justify-items:center; align-items: center;">
  <div class="justify-center px-6 py-12"
    style="display: flex; background-color: var(--accent-white); margin-top: 10%; width:900px; border-radius: 20px;">
    <div style="width:50%;">
      <img src="./images/coffee.jpg" style="width: 100%;border-radius: 20px 0 0 20px;">
    </div>

    <div style="width:50%; padding: 50px 50px 0 50px;">
      <form class="space-y-6" action="{{route('register.auth')}}" method="POST">
        @csrf
        @method('post')
        <div>
          <label for="first_name" class="block" style="font-weight: 500; font-size: large;">Firstname</label>
          <div class="mt-1">
            <input name="first_name" type="text" required placeholder="Taylor" class="block w-full border-0 px-4 py-4 text-black-900 shadow-sm ring-2 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/14" style="font-size:17px;margin-top:10px;padding-left: 10px;padding-right:10px;border-radius: 10px;">
          </div>
          @error('first_name')
          <span class="text-red-500">{{ $errors->first('first_name') }}</span>
          @enderror
        </div>
        <div>
          <label for="last_name" class="block" style="font-weight: 500; font-size: large;">Lastname</label>
          <div class="mt-1">
            <input name="last_name" type="text" required placeholder="Swift" class="block w-full border-0 px-4 py-4 text-black-900 shadow-sm ring-2 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/14" style="font-size:17px;margin-top:10px;padding-left: 10px;padding-right:10px;border-radius: 10px;">
          </div>
          @error('last_name')
          <span class="text-red-500">{{ $errors->first('last_name') }}</span>
          @enderror
        </div>
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
        <div style="margin-top: 20px;">
          <div class="flex items-center justify-between">
            <label for="password_confirmation" class="block" style="font-weight: 500; font-size: large;">password_confirmation</label>
          </div>
          <div class="mt-1">
            <input name="password_confirmation" type="password" autocomplete="current-password_confirmation" required class="block w-full border-0 px-4 py-4 text-black-900 shadow-sm ring-2 ring-inset ring-gray-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/14" style="font-size:17px;margin-top:10px;padding-left: 10px;padding-right:10px;border-radius: 10px;">
          </div>
          @error('password_confirmation')
          <span class="text-red-500">{{ $errors->first('password_confirmation') }}</span>
          @enderror
        </div>

        <div style="justify-items: center; width: 100%;">
          <button type="submit" class="flex justify-center font-bold text-white">Submit</button>
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
    margin-top: 30px;
    padding: 20px 0 20px 0;
    background-color: var(--light_blue);
    width: 70%;
    border-radius: 10px;
  }

  button:hover {
    background-color: var(--light_blue)
  }
</style>

</html>