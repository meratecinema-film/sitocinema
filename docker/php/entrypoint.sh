#!/bin/bash
set -e

# 1. Attendi che il database MySQL sia pronto a ricevere connessioni
echo "Attesa della connessione al database MySQL..."
until php artisan db:monitor > /dev/null 2>&1; do
    sleep 2
done

# 2. Installa le dipendenze Composer se la cartella vendor non esiste
if [ ! -d "vendor" ]; then
    echo "Installazione dipendenze Composer..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# 3. Esegui le migrazioni del database e la pubblicazione degli asset
echo "Esecuzione migrazioni e setup..."
php artisan migrate --force
php artisan filament:upgrade

# 4. Popola il database ed esegui i Seeder (incluso l'Admin)
php artisan db:seed --force

# Avvia il processo principale (php-fpm)
exec "$@"