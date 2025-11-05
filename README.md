# Njoeror Battleborn
Schulprojekt für Liegeplatzverwaltung und Bootsverleih am Plauer See 

## Deploy Project in Dev Container

- On start of the Devcontainer navigate to project-root Folder

    - `cd public_html/project-root/`

- Run `composer install`

- Access Page with http://localhost:8080/project-root/public/

- If Page is unresponsive please restart Apache server ``service apache2 restart``
    - if that does not work rebuild container crtl+shift+P rebuild container