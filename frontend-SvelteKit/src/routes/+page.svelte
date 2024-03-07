<script lang="ts">

    import { datosFooter } from '../store/datosfooterstore.js';
    import Contenido1 from '$lib/Components/HomeComponets/Contenido1.svelte';
import { onMount } from 'svelte';

    export let data
    // No olvides cancelar la suscripción cuando el componente se desmonte para evitar memory leaks

    console.log(data.api)
    const {ersterInhalt:{titelh1:title,keywords:{keywords1,keywords2,keywords3},beschreibung},titulo_seo,keywordsclaves,beschreibung_seo,imagefondomovement,informacionfooter,socialmediafooter,importanteslinks,alle_rechte_vorbehalten} = data.api.acf
    let obtenerh1:HTMLElement | null
    let solounaprueba:HTMLElement | null
    let seleccionarimagenfondo : HTMLElement | null

    datosFooter.set({
        informacionfooter,
        socialmediafooter,
        importanteslinks,
        alle_rechte_vorbehalten // Agrega el valor correspondiente
    });

   
   
    onMount(() => {
        // Llama a la función para calcular la posición del h1 después de que se monta el componente
        obtenerh1 = document.querySelector('.contenido1completo');
        // solounaprueba = document.querySelector('.solounaprueba');
        // calcularAlturaH1();

    });

    // function calcularAlturaH1() {
    //     const alturaH1 = obtenerh1.getBoundingClientRect().top;
    //     // Ajustar la posición de solounaprueba en función de la altura del h1
    //     solounaprueba.style.top = alturaH1 + 'px';
    // }


    let lastScrollTop = 0;

   const handleScroll = () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Si el scroll va hacia abajo, mueve la imagen a la derecha
            seleccionarimagenfondo.style.transform = 'rotate(50deg)';
        } else {
            // Si el scroll va hacia arriba, mueve la imagen a la izquierda
            seleccionarimagenfondo.style.transform = 'rotate(-50deg)';
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Asegúrate de que lastScrollTop no sea negativo
    };


</script>

<svelte:head>
  <!-- Cambiar el título de la página dinámicamente -->
  <title>{titulo_seo}</title>

  <!-- Agregar una etiqueta meta -->
  <meta name="description" content={beschreibung_seo} />
  <meta name="keywords" content={keywordsclaves}/>
</svelte:head>


<svelte:window on:scroll={handleScroll} />
<div class="imagenfondobackgroundmovement" bind:this={seleccionarimagenfondo}>
    <img src={imagefondomovement} alt="hintegrund">
</div>
<!-- <div class="solounaprueba" bind:this={solounaprueba}>submenu</div> -->

<!-- diese ist die home fur unsere webseiten -->
<div class="contenidocompletoHome">
    <Contenido1 title={title}
      beschreibung={beschreibung}
       keywords1={keywords1} 
       keywords2={keywords2}
        keywords3={keywords3} />

</div>



<style lang="scss">
 
 .imagenfondobackgroundmovement{
        position: fixed;
        bottom: -6%;
    right: -14%;

    transition: transform 0.3s ease; /* Añade una transición suave */
    pointer-events: none; /* Evita que el elemento afecte a la interacción del usuario */

        img{
            width: 100px;
        }

    }

</style>