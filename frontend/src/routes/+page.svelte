<script>
    let actualTrack = "";
  
    let fetchAlbums = async () => {
      const res = await fetch("/api/songs.json");
      const data = await res.json();
  
      const tracks = data[8].list;
      actualTrack = tracks[0].url;
      return data[8];
    };
  </script>
  
  <section>
    <article>
      <iframe
        width="100%"
        height="100%"
        src="https://www.youtube.com/embed/%7BactualTrack%7D"
        title="YouTube video player"
        frameborder="0"
      />
    </article>
    <ul>
      {#await null then { cover, artist, album, list }}
        {#each list as track, i}
          <!-- svelte-ignore a11y-click-events-have-key-events -->
          <li on:click={() => (actualTrack = track.url)}>
            {track.title}
          </li>
        {/each}
      {/await}
    </ul>
  </section>
  
  <style>
    section {
      border: 3px solid white;
      border-radius: 20px;
      padding: 15px;
      display: grid;
      width: 400px;
      height: 650px;
      place-content: center;
    }
    article {
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
    }
    li:hover {
      background-color: rgba(255, 255, 255, 0.2);
      user-select: none;
      cursor: pointer;
    }
  
    /* ===== Scrollbar CSS ===== /
    / Firefox /
    ul {
      scrollbar-width: auto;
      scrollbar-color: #726d74 #ffffff;
  
      list-style: none;
      display: grid;
      gap: 3px;
      overflow: auto;
      padding: 0 3px;
    }
    / Chrome, Edge, and Safari */
    ul::-webkit-scrollbar {
      width: 8px;
    }
  
    ul::-webkit-scrollbar-thumb {
      background-color: #726d74;
      border-radius: 10px;
      border: 3px solid #ffffff;
    }
  </style>