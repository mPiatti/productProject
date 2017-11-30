Progettino Symfony "ProductBundle"
===============

## Installazione

- Clonare il repository.

 `git clone https://github.com/mPiatti/productProject.git`

 - Verrà creata la cartella `productProject`.

- Entrare nella cartella `productProject` e lanciare `composer install` per installare le dipendenze (vendor).

  - durante la procedura verrà generato il file `app/config/parameters.yml` in cui inserire i dati di connessione al database.

- Se non è stato fatto durante l'installazione delle dipendenze da parte di `composer`, inserire i dati di connessione al database nel file `app/config/parameters.yml`.

  ```
  # app/config/parameters.yml
  parameters:
    database_host:     localhost
    database_name:     product_project
    database_user:     root
    database_password: password
  ```

- Sempre nella cartella `productProject` lanciare i seguenti comandi per creare il database e le tabelle ad esso associate:

## Requisiti

## Sviluppo
