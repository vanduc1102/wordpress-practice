# Wordpress Practice

Wordpress practice plugins, themes ... all things belongs to Wordpress are parked here.


# Development

## Startup
```
docker-compose up
```

Wordpress site will be available at http://localhost:8080
and http://localhost:8081 is for PhpMyAdmin


Wipe out volume (Reset database)

```
docker-compose down -v
```

## Add new a theme or plugin

Add more a new entry volume to `docker-compose.override.yaml`