<script>
    let username = ""
    let password = ""

    const fetchUser = async (event)=>{
        const res = await fetch('http://localhost/proyectofinal/php/login.php',{
            method:"POST",
            body:JSON.stringify({username,password}),
            headers:{
                'Content-Type':'application/json',
            }
        });
        console.log(res)
        const data = await res.json();
        console.log(data)
    }

</script>

<section>
    <div>
        <h1>Log In</h1>
    </div>
    <form>
        <input bind:value={username} placeholder="Username" type="text"/>
        <input bind:value={password} placeholder="Password" type="password"/>
        <button type="button" on:click={fetchUser}>Ingresar</button>

    </form>
</section>

<style>
    section{
        display: grid;
        grid-template-columns: 140px;
        background-image: linear-gradient(200deg, );
        justify-content: left;
    }
    div{
        display: block;
        margin: auto;
    }
    h1{
        font-size: large;
    }
    #btn{
        background-color: #E56D94;
		margin-top: 20px;
		padding: 8px;
		border-radius: 5px;
    }
</style>