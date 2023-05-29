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
<div class="flex gap-3 p-4">
  <input type="text" placeholder="Filtrar album" bind:value={filtroAlbum} class="py-1 px-2 rounded-xl text-black">
  <input type="text" placeholder="Filtrar banda" bind:value={filtroBanda} class="py-1 px-2 rounded-xl text-black">
</div>

<ul class="grid grid-cols-5 gap-4 px-3 py-1 mx-auto place-items-center">
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
