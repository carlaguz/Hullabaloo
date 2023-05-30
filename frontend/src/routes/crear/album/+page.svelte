<script>
    let titulo = "";
    let portada = "";
    let banda = "";

    const registrarAlbum = async (event) => {
        const formData = new FormData();

        formData.append("titulo", titulo);
        formData.append("portada", portada);
        formData.append("banda", banda);

        const res = await fetch("http://localhost/proyectofinal/php/Album_Registrar.php",{
            method: "POST",
            body: formData
        });
        
        const data = await res.json();
        alert(data)
        titulo = "";
        portada = "";
    };

    const cargarBandas = async ()=> {
        const res = await fetch("http://localhost/proyectofinal/php/Banda_Buscar.php");
        
        const data = await res.json();
        return data;
    }
</script>

<section>
    <form>
        <div>
            <h3>Nombre del album</h3>
            <input type="text" placeholder="Nombre" bind:value={titulo}>
        </div>
        <div>
            <h3>Portada del album</h3>
            <input type="text" placeholder="Portada" bind:value={portada}>
        </div>
        <div>
            <h3>Pertenece a la banda:</h3>
            <select bind:value={banda}>
                {#await cargarBandas() then bandas}
                    {#each bandas as {Nombre, id}}
                        <option value={id}>{Nombre}</option>
                    {/each}
                {/await}
            </select>
        </div>
        <div>
            <button class="m-2 rounded-3xl bg-lime-700 bg-opacity-70 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-500 hover:bg-lime-800" type="button" on:click={registrarAlbum}>Registrar</button>
        </div>
    </form>

    <div>
        <img src={portada} alt={titulo}/>
        <h2>Album: {titulo}</h2>
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
    input, select{
        color: black;
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