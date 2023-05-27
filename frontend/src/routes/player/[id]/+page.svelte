<script>
  import {page} from "$app/stores";
    import Modal from "../../../component/Modal.svelte";
  const playerID = $page.params.id;
  let actualTrack = {}
  let showModal = false;

  const fetchalbums = async () => {
    const res = await fetch("http://localhost/proyectofinal/php/Escuchar_Album.php?album=" + playerID);
    const data = await res.json();
    actualTrack = data[0] ?? {};
    return data;
  }

  const actualizarTrack = async () => {
    const formData = new FormData();

      formData.append("titulo", titulo);

    const res = await fetch("http://localhost/proyectofinal/php/Track_Actualizar.php?track=" + actualTrack.IDtrack,
    {
      method:'POST',
      body: formData
    });
        
        const data = await res.json();
        return data;
  }

  const eliminarTrack = async () => {
    const res = await fetch("http://localhost/proyectofinal/php/Track_Eliminar.php?track=" + actualTrack.IDtrack);
  }

  let titulo = "";
</script>

<Modal bind:showModal>
  <h2 slot="header">Actualizar {actualTrack.Track}</h2>

  <div>
    <h3>Titulo de la canción</h3>
    <input type="text" placeholder="Nombre" bind:value={titulo} />
    <button on:click={actualizarTrack}>Actualizar</button>
  </div>

</Modal>

<main>
<section>
  <article>
    <iframe
      width="100%"
      height="100%"
      src="https://www.youtube.com/embed/{actualTrack.URL}"
      title="YouTube video player"
      frameborder="0"
    />
  </article>
  <ul>
    {#await fetchalbums() then tracks} 
      {#each tracks as track, i} 
        <!-- svelte-ignore a11y-click-events-have-key-events  -->
      <li on:click={() => (actualTrack = track)}> 
          {track.Track} 
        </li> 
      {/each} 
    {/await} 
 </ul>
</section>
  <article>
    <img src={actualTrack.Portada} alt={actualTrack.Album}/>
    <h3>Album: {actualTrack.Album}</h3>
    <h1>Escuchando: {actualTrack.Track}</h1>
    <div>
      <button type="button" on:click={()=> (showModal = true)}>Modificar canción</button>
      <button type="button" on:click={eliminarTrack}>Eliminar canción</button>
    </div>
  </article>
</main>

<style>
  main{
    display: grid;
    grid-auto-flow: column;
    gap: 25px;
  }
  section {
    border: 3px solid white;
    border-radius: 20px;
    padding: 15px;
    display: grid;
    grid-template-rows: 350px 1fr;
    width: 400px;
    height: 650px;
    place-content: center;
  }
  img{
    width: 250px;
    object-fit: cover;
  }
  section article {
    height: 350px;
    width: 350px;
    border-radius: 20px;
    overflow: hidden;
    scale: 0.8;
  }
  li {
    font-size: 1.3em;
    border-radius: 5px;
    padding: 2px 4px;
    height: 30px;
  }
  li:hover {
    background-color: rgba(255, 255, 255, 0.2);
    user-select: none;
    cursor: pointer;
  }

  /* ===== Scrollbar CSS ===== /
  /* Firefox */
  ul {
    scrollbar-width: auto;
    scrollbar-color: #726d74 #ffffff;

    list-style: none;
    display: grid;
    grid-auto-flow: row;
    gap: 3px;
    overflow: auto;
    padding: 0 3px;
  }
  /* Chrome, Edge, and Safari */
  ul::-webkit-scrollbar {
    width: 8px;
  }

  ul::-webkit-scrollbar-thumb {
    background-color: #726d74;
    border-radius: 10px;
    border: 3px solid #ffffff;
  }
</style>