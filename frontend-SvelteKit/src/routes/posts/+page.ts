export const load = async ({ fetch }: { fetch: Function }): Promise <{ api: string, texto: string }> => {
    try {
        const res = await fetch('http://localhost:8888/backendwordpress/wp-json/wp/v2/posts');
            const data = await res.json();
            
            return {
                api: data,
                texto: 'desde wordpress escribi'
            };
    } catch (error) {
        console.error('Error al realizar la solicitud:', error);
            throw error;
    }
}

