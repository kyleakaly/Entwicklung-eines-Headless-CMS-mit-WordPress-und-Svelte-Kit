import { writable } from 'svelte/store';

// Creamos un store writable para almacenar la resolución
export const resolution = writable<{ width: number; height: number }>({ width: 0, height: 0 });

// Manejar el cambio de resolución
export function handleResolutionChange() {
    resolution.set({ width: window.innerWidth, height: window.innerHeight });
}

// Verificar si estamos en el contexto del navegador antes de agregar el evento de cambio de resolución
if (typeof window !== 'undefined') {
    window.addEventListener('resize', handleResolutionChange);
}

// Función para detener la escucha
export function stopResolutionDetection() {
    if (typeof window !== 'undefined') {
        window.removeEventListener('resize', handleResolutionChange);
    }
}
