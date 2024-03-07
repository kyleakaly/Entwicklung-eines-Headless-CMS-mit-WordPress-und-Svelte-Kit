export const load = async ({ fetch }: { fetch: Function }): Promise<{ menu: any }> => {
    try {
        // Hacer una solicitud HTTP a la API REST de WordPress para obtener los posts
        const res = await fetch('http://localhost:8888/backendwordpress/wp-json/myroutes/menu-and-logo');
        // Extraer los datos JSON de la respuesta
        const data = await res.json();
        
        // Devolver los datos obtenidos y un mensaje de texto adicional
        return {
            menu: data,
        };
    } catch (error) {
        // Manejar errores en caso de que ocurra algún problema con la solicitud
        console.error('Error al realizar la solicitud:', error);
        // Relanzar el error para que sea manejado en otro lugar si es necesario
        throw error;
    }
}
