@extends('dashboard.layouts.main')

@section('container')
    <div class="flex h-[100vh] justify-center items-center	 ">
        <div class="p-6 mx-auto rounded-xl shadow-[0px_0px_70px_0px_rgba(0,0,0,0.3)] shadow-blue-100">
            <h1 class="text-3xl text-center p-3 font-semibold">Add User</h1>
            @if (session()->has('success'))
                <div class="w-full py-4 bg-red-300 px-2 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="w-full py-4 bg-red-300" role="alert">
                    {{ session('failed') }}
                </div>
            @endif
            <form action="/dashboard/user/create" method="post">
                @csrf
                <div>
                    <label class="" for="name">Name</label>
                    <input type="text" name="name" id="name"
                        class=" w-full border-2 px-2 py-1 rounded-lg @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label class="" for="email">Email</label>
                    <input type="email" name="email" id="email"
                        class=" w-full border-2 px-2 py-1 rounded-lg @error('email') is-invalid @enderror" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label class="" for="nohp">Phone</label>
                    <input type="text" name="nohp" id="nohp"
                        class=" w-full border-2 px-2 py-1 rounded-lg @error('nohp') is-invalid @enderror" required>
                    @error('nohp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="password" class="">Password</label><br>
                    <input type="password" name="password" id="password"
                        class="w-full border-2 rounded-lg px-2 py-1 @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="py-2 w-full rounded-full mt-3 bg-blue-400 hover:shadow-md hover:shadow-blue-200 hover:scale-95">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
