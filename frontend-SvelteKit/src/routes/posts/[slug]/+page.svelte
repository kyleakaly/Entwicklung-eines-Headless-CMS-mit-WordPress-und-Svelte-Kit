<script lang="ts">
    export let data
    console.log(data)
    let activeTab = 1;

function openTab(tabIndex: number) {
  activeTab = tabIndex;
}

let titulo_seo = 'blogs'
let beschreibung_seo = 'beschreibung_seo';
let keywordsclaves = 'keywordsclaves'

</script>

<svelte:head>
  <!-- Cambiar el título de la página dinámicamente -->
  <title>{titulo_seo}</title>

  <!-- Agregar una etiqueta meta -->
  <meta name="description" content={beschreibung_seo} />
  <meta name="keywords" content={keywordsclaves}/>
</svelte:head>

<div class="inhalt-blogs">
    <h1 id="title1">{data.api[0].title.rendered}</h1>
    <div class="space"></div>
    <img src={data.api[0].featured_image_url} alt='cualquiercosa'/>
    {@html data.api[0].content.rendered}
    <div class="space"></div>
   
    <div class="tabs">
        <div class="tab" on:click={() => openTab(1)} class:selected={activeTab === 1}>tag1</div>
        <div class="tab" on:click={() => openTab(2)} class:selected={activeTab === 2}>tag2</div>
        <div class="tab" on:click={() => openTab(3)} class:selected={activeTab === 3}>tag3</div>
    </div>
    
    <div class="tab-content" style="display: {activeTab === 1 ? 'block' : 'none'};">
        <h3>Rendimiento</h3>
        <p>Der Inhalt der Tabelle Nummer 1.</p>
    </div>
    <div class="tab-content" style="display: {activeTab === 2 ? 'block' : 'none'};">
        <h3>Contenido 2</h3>
        <p>Der Inhalt der Tabelle Nummer 2.</p>
    </div>
    <div class="tab-content" style="display: {activeTab === 3 ? 'block' : 'none'};">
        <h3>Contenido 3</h3>
        <p>Der Inhalt der Tabelle Nummer 3.</p>
    </div>
    <a href="/#">Klicken Sie hier</a>

</div>