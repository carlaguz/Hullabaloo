<script>
    import Login from "../component/Login.svelte";
    import Alert from "../component/Alert.svelte";
    import { user as Usuario } from "../stores/user";

  let user = "";
  let password = "";
  let visible = false;

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
    
    $Usuario = data
    alert("Bienvenido " + data.name + "!")
  }
</script>

<div class="flex h-full w-full items-center justify-center">
  <div class="rounded-xl bg-teal-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
    <div class="text-white">
      <div class="mb-8 flex flex-col items-center">
        <img src="https://pngimg.com/uploads/vinyl/vinyl_PNG21.png" width="150" alt="" srcset=""/>
        <h1 class="mb-2 text-2xl">Bienvenido a Hullabaloo :]</h1>
        <span class="text-gray-300">Iniciar sesión</span>
      </div>
      <form>
        <div class="mb-4 text-lg">
          <input bind:value={user} class="rounded-3xl border-none bg-lime-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="text" placeholder="usuario" />
        </div>

        <div class="mb-4 text-lg">
          <input bind:value={password} class="rounded-3xl border-none bg-lime-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="Password" placeholder="*********" />
        </div>
        <div class="mt-8 flex justify-center text-lg text-black">
          <button type="button" on:click={iniciarSesion} class="rounded-3xl bg-yellow-500 bg-opacity-50 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-500 hover:bg-amber-500">Ingresar</button>
        </div>
      </form>
    </div>
  </div>
</div>