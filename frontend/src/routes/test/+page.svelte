<script>
    import Alert from "../../component/Alert.svelte";
    let visible = false;

    const showAlert = () =>{
        if(visible){
            return;
        }
        visible = true;
        setTimeout(() => visible = false, 3000)  
    }
</script>

<button on:click={()=> showAlert()}>hihihihi</button>

{#if visible}
    <Alert type={"warning"} alert={"datos incompletos !!"} message={"llena todos los campos"}/>
{/if}