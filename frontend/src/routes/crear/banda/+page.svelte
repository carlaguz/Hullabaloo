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
        console.log(data);
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
        </div>
        <button type="button" on:click={registrarBanda}>Registrar</button>
    </form>

    <div>
        <img src={portada} alt={nombre}/>
        <h2>Banda: {nombre}</h2>
    </div>
</section>

<style>
    section{
        padding: 15px;
        display: grid;
        grid-auto-flow: column;
    }
    img{
        width: 350px;
        height: 350px;
        object-fit: cover;
    }
</style>