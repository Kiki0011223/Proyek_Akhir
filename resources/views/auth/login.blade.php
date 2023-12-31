<html>

<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="CSS.css">
</head>

<body>

    <!-- <audio autoplay> 
    <source src="musik/Nahida.mp3" type="audio/mp3">
    </audio> -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div id="blur" class="container">
        <div class="login">
            <form class="form1" action="{{ route('login') }}" method="post">
                @csrf
                <center>
                    <h1>Login</h1>
                    <hr>
                    <p>Sekolah Menengah Atas</p>
                    <label for="email" :value="__('Email')">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" :messages="$errors->get('email')" placeholder="masukan email">
                    <label for="password" :value="__('Password')">Password</label>
                    <input id="password" class="block mt-1 w-full"type="password" name="password" required autocomplete="current-password" :messages="$errors->get('password')" placeholder="masukan password">
                
                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button><br><br>
                @if (Route::has('password.request'))
                Gak inget kata sandi ?<a href="{{ route('password.request') }}">
                    {{ __('Lupa Sandi') }}
                </a>
                @endif
                Belum punya akun? <a id="show-login" onclick="toggle()" href="#">daftar</a>
            </center>
            </form>

        </div>
        <div class="right">
            <img id="x" src="gambar/login1.png">
        </div>

        <?php
            if(isset($_GET['pesan'])){
                if($_GET['pesan']=="logout"){
                    echo "<script>alert('ANDA BERHASIL LOG OUT')</script>";
                }else if($_GET['pesan']=="belum_login"){
                    echo "<script>alert('LOGIN TERLEBIH DAHULU')</script>";
                }
            }
            ?>
    </div>

    <!-- popup daftar akun baru-->
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="popup">
            <div class="close-btn">Batal</div>
            <div class="form1">
                <h2>Daftar Akun</h2><br>
                <hr><br>

                <div>
                    <label for="name" :value="__('Name')">Nama</label>
                    <input id="name" :messages="$errors->get('name')" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="masukan nama">
                </div>
                <div>
                    <label for="alamat" :value="__('alamat')">Alamat</label>
                    <input id="alamat" :messages="$errors->get('alamat')" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" placeholder="masukan alamat">
                </div>
                <div>
                    <label for="jenisKelamin" :value="__('jenisKelamin')">Jenis Kelamin</label>
                    <select name="jenisKelamin" id="jeniskelamin" :messages="$errors->get('jenisKelamin')" :value="old('jenisKelamin')" required autofocus autocomplete="jenisKelamin" placeholder="masukan jenisKelamin">
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                    </div>
                <div>
                    <label for="email" :value="__('Email')">Email</label>
                    <input id="email" :messages="$errors->get('email')" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="masukan email">
                </div>
                <div>
                    <label for="password" :value="__('Password')">Password</label>
                    <input id="password" :messages="$errors->get('password')" type="password" name="password"
                    required autocomplete="new-password" placeholder="masukan password">
                </div>
                <div>
                    <label for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
                    <input id="password_confirmation" :messages="$errors->get('password_confirmation')" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="masukan password">
                </div>
                
                <div>
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
    </form>

    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-image: url('gambar/bg.png');
        background-size: cover;
    }

    .container {
        width: 100%;
        display: flex;
        max-width: 850px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .container#blur.active{
        filter: blur(20px);
        pointer-events: none;
        user-select: none;
    }

    .login {
        width: 400px;
    }

    .form1 {
        width: 250px;
        margin: 60px auto;
    }

    h1 {
        margin: 20px;
        text-align: center;
        font-weight: bolder;
        text-transform: uppercase;
    }

    hr {
        border-top: 2px solid #555555;
    }

    p {
        text-align: center;
        margin: 10px;
    }

    .right img {
        width: 500px;
        height: 100%;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .form1 label {
        display: block;
        font-size: 16px;
        font-weight: 600;
        padding: 5px;
    }

    input {
        width: 100%;
        margin: 2px;
        border: none;
        outline: none;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid gray;
    }
    select {
        width: 100%;
        margin: 2px;
        border: none;
        outline: none;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid gray;
    }
    option {
        width: 100%;
        margin: 2px;
        border: none;
        outline: none;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid gray;
    }
    button {
        border: none;
        outline: none;
        padding: 8px;
        width: 252px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        margin-top: 20px;
        border-radius: 5px;
        background: #555555;
    }

    button:hover {
        background: rgba(214, 86, 64, 1);
    }

    .awal{
    width: 100%;
    height: 100%;
    position: absolute;
    }

    .awal img{
    width: 100%;
    height: 100%;
    }

    .atas{
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    }
    .atas:hover{
    opacity: 1;
    transition: all 0,5 ease;
    }


@media (max-width: 880px) {
    .container {
        width: 100%;
        max-width: 750px;
        margin-left: 20px;
        margin-right: 20px;
    }

    .form1 {
        width: 300px;
        margin: 20px auto;
    }

    .login {
        width: 400px;
        padding: 20px;
    }

    button {
        width: 100%;
    }

    .right img {
        width: 100%;
        height: 100%;
    }
}

        
    #hilangkan {
        display: none;
    }

    #musik {
        display: none;
    }

    .popup {
        color: black;
        position: absolute;
        top: -150%;
        left: 50%;
        opacity: 0;
        transform: translate(-50%, -50%) scale(1.25);
        width: 400px;
        height: 620px;
        padding: 20px 20px;
        background-image: url('gambar/daftar.png');
        text-align: center;
        line-height: 15px;
        border-radius: 15px;
        cursor: pointer;
        transition: top 0ms ease-in-out 200ms,
            opacity 200ms ease-in-out 0ms,
            transform 200ms ease-in-out 0ms;

    }

    .popup hr {
        border-color: white;
    }

    .close-btn {
        text-align: right;
    }

    .popup.active {
        top: 50%;
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
        transition: top 0ms ease-in-out 0ms,
            opacity 200ms ease-in-out 200ms,
            transform 200ms ease-in-out 200ms;
    }

    #blur {
        filter: blur(0px);
    }

    #blur.active {
        filter: blur(5px);
    }
    </style>

    <script>
    document.querySelector("#show-login").addEventListener("click", function() {
        document.querySelector(".popup").classList.add("active");
    });
    document.querySelector(".popup .close-btn").addEventListener("click", function() {
        document.querySelector(".popup").classList.remove("active");
    });

    document.querySelector("#show-login").addEventListener("click", function() {
        document.querySelector("#blur").classList.add("active");
    });
    document.querySelector(".popup .close-btn").addEventListener("click", function() {
        document.querySelector("#blur").classList.remove("active");
    });
    </script>
</body>

</html>