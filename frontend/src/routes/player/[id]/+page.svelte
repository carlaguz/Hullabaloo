<script>
  import { page } from "$app/stores";

  import  {onMount} from 'svelte'

  import Modal from "../../../component/Modal.svelte";
  const playerID = $page.params.id;
  let actualTrack = {};
  let showModal = false;
  let playlist = [{}]

  const fetchalbums = async () => {
    const res = await fetch(
      "http://localhost/proyectofinal/php/Escuchar_Album.php?album=" + playerID
    );
    const data = await res.json();
    actualTrack = data[0] ?? {};
    return data;
  };

  const actualizarTrack = async () => {
    const formData = new FormData();

    formData.append("titulo", titulo);

    const res = await fetch(
      "http://localhost/proyectofinal/php/Track_Actualizar.php?track=" +
        actualTrack.IDtrack,
      {
        method: "POST",
        body: formData,
      }
    );

    const data = await res.json();
    return data;
  };

  const eliminarTrack = async () => {
    const res = await fetch(
      "http://localhost/proyectofinal/php/Track_Eliminar.php?track=" +
        actualTrack.IDtrack
    );
    const data = await res.json();
    return data;
  };

  let titulo = "";

  onMount(async()=> {playlist = await fetchalbums()})

</script>

<Modal bind:showModal>
  <h2 slot="header"><strong>Actualizar</strong> {actualTrack.Track}</h2>

  <div>
    <input type="text" placeholder="Titulo de la cancion" bind:value={titulo} />
    <button
      class="rounded-3xl bg-lime-700 bg-opacity-70 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-500 hover:bg-lime-800"
      on:click={actualizarTrack} on:click={async ()=> playlist = await fetchalbums()}>Actualizar</button
    >
  </div>
</Modal>

<main>
  <section class="">
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
      <!-- {#await playlist then playlist} -->
        {#each playlist as track, i}
          <!-- svelte-ignore a11y-click-events-have-key-events  -->
          <li on:click={() => (actualTrack = track)}>
            {track.Track}
          </li>
        {/each}
      <!-- {/await} -->
    </ul>
  </section>
  <article>
    <div class="grid grid-flow-row m-0 p-3">
      <img class="p-2 m-0" src={actualTrack.Portada} alt={actualTrack.Album} />
      <h3 class="font-bold">Album:</h3>
      <h3>{actualTrack.Album}</h3>
      <h1 class="font-bold">Escuchando:</h1>
      <h1>{actualTrack.Track}</h1>
    </div>
    <div>
      <button
        class="rounded-3xl bg-green-500 px-4 py-2 hover:bg-lime-800 transition-all"
        type="button"
        on:click={() => (showModal = true)}>Modificar canción</button
      >
      <button
        class="rounded-3xl bg-green-500 px-4 py-2 hover:bg-lime-800 transition-all"
        type="button"
        on:click={eliminarTrack} on:click={async ()=> playlist = await fetchalbums()}>Eliminar canción</button
      >
    </div>
  </article>
</main>

<style>
  main {
    display: grid;
    grid-auto-flow: column;
    gap: 25px;
  }
  section {
    border-radius: 20px;
    padding: 15px;
    display: grid;
    grid-template-rows: 350px 1fr;
    width: 400px;
    height: 650px;
    place-content: center;
  }
  img {
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
    margin: 5px 0;
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
    grid-auto-flow: row;
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
