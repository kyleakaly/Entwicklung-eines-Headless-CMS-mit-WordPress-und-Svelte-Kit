<script lang="ts">
    export let data 

    function getCleanUrl(url: string) {
        const path = new URL(url).pathname;
        return path.split('/').filter(Boolean).pop() || '';
    }
</script>

<nav>
    <ul class="organizarmenu">
        {#each data.menu.menu_items as datos }
            <li><a href={`http://localhost:5173/${getCleanUrl(datos.url)}`}>{datos.title} </a></li>
        {/each}
    </ul>

</nav>

<!-- <ul class="redSocial">
<li><a href="/#">Insta</a></li>
<li><a href="/#">Face</a></li>
<li><a href="/#">X</a></li>
</ul> -->

<style>
    ul{
display: flex;
flex-direction: row;
gap: 30px;
list-style: none;
}
</style>