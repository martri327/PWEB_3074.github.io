<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tugas Form Validation</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <center>
    <div class="main-container">
      <div class="left"></div>

      <div class="">
        <div class="container">
          <form id="form">
            <h1>LOG IN</h1>
            <div class="input-control">
              <label for="username">USERNAME</label>
              <input id="username" name="username" type="text" />
              <div class="error"></div>
            </div>

            <div class="input-control">
              <label for="password">PASSWORD</label>
              <input type="password" name="password" id="password" />
              <div class="error"></div>
            </div>

            <button type="submit">LOG IN</button>
          </form>
        </div>
      </div>
    </div>
  </center>

    <script>
      const form = document.getElementById('form');
      const username = document.getElementById('username');
      const password = document.getElementById('password');
      const loading = document.getElementById('loading');

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        validateInputs();
      });

      const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');
        
        errorDisplay.innerText = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('succes');
      };

      const setSuccess = (element) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');
        
        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
      };

      const validateInputs = () => {
        const usernameValue = username.value.trim();
        const passwordValue = password.value.trim();
        var count = 0;
        if (usernameValue === '') {
          setError(username, 'Username harus diisi!');
        } else {
          count += 1;
        }
        if (passwordValue === '') {
          setError(password, 'Password harus diisi!');
        } else {
          count += 1;
        }
        if(count === 2){
          if(usernameValue === "Martri" && passwordValue === "asd"){
            alert("Login Berhasil")
            window.location.href = "dasboard.php";
          }else{
            alert("akun tidak terdaftar")
          }
        }
      };
    </script>
  </body>
</html>
