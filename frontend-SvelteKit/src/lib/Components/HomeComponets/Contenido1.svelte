<script lang="ts">
    export let title :string
    export let keywords1 :string
    export let keywords2 :string
    export let keywords3 : string
    export let beschreibung :string


</script>

<div class="contenido1completo">
    <div class="contenido1">
        <div class="letras">
            <h1>{title}</h1 >
            <div class="space"></div>
            <h2 class="subtitulo" ><span>{keywords1}</span>  || <span >{keywords2}</span> || <span >{keywords3} </span> </h2>
            <p>{beschreibung}</p>
            
        </div>
    
        <div class="bilderorvideo">
    
        </div>
    
    </div>
</div>

<style lang="scss">

.contenido1completo{
        width: 100%;

        
    }
    .contenido1{
            .letras{
                p{
                    width: 40%;
                }
            }

            @media(min-width:722px){
    h1{
    font-size: 6.6rem;
}
h2{
    span{
    font-size: 2.8rem;
}
}

p{
    font-size: 1.8rem;
}
}

        }
</style>