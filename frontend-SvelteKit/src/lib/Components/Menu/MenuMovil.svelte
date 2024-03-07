<script lang="ts">

        export let data
        let openMenu = false
    let ultransformation 

        function getCleanUrl(url: string) {
        const path = new URL(url).pathname;
        return path.split('/').filter(Boolean).pop() || '';
    }

    const gotohome = ()=>{
      window.location.href = '/'
    }
    

    </script>
    <div class="header-container-menumovil">
      
      <div class="logo"><span>
        <img src={data.menu.custom_logo} alt='logo' width="200" on:click={gotohome}> 
    
      <div class="header-container-logo-and-burguer">
        <button type="button" class="header-menuhamburguesa" on:click={()=> {
            ultransformation = document.querySelector('.ulmenu')
         openMenu = !openMenu
         if(openMenu){
           document.body.style.overflow = 'hidden';
          
           if(ultransformation){
             console.log(ultransformation)
             ultransformation.classList.add('algo')

           }
           
         }else{
           document.body.style.overflow = '';
           ultransformation.classList.remove('algo')
   
         }
   
         }}>
         <div class="line1 {openMenu ? 'linea1__rotate' : ''}" ></div>
         <div class="line2 {openMenu ? 'linea2__rotate' : ''}" ></div>
         <div class="line3 {openMenu ? 'linea3__rotate' : ''}"></div>
     </button> 
     </div>
  </span></div>
      
    <nav class="header-nav header-menu-movil"   >
       
        <ul class="ulmenu" bind:this={ultransformation}>
            {#each data.menu.menu_items as menu}
           
            <li class="header-menu-individuell">
                <a href={`http://localhost:5173/${getCleanUrl(menu.url)}`} on:click={()=>{
                  openMenu = !openMenu
                  document.body.style.overflow = '';
            ultransformation.classList.remove('algo')
                }}> {menu.title} </a>
              </li> 
            {/each}
          </ul>
    
        
    </nav>
    </div>
    
    <style lang="scss">
      header{
        .logo{
    span{
        display: flex;
    flex-direction: row;
    justify-content: space-between;
    }
    
}
      }
    </style>