<h1> Headless CMS mit WordPress und SvelteKit </h1>

Dieses Projekt stellt die Entwicklung eines headless Content Management Systems (CMS) vor, das WordPress als Backend und Svelte Kit als Frontend verwendet.
Das flexible und leistungsstarke CMS basiert auf der Vielseitigkeit von WordPress und dessen Anpassungsfähigkeit mit Advanced Custom Fields (ACF).
Die Daten werden über die RESTful-API von WordPress abgerufen und dynamisch im Frontend mit Svelte Kit gerendert. Das Projekt wurde mit TypeScript umgesetzt und dient als Marketing-Website. 
Es umfasst eine grundlegende Startseite, ein Blog, in dem Benutzer Beiträge direkt im Backend erstellen können, und ein Kontaktformular, das Informationen in einer Datenbanktabelle speichert, um sie zu senden oder zu archivieren.

#### Konfiguration des Backends (WordPress):

1. Starten Sie einen Apache-Server mit MAMP oder XAMPP.
2. Erstellen Sie eine Datenbank und einen Benutzer auf Ihrem MySQL-Server.
3. Kopieren Sie den Ordner `backendwordpress` in das `htdocs`-Verzeichnis Ihres Servers.
4. Starten Sie den Server und navigieren Sie in Ihrem Browser zu `localhost:<port>/backendwordpress`.
5. Installieren oder aktivieren Sie das Plugin Advanced Custom Fields in WordPress.
6. Importieren Sie die JSON-Datei mit den verfügbaren Feldern aus dem Repository.
7. Konfigurieren Sie gegebenenfalls weitere erforderliche Funktionen in WordPress, wie das Erstellen von Blogs, Menüs oder Texteinstellungen.

#### Konfiguration des Frontends (Svelte Kit):

1. Klonen Sie das Repository des Svelte-Kit-Frontends.
2. Öffnen Sie ein Terminal im Frontend-Ordner und führen Sie `npm install` aus, um die Abhängigkeiten zu installieren.
3. Nach der Installation der Abhängigkeiten starten Sie den MAMP-Server.
4. Starten Sie den Entwicklungsserver von Svelte Kit mit `npm run dev`.
5. Öffnen Sie die in der Terminalausgabe bereitgestellte URL, um den Inhalt des Frontends anzuzeigen.
6. Um Inhalte zu aktualisieren oder hinzuzufügen, greifen Sie auf das Backend von WordPress zu und führen Sie die erforderlichen Änderungen im Administrationsbereich durch.

#### Verwendete Technologien:

- Backend: WordPress mit benutzerdefinierten Plugins.
- Frontend: Svelte Kit mit TypeScript und CSS (einschließlich SCSS).
- Weitere Technologien: MySQL, MAMP/XAMPP.

Wenn Sie Schwierigkeiten beim Einrichten oder Verstehen des Projekts haben, zögern Sie nicht, mich zu kontaktieren, um eine ausführlichere Erklärung zu erhalten. Ich hoffe, Sie haben Spaß beim Erkunden des Projekts!

### Projektbilder:

![Captura de pantalla 2024-03-07 012940](https://github.com/kyleakaly/Entwicklung-eines-Headless-CMS-mit-WordPress-und-Svelte-Kit/assets/101314155/157b7a97-1c09-4437-92af-32c2339c3d30)

![Captura de pantalla 2024-03-07 011936](https://github.com/kyleakaly/Entwicklung-eines-Headless-CMS-mit-WordPress-und-Svelte-Kit/assets/101314155/82952080-e958-4339-93d7-1a9df0b0bc78)
![Captura de pantalla 2024-03-07 011851](https://github.com/kyleakaly/Entwicklung-eines-Headless-CMS-mit-WordPress-und-Svelte-Kit/assets/101314155/bb5bf968-a36c-4849-9920-991b675542d1) 
![Captura de pantalla 2024-03-07 012028](https://github.com/kyleakaly/Entwicklung-eines-Headless-CMS-mit-WordPress-und-Svelte-Kit/assets/101314155/6c90215f-3268-41de-909c-1763e5ac2237)
![Captura de pantalla 2024-03-07 011627](https://github.com/kyleakaly/Entwicklung-eines-Headless-CMS-mit-WordPress-und-Svelte-Kit/assets/101314155/f5fb8b2f-ed00-4849-bd96-a6f4561399fb)
![Captura de pantalla 2024-03-07 011642](https://github.com/kyleakaly/Entwicklung-eines-Headless-CMS-mit-WordPress-und-Svelte-Kit/assets/101314155/ffbc84e8-e532-4921-b0dd-c942ed65185d) ![Captura de pantalla 2024-03-07 012048](https://github.com/kyleakaly/Entwicklung-eines-Headless-CMS-mit-WordPress-und-Svelte-Kit/assets/101314155/34ee4182-49d2-4c8f-a1d4-04f2f9894d54)



---

Dieses Readme bietet detaillierte Anweisungen zur Konfiguration und Ausführung sowohl des WordPress-Backends als auch des Svelte-Kit-Frontends im Projekt. Wenn Sie weitere Hilfe benötigen oder Fragen haben, zögern Sie bitte nicht, mich zu kontaktieren. Vielen Dank für die Überprüfung des Projekts!
