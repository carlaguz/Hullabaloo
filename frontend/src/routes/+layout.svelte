<script>
  import "../app.css";
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
    /*border: 2px solid #FCFEFD;*/
    background-color: rgba(0, 0, 0, 0.247);
    border-radius: 10px;
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
    color: #FCFEFD;
    font-size: 1.2em;
  }
</style>
