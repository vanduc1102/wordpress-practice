# Wordpress Practice

Wordpress practice plugins, themes ... all things belongs to Wordpress are parked here.


# Development

## Startup
```
docker-compose up
```

Wordpress site will be available at http://localhost:8080 and http://localhost:8081 is for PhpMyAdmin


Wipe out volumes (Reset database)

```
docker-compose down -v
```

## Add a new theme or plugin

Add a new entry to volume to `docker-compose.override.yaml`
