<script>
  const routes = [
    {
      link: "/",
      title: "home",
    },
    {
      link: "/library",
      title: "library",
    },
    {
      link: "/crear/artista",
      title: "Crear artista",
    },
    {
      link: "/crear/banda",
      title: "Crear banda",
    },
    {
      link: "/crear/album",
      title: "Crear album",
    },

    {
      link: "/crear/cancion",
      title: "Crear canción",
    },
  ];
</script>

<section>
  <nav>
    {#each routes as route}
      <li>
        <a href={route.link}>{route.title}</a>
      </li>
    {/each}
  </nav>
  <main>
    <slot />
  </main>
</section>

<style>
  section {
    display: grid;
    grid-template-columns: 120px 1fr;
    height: 95vh;
    margin: 10px auto;
    width: 95vw;
    gap: 10px;
  }
  nav,
  main {
    border: 2px solid white;
    list-style: none;
  }
  main {
    overflow-x: hidden;
  }
  li {
    margin: 30px 0;
    text-align: center;
  }
  a {
    text-decoration: none;
    color: pink;
    font-size: 1.2em;
  }
</style>
