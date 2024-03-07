// import {fail,redirect, type ActionFailure} from '@sveltejs/kit'
// import type { RequestEvent } from './$types'
// import type {formkunde} from '../../types/form'
// import type { Redirect } from 'next'


// export const actions = {

//     sendnachricht : async ({request}:RequestEvent) : Promise <formKunde | ActionFailure<formkunde>|Redirect> => {
        
//         const formData = await request.formData();
//         const names = formData.get('names')
//         const email = formData.get('email');
//         const nachrichte = formData.get('nachrichte');

//         if(!names || !email  || !nachrichte){

//             return fail(400,{
//                 error : true,
//                 message : 'Einige Felder fehlen, bitte geben Sie alle Daten ein.'
//             })

//         }

//         const datosnachrichteneue : formkunde =  {

//             names : names as string,
//             email: email as string,
//             nachrichte : nachrichte as string

//         }

//         console.log(datosnachrichteneue)

//         try {

//             const response = await fetch('http://localhost:8888/backendwordpress/wp-json/myroutes/contactform',{
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/json'
//                 },
//                 body: JSON.stringify(datosnachrichteneue)
//             })

//             if (response.ok) {
//                 console.log('registro de usuario completado');
//                 return response

//               } else {
//                 const errorData = await response.json(); // Obtener los datos del error del cuerpo de la respuesta
//                 console.error('Error al enviar el Mensaje:', errorData.message); // Mostrar el mensaje de error en la consola
//               }

            
//         } catch (error) {
//             console.error('Fehler beim Absenden des Formulars ')
//         }


//     }

// }