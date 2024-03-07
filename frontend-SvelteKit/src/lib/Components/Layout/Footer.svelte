<script lang="ts">
  import { onDestroy } from "svelte";
  import { datosFooter } from "../../../store/datosfooterstore";

  //datain static
  import tiktokIcons from "../../../img/tiktokicons.png";
  import linkedinIcons from "../../../img/linkdlinicons.png";
  import instagramIcons from "../../../img/instagramlogo.png";
  import twitterIcons from "../../../img/twitterIcons.png";
  import youtubeIcons from "../../../img/youtubelogo.png";

  const todoslosdatosdelstore = $datosFooter;

  onDestroy(() => todoslosdatosdelstore);

  console.log(todoslosdatosdelstore);
  const {
    informacionfooter: { emailcontact, adresse },
    alle_rechte_vorbehalten,
    importanteslinks: { agb, impresum, cookies },
    socialmediafooter: { instagram, linkedin, tiktok, twitter, youtube },
  } = todoslosdatosdelstore;
</script>

<footer class="footer">
  <div class="information">
    <a href={`mailto:${emailcontact}`}>{emailcontact || 'deineemail@email.com'}</a>
    <p class="addrese">{adresse || 'Deine Adresse'}</p>
  </div>
  <div class="space"></div>

  <div class="socialMedien">
    <a href={instagram}><img src={instagramIcons} alt="logo-instagram" /></a>
    <a href={linkedin}><img src={linkedinIcons} alt="logo-linkedin" /></a>
    <a href={tiktok}><img src={tiktokIcons} alt="logo-Tiktok" /></a>
    <a href={twitter}><img src={twitterIcons} alt="logo-twitter" /></a>
    <a href={youtube}><img src={youtubeIcons} alt="logo-youtube" /></a>
  </div>
  <div class="space"></div>

  <div class="importlinks">
    <a href={agb}>Agb</a> ||
    <a href={impresum}>Impresum</a> ||
    <a href={cookies}>Geschäftsbedingungen</a>
  </div>
  <div class="space"></div>

  <div class="wichtigeLinks">
    <p>
      &copy;{alle_rechte_vorbehalten ||'2024 Reinventamos - Marketing Agentur  Alle Rechte vorbehalten' }
    </p>
  </div>
</footer>

<style lang="scss">
  footer {
    padding: 36px;
    display: flex;
    flex-direction: column;
    gap: 20px;

    a {
      font-family: 'Nunito Sans', sans-serif;
      color: aqua;
      font-weight: 600;

      &:hover {
        color: white;
      }

      &:active {
        color: red;
      }
    }

    background-color: rgba($color: #ffffff, $alpha: 0.1);

    .information {
      p {
      }
    }

    .socialMedien {
      display: flex;
      flex-wrap: nowrap;
      flex-direction: row;
      justify-content: space-around;
      gap: 10px;
      a {
        img {
          width: 50px;
          border-radius: 10px;
        }
      }
    }

    .importlinks {
      a {
      }
    }
  }
</style>
