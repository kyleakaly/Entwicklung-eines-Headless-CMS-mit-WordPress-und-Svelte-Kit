export const load = async ({ fetch, params }: { fetch: Function }): Promise<{ api: any, texto: string }> => {
    try {
        // Hacer una solicitud HTTP a la API REST de WordPress para obtener los posts
        const res = await fetch(`http://localhost:8888/backendwordpress/wp-json/wp/v2/posts?slug=${params.slug}`);
        // Extraer los datos JSON de la respuesta
        const data = await res.json();
        
        // Devolver los datos obtenidos y un mensaje de texto adicional
        return {
            api: data,
            texto: 'desde wordpress escribi'
        };
    } catch (error) {
        // Manejar errores en caso de que ocurra algún problema con la solicitud
        console.error('Error al realizar la solicitud:', error);
        // Relanzar el error para que sea manejado en otro lugar si es necesario
        throw error;
    }
}
