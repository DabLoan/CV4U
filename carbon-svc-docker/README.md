# POC // Carbone microservice

## Prérequis

- shell avec gnu make (Ex : CygWin sous windows)
- docker + docker-compose


## Démarrage en mode développement


Créer éventuellement un fichier .env dans le répertoire courant pour changer le port par défault :

```
echo "CARBONE_PORT=3002" > .env
```

Démarer le container :

```bash
make up-d
```


Lancer le test :

```bash
make test
```
