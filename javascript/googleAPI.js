
function handleCredentialResponse(response) {
    //reponse com dados do usuario vem criptografados
    //jwt serve para decodificar os dados para um objeto data
    const datas = jwt_decode(response.credential)

    const data = JSON.stringify(datas);

    window.location.href = "http://localhost/PROJETOFINAL/googleLogin.php?userData=" + encodeURIComponent(data)
  }

  window.onload = function () {
    google.accounts.id.initialize({
        //id do cliente google
      client_id: "27039952532-729nivdqlptkgu1b7fvpk0etvv31frpf.apps.googleusercontent.com",
      login_uri: "http://localhost/PROJETOFINAL/index.php",
      callback: handleCredentialResponse
    });
    google.accounts.id.renderButton(
      document.getElementById("buttonDiv"),
        {   type: "icon",
            shape: "circle",
            theme: "filled_black",
            text: "signin_with.",
            size: "large",
            locale: "pt-BR"
        }  // customization attributes
    )
    google.accounts.id.prompt(); // also display the One Tap dialog
  }