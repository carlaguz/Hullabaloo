<script>
    let nombre = "";
    let foto = "";
    let banda = "";

    const registrarArtista = async (event) => {
        const formData = new FormData();

        formData.append("nombre", nombre);
        formData.append("foto", foto);
        formData.append("banda", banda);

        const res = await fetch("http://localhost/proyectofinal/php/Artista_Registrar.php",{
            method: "POST",
            body: formData
        });
        
        const data = await res.json();
        alert(data);
        nombre = "";
        foto = "";
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
            <h3>Nombre del artista</h3>
            <input type="text" placeholder="Nombre" bind:value={nombre}>
        </div>
        <div>
            <h3>Foto del artista</h3>
            <input type="text" placeholder="Foto" bind:value={foto}>
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
            <button type="button" on:click={registrarArtista}>Registrar</button>
        </div>
    </form>

    <div>
        <img src={foto} alt={nombre}/>
        <h2>Artista: {nombre}</h2>
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