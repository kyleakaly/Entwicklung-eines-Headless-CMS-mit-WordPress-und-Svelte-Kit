<script lang="ts">
export let data


console.log(data)
</script>

<div class="postacomodar">
    {#each data.api as post }
        <div class="postindividuales">
            <h2>{post.title.rendered}</h2>
            <img src={post.featured_image_url} alt={post.title.rendered}>
            {@html post.content.rendered}
            {#if post.tags}
            <div class="tags">
                {#each post.tag_names as tags }
                <span class="tagsindividuel">{tags}</span> 
                {/each}
            </div>
            {/if}
            <a href={`http://localhost:5173/posts/${post.slug}`} style="color: aqua;">Mehr lesenh...</a>
        </div>
    
    {/each}
</div>

<style lang="scss">

    .postacomodar{
        img{
            margin-bottom: 20px;
        }
    }
    .postindividuales{
        border: 1px solid white;
        padding: 36px;
        margin-bottom: 36px;
        h2{
            margin-bottom: 24px;

        }

        a{
            margin-top: 36px;
            display: block;
        }
    }

    @media(min-width:722px){

        .postacomodar{
            display: grid;
    grid-template-rows: 1fr 1fr auto;
    column-gap:20px;
    grid-template-columns: 1fr 1fr; }

    h2{
        font-size: 3.2rem;
    }
   
    a{
        margin-top: 36px;
        display: block;
    }

    }

    .tags{
        display: flex;
        flex-direction: row;
        gap: 12px;
        margin-bottom: 18px;
        margin-top: 18px;
        justify-content: right;
        span{
        border: 1px solid white;
display: block;
padding: 6px;

            font-size: 16px;
            color: rgb(255, 0, 170);
        }
    }

</style>