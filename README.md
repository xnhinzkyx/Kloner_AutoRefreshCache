# Kloner_AutoRefreshCache

 Magento 2: Auto refresh cache using cron (runs every 5 days)

 Edit: "crontab.xml" in "app/code/Kloner/AutoRefreshCache/etc" to change the schedule 

In command line run:

```
php bin/magento setup:upgrade --keep-generated

php bin/magento cache:flush
```
