# Bitcoin Simple Shop

*Proof of concept for a Bitcoin only ecommerce site. This project is intended for small shops with few products (but don't use it for real business).*

## Requirements
- Composer
- PHP 7.0+
- Apache or NGINX server.
- MySQL server
- Bitcoin wallet on [Blockchain.info](https://blockchain.info/wallet)
- API key for [Blockchain Receive Payments API V2](https://blockchain.info/api/api_receive)

## Installation

Clone this repo to the server root directory.

```
$ git clone https://github.com/elvismdev/Bitcoin-E-Commerce-Store.git /srv/public_html/.
```

CD into the server root and install the application dependencies.

```
$ cd /srv/public_html/ && composer install
```
> Composer install will also ask for the application parameters such as DB connection details, application secret token and Blockchain.info API key and xPub for the wallet account. Then it will auto-generate the `app/config/parameters.yml` file. 

Run the commands below to generate an empty database schema for the shop:

```
$ php bin/console doctrine:database:create
```

```
$ php bin/console doctrine:schema:update --force
```

Point the server virtual host to `/srv/public_html/web/`

Load the shop in your browser, add some products, have fun (contribute).

![alt text](https://raw.githubusercontent.com/elvismdev/Bitcoin-Simple-Shop/master/web/assets/img/demo-checkout.jpg)

#### Food for nerds
- Built on [Symfony Framework](https://symfony.com/)
- Admin backend by [EasyAdmin](https://github.com/javiereguiluz/EasyAdminBundle)
- Uses [Blockchain.info API](https://blockchain.info/api) for exchange rates and [BTC wallet](https://blockchain.info/wallet) payments
- Frontend with [Material Dashboard](https://www.creative-tim.com/product/material-dashboard) components (and some custom styles)
- Icons by [Font Awesome](http://fontawesome.io/)
- [Issues](https://github.com/elvismdev/Bitcoin-E-Commerce-Store/issues) and [PR's](https://github.com/elvismdev/Bitcoin-E-Commerce-Store/pulls) are welcome :thumbsup:
