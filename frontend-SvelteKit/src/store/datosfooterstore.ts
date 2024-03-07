import { writable } from 'svelte/store';

export const datosFooter = writable<{informacionfooter: {adresse: string; emailcontact: string},socialmediafooter : {instagram: string,linkedin: string,tiktok: string,twitter:string,youtube: string},importanteslinks: {agb:string,impresum:string,cookies:string},alle_rechte_vorbehalten:string }>({ 
informacionfooter: {adresse:'',emailcontact:''}, 
socialmediafooter: {instagram: '',linkedin: '',tiktok: '',twitter:'',youtube: ''},
importanteslinks: {agb:'',impresum:'',cookies:''},alle_rechte_vorbehalten:""
});