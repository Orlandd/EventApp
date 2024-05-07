<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event ID | Sign In</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<style>
    .main {
        height: 100vh;
        box-sizing: border-box;
    }

    .login-box {
        width: 500px;
        /* border: solid 1px; */
    }
</style>

<body>
    <div class="flex h-[100vh] justify-center items-center	 ">
        <div class="w-96 h-80  mx-auto p-3 rounded-xl shadow-[0px_0px_70px_0px_rgba(0,0,0,0.3)] shadow-blue-100">
            <h1 class="text-3xl text-center p-3 font-semibold">Sign In</h1>
            @if (session()->has('success'))
                <div class="w-full py-4 bg-green-300" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="w-full py-4 bg-red-300" role="alert">
                    {{ session('failed') }}
                </div>
            @endif
            <form action="" method="post">
                @csrf
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
                <div class="mt-3">
                    <label for="password" class="">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full border-2 rounded-lg px-2 py-1 @error('password') is-invalid @enderror"" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="py-2 w-full rounded-full mt-3 bg-blue-400 hover:shadow-md hover:shadow-blue-200 hover:scale-95">Login</button>
                </div>
                <div class="text-center mt-3">
                    <p>Don't have account? <a href="/registration" class="text-blue-500">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="main d-flex justify-content-center  align-items-center">
        <div class="login-box p-4 rounded-5 shadow-lg">
            <h1 class="text-center mb-5">Sign In</h1>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="" method="post">
                @csrf
                <div>
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mt-3 form-control">Login</button>
                </div>
                <div class="text-center mt-3">
                    <p>Don't have account? <a href="/registration" class="small text-decoration-none">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
