## eots

### dependencies

#### install php5

```bash
sudo apt-get install php5-sqlite php-pear php-db php5-cli php5
```
#### install composer

```bash
cd ~
mkdir bin
cd bin
curl -sS https://getcomposer.org/installer | php
```
Add $HOME/bin to $PATH

##### download 


### init database

```bash
cd protected/data
sqlite3 eots.db < schema.sqlite.sql
```


### start server

```bash
php -S localhost:3000
```


