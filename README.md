# Diagnostyka

## Opis projektu
Diagnostyka to aplikacja oparta na frameworku **Laravel**.

---

## Wymagania wstępne\
1. **Serwer**:
   - PHP w wersji co najmniej `8.0`.
2. **Framework**: Laravel.
3. **Dodatkowe narzędzia**:
   - Composer (`https://getcomposer.org/`) – do zarządzania zależnościami backendowymi.
   - Menedżer pakietów npm/yarn – do instalacji pakietów frontendowych.

---

## Instalacja i konfiguracja
### 1. Pobierz projekt
Sklonuj repozytorium:
```bash
git clone <adres-repozytorium>
cd <nazwa-folderu-projektu>

composer install

## Skonfiguruj plik .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nazwa_bazy
DB_USERNAME=użytkownik
DB_PASSWORD=hasło

## Przeprowadź migracje i seedery

php artisan migrate --seed

## Zainstaluj zależności frontendowe i zbuduj assety

npm install
npm run build

## Uruchom wbudowany serwer Laravel:

php artisan serve
Domyślnie aplikacja będzie dostępna pod adresem: http://127.0.0.1:8000.



