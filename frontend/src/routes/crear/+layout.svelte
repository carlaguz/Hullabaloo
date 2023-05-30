<script>
    
    const routes = [
        {
            link: "/crear/artista",
            title: "artista",
        },
        {
            link: "/crear/banda",
            title: "banda",
        },
        {
            link: "/crear/album",
            title: "album",
        },

        {
            link: "/crear/cancion",
            title: "canción",
        },
    ];
</script>

<nav class="flex gap-5 p-3">
    {#each routes as route}
    <li class="bg-gray-200 bg-opacity-30 px-4 py-2 rounded-md hover:bg-gray hover:text-black transition-all">
      <a href={route.link}>{route.title}</a>
    </li>
  {/each}
</nav>

<slot />

