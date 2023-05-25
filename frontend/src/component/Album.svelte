<script>
  export let title = "title";
  export let cover = "cover";
  export let artist = "artist";
</script>

<article>
  <img src={cover} alt="cover" />
  <h1>{title}</h1>
  <h5>{artist}</h5>
</article>

<style>
  article {
    width: 200px;
    height: 270px;
    display: grid;
    grid-template-rows: 200px 1fr 1fr;
    background-color: rgba(0, 0, 0, 0.377);
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
  }
  img {
    height: 90%;
    width: 100%;
    object-fit: cover;
    transition: 300ms all ease;
  }
  h1 {
    padding: 0;
    margin: 0;
    font-size: 1em;
  }

  article:hover img {
    scale: 85%;
    border-radius: 50%;
  }
</style>
