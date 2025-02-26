<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    body {
      background-color: #f8f9fa; /* Adjust this color to match your homepage */
    }
    .login-container {
      max-width: 400px;
      margin: 30px auto 30px; 
      padding: 20px;
      background: white;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
    }
    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .form-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .btn-primary {
      background-color: #007bff;
      color: white;
      padding: 8px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .forgot-password {
      font-size: 14px;
      color: #007bff;
      text-decoration: none;
    }
    .forgot-password:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')
    
    <div class="login-container">
      <h2>Login</h2>
      <x-auth-session-status class="mb-4" :status="session('status')" />
      
      <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" :value="old('email')" required autofocus>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" required>
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="form-group">
          <label for="remember_me">
            <input id="remember_me" type="checkbox" name="remember"> Remember me
          </label>
        </div>

        <div class="form-actions">
          @if (Route::has('password.request'))
            <a class="forgot-password" href="{{ route('password.request') }}">Forgot your password?</a>
          @endif
          <button type="submit" class="btn-primary">Log in</button>
        </div>
      </form>
    </div>

    @include('home.footer') 
  </div>
</body>

</html>
