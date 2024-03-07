<script lang="ts">
  import { applyAction, enhance } from "$app/forms";
    import { fail } from "@sveltejs/kit";
  import type {formkunde} from '../../types/form'
  import { writable } from "svelte/store";

  // export let form;

  let names = ''
  let email = ''
  let nachrichte = ''
  let responseMessage = '';

  const errorMessage = writable(''); // Variable de estado para el mensaje de error


  const agregarpost = async () => {

    if(!names || !email  || !nachrichte){

      if (!names || !email || !nachrichte) {
      errorMessage.set('Einige Felder fehlen, bitte geben Sie alle Daten ein.');

      // Eliminar el mensaje de error después de 5 segundos
      setTimeout(() => {
        errorMessage.set('');
      }, 5000);
      
      return;
    }

}

const datosnachrichteneue : formkunde =  {

names : names as string,
email: email as string,
nachrichte : nachrichte as string

}

    try {
      const response = await fetch('http://localhost:8888/backendwordpress/wp-json/myroutes/contactform', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(datosnachrichteneue)
      });

      if (response.ok) {
        const api = await response.json();
        responseMessage = api.data; // Actualizar el estado con el mensaje de respuesta
        console.log(responseMessage);

      } else {
        const errorData = await response.json();
        console.error('Error al enviar el Mensaje:', errorData.message);
        responseMessage = 'Error: ' + errorData.message; // Actualizar el estado con el mensaje de error
      }
    } catch (error) {
      console.error('Fehler beim Absenden des Formulars');
      responseMessage = 'Error: Ha ocurrido un error al enviar el formulario'; // Actualizar el estado con el mensaje de error
    }
  };

</script>

<!-- <div class="formdiv">
  <form action="?/sendnachricht" method="post" autocomplete="off" use:enhance on:submit|preventDefault>
    <label for="names"> Name</label>
    <input type="text" name="names" id="names" class="form-control mb-3"  placeholder="Name" />
    <label for="email"> Email</label>
    <input type="email" name="email" id="email" class="form-control mb-3"  placeholder="Email"/>
    <label for="nachrichte"> nachrichte</label>
    <input type="texarea"  name="nachrichte" id="nachrichte" class="form-control mb-3" placeholder="nachrichte" />
    <button class="btn">Senden</button>
  </form>
 </div> -->



<div class="formdiv">

  <div class="titulo">
    <h1>Beginnen Sie Ihre Projekt mit uns!
    </h1>
   </div>

<form on:submit|preventDefault = {agregarpost} >
  <label for="names"> Name</label>
  <input type="text" placeholder="names"  class="form-control mb-3" bind:value={names}>
  <label for="email"> Email</label>
  <input type="email" placeholder="email" class="form-control mb-3" bind:value={email}>
  <label for="nachrichte"> nachrichte</label>
  <input type="textarea" placeholder="nachrichte" class="form-control mb-3" id="nachrichte" bind:value={nachrichte}>
  <button type="submit" class="btn btn-info" >Senden</button> 

</form>
<!-- {#if agregarpost().error}
<p class="text-danger">{agregarpost().message}</p>
{/if} -->
</div>

<style>
  #nachrichte {
    width: 100%; /* Ancho fijo */
    height: 150px; /* Altura fija */
    resize: none; /* Evita que se pueda redimensionar */
    padding: 10px; /* Ajusta el relleno interior */
    font-size: 16px; /* Tamaño de la fuente */
    font-family: Arial, sans-serif; /* Fuente */
    box-sizing: border-box; /* Incluye el relleno y el borde en el tamaño total */
    border: 1px solid white;
  }
</style>
