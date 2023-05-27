<script>
    let titulo = "";
    let album = "";
    let link = "";

    const registrarTrack = async (event) => {
        const formData = new FormData();

        formData.append("titulo", titulo);
        formData.append("album", album);
        formData.append("URL", link);

        const res = await fetch(
            "http://localhost/proyectofinal/php/Track_Registrar.php",
            {
                method: "POST",
                body: formData,
            }
        );

        const data = await res.json();
        alert(data);
        titulo = "";
        link = "";
    };

    const cargarAlbum = async () => {
        const res = await fetch(
            "http://localhost/proyectofinal/php/Album_Buscar.php"
        );

        const data = await res.json();
        return data;
    };
</script>

<section>
    <form>
        <div>
            <h3>Titulo de la canción</h3>
            <input type="text" placeholder="Nombre" bind:value={titulo} />
        </div>
        <div>
            <h3>URL de la canción</h3>
            <input type="text" placeholder="URL" bind:value={link} />
        </div>
        <button type="button" on:click={registrarTrack}>Registrar</button>
    </form>

    <div>
        <iframe
            width="360"
            height="315"
            src="https://www.youtube.com/embed/{link}"
            title="YouTube video player"
            frameborder="0"
        />
        <h2>Perteneciente al album:</h2>
        <select bind:value={album}>
            {#await cargarAlbum() then albumes}
                {#each albumes as { Titulo, id, Nombre }}
                    <option value={id}>{Titulo} - {Nombre}</option>
                {/each}
            {/await}
        </select>
    </div>
</section>

<style>
    section {
        padding: 15px;
        display: grid;
        grid-auto-flow: column;
    }
    button{
        display: grid;
        grid-template-columns: 120px;
        background-image: linear-gradient(20deg, pink, lavender);
        border-radius: 10px;
        margin-top: 10px;
        padding: 10px;
    }
</style>
