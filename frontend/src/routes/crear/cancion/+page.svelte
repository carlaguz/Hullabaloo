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
            <button class="m-2 rounded-3xl bg-lime-700 bg-opacity-70 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-500 hover:bg-lime-800" type="button" on:click={registrarTrack}>Registrar</button>
        </div>
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
        color:black;
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
