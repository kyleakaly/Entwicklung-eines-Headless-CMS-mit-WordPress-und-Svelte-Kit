export const load = async ({ fetch }: { fetch: Function }): Promise<{ api: any }> => {

 try {

    const res = await fetch('http://localhost:8888/backendwordpress/wp-json/myroutes/datos');
            const data = await res.json();
            return{
                api:data
            }
      
 } catch (error) {
    console.log(error)
    return {
      api :  null
    }
 }
}