<script>
    let nombre = "";
    let portada = "";

    const registrarBanda = async (event) => {
        const formData = new FormData();

        formData.append("nombre", nombre);
        formData.append("portada", portada);

        const res = await fetch("http://localhost/proyectofinal/php/Banda_Registrar.php",{
            method: "POST",
            body: formData
        });
        
        const data = await res.json();
        alert(data)
        nombre = "";
        portada = "";
    };
</script>

<section>
    <form>
        <div>
            <h3>Nombre de la banda</h3>
            <input type="text" placeholder="Nombre" bind:value={nombre}>
        </div>
        <div>
            <h3>Portada de la banda</h3>
            <input type="text" placeholder="Portada" bind:value={portada}>
            <button class="m-2 rounded-3xl bg-lime-700 bg-opacity-70 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-500 hover:bg-lime-800" type="button" on:click={registrarBanda}>Registrar</button>
        </div>
    </form>

    <div>
        <img src={portada} alt={nombre}/>
        <h2>Banda: {nombre}</h2>
    </div>
</section>

<style>
    section{
        display: grid;
        padding: 15px;
        grid-auto-flow: column;
        align-items: center;
    }
    div{
        display: grid;
        gap: 3px;
        width: 30vw;
        padding: 10px;
        margin: 0 auto;
    }
    input{
        padding: 5px;
        border-radius: 10px;
    }
    button:hover{
      background-color: #02221F;
    }
    img{
        width: 350px;
        height: 350px;
        object-fit: cover;
    }
</style>