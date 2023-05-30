<script>
  import "../app.css";
  import {user} from '../stores/user'
  import {redirect} from '@sveltejs/kit'
  const routes = [
    {
      link: "/",
      title: "home",
    },
    {
      link: "/library",
      title: "library",
    },    {
      link: "/crear/album",
      title: "crear",
    },
  ];

/*export function load(){
  if(!$user.name){
     throw redirect(302,'/')
  }
}*/

</script>

<section>
  {#if $user.name}
  <nav>
    {#each routes as route}
        <li class="cursor-pointer">
          <a href={route.link}>{route.title}</a>
        </li>
      {/each}
  <!-- svelte-ignore a11y-click-events-have-key-events -->
  <li class="cursor-pointer" on:click={()=> $user = {}}>log out</li>

  </nav>
  {:else}
  <nav></nav>  
  {/if}
  
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
