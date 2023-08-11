<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #c4c4c44d;
}

.container{
    width: 100%;
    display: flex;
    max-width: 850px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.login{
    width: 400px;
}

form{
    width: 250px;
    margin: 60px auto;
}

h1{
    margin: 20px;
    text-align: center;
    font-weight: bolder;
    text-transform: uppercase;
}

hr{
    border-top: 2px solid #131313e1;
    
}

p{
    text-align: center;
    margin: 10px;
}

.right img{
    width: 450px;
    height: 100%;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
}

form label{
    display: block;
    font-size: 16px;
    font-weight: 600;
    padding: 5px;
}

input{
    width: 100%;
    margin: 2px;
    border: none;
    outline: none;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid gray;
}

a {
    color: #000000e1;
    text-decoration: none;
    font-weight: 530;
}

.oi{
    padding-top: 10px;
    padding-left: 4px;
}

a:hover {
    color: #555;
    text-decoration: underline;
}


button{
    border: none;
    outline: none;
    padding: 8px;
    width: 252px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
    border-radius: 5px;
    background: #131313ea;
}

button:hoven{
    background: #f96bad;
}

@media (max-width: 880px){
    .container{
        width: 100%;
        max-width: 750px;
        margin-left: 20px;
        margin-right: 20px;
    }

    form{
        width: 300px;
        margin: 20px auto;
    }

    .login{
        width: 400px;
        padding: 20px;
    }

    button{
        width: 100%;
    }

    .right img{
        width: 100%;
        height: 100%;
    }
}
</style>

  <div class="container">
    <div class="login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Login</h1>
            <hr>
            <p></p>
            <div>
                <label>Email Address</label>
  
                <div>
                  <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
  
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
  
              <div>
                <label>Password</label>
  
                <div>
                  <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
  
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
  
            <button type="submit">Login</button>
            <div class="oi">
                <a class="btn btn-link" href="{{ route('register') }}">Don't have an account? Sign Up</a>
            </div>
        </form>
    </div>
    <div class="right">
        <img src="images/11.jpg" alt="">
    </div>
</div>