<script>
  import Album from "../../component/Album.svelte";
  let filtroAlbum = "";
  let filtroBanda = "";
  const fetchalbums = async () => {
    const res = await fetch("http://localhost/proyectofinal/php/Album_Buscar.php");
    const data = await res.json();
    console.log(data);
    return data;
  };
</script>

<!-- busqueda -->
<input type="text" placeholder="Filtrar album" bind:value={filtroAlbum}>
<input type="text" placeholder="Filtrar banda" bind:value={filtroBanda}>

<ul>
  {#await fetchalbums() then albums}
    {#each albums.filter(album=> album.Titulo.toLowerCase().includes(filtroAlbum.toLowerCase()) && album.Nombre.toLowerCase().includes(filtroBanda.toLowerCase())) as album}
      <!-- svelte-ignore a11y-click-events-have-key-events -->
      <li>
        <a href="/player/{album.id}">
          <Album artist={album.Nombre} cover={album.Portada} title={album.Titulo} />
        </a>
      </li>
    {/each}
  {/await}
</ul>

<style>
  a{
    text-decoration: none;
    color: unset;
  }
  ul {
    display: grid;
    list-style: none;
    grid-template-columns: repeat(5, 1fr);
    gap: 15px;
    width: 95%;
    margin: auto;
    place-items: center;
  }

  @media screen and (max-width: 1300px) {
    ul {
      grid-template-columns: repeat(4, 1fr);
    }
  }
  @media screen and (max-width: 1075px) {
    ul {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  @media screen and (max-width: 824px) {
    ul {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  @media screen and (max-width: 590px) {
    ul {
      grid-template-columns: repeat(1, 1fr);
    }
  }
</style>
