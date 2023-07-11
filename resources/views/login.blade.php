
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Css/fix.css">
   
    

</head>

    <!-- Tampilan form login -->
     <!-- Form login di sini -->
     <body>
      <div class="container2">
        <img src="img/amikom-logo.svg" alt="Logo Amikom" class="logo">
      </div>
       
        <div class="container">
            <form action="{{ route('login') }}" method="POST" id="loginForm">
              @csrf
              <div class="form-group">
                <span class="icon-left">
                  <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                  </svg>
                </span>
                <input type="text" id="Username" name="Username" class="username-input" placeholder="Enter your username" autofocus required>
             
              </div>
              <div class="form-group">
                <span class="icon-left">
                  <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                  </svg>
                </span>
                
                <input type="password" id="Password" name="Password" placeholder="Enter your password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()"> <span class="icon-right">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                    <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                  </svg>
                 </span></span>
              </div>
              
              <div class="link">
                <p><a href="/lupapass">Lupa Password?</a></p>
              </div>
             
    
              <div class="form-group">
                <span class="icon-left">
                  <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" fill="currentColor" class="bi bi-key-fill" viewBox="0 -2 14 16">
                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                  </svg>
                </span>
                <select name="role" id="roleSelect">
        <option value="" disabled selected>pilih sebagai</option>
        <option value="petugas">Petugas</option>
        <option value="dosen">Dosen</option>
        <option value="mahasiswa">Mahasiswa</option>
      </select>
     
              </div>
              <span id="roleError" style="color: red; display: none;">Silakan pilih role terlebih dahulu</span>
              <input class="login" type="submit" value="Login" id="loginButton" >
             
              @if ($errors->has('username','role') && session('errorType') === 'authentication')
              <div class="alert alert-danger">
                  {{ $errors->first('username') }}
                  <button onclick="this.parentNode.style.display = 'none';">Mengerti</button>
              </div>
          @endif
          @if ($errors->has('role') && session('errorType') === 'authentication')
          <div class="alert alert-danger2">
              {{ $errors->first('role') }}
              <button onclick="this.parentNode.style.display = 'none';">Mengerti</button>
          </div>
      @endif
         
        
            </form>
          <div class="daftar">
                <p class="text-center">Belum Punya Akun? </p>
                <div class="text-center">
                  <p><a href="/signup">SignUp sebagai Mahasiswa</a></p>
                  
                </div>
               <div class="text-center">
                <p><a href="/signdosen">SignUp sebagai Dosen</a></p>
               </div>
              
              </div>
          </div>
          <script>
            function togglePasswordVisibility() {
              var passwordInput = document.getElementById("Password");
              var togglePassword = document.querySelector(".toggle-password");
        
              if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.innerHTML = '<span class="icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg></span>';
              } else {
                passwordInput.type = "password";
                togglePassword.innerHTML = '<span class="icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16"><path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/><path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/></svg></span>';
              }
            }

            const roleSelect = document.getElementById('roleSelect');
    const loginButton = document.getElementById('loginButton');
    const roleError = document.getElementById('roleError');
    
    roleSelect.addEventListener('change', function() {
        loginButton.disabled = roleSelect.value === '';
        roleError.style.display = roleSelect.value === '' ? 'block' : 'none';
    });

    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', function(event) {
        if (roleSelect.value === '') {
            event.preventDefault();
            roleError.style.display = 'block';
        }
    });
          </script>
    </body>


   

</html>
