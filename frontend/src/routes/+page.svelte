<script>
  let user = ""
  let password = ""

  const iniciarSesion = async()=>{
    const formData = new FormData();
    formData.append('user',user);
    formData.append('pwd',password);

    const res = await fetch('http://localhost/proyectofinal/php/login.php',{
      method:"POST",
      body:formData
    })

    const data = await res.json();

    if(!data){
      alert("El usuario no existe. Ingrese un usuario o contraseña válido.")
      return;
    }
    alert("Bienvenido " + data.name + "!")
    }
</script>
  
  <section>

    <form>
      <h1>Usuario</h1>
      <input type="text" bind:value={user}>
      <h1>Contraseña
      </h1>
      <input type="password" bind:value={password}>
      <button type="button" on:click={iniciarSesion}>Ingresar</button>
    </form>

  </section>
  
  <style>
   
  </style>