# Remember Filter Extension for Magento2

## Installation

Download the extension as a ZIP file from this repository and extract in magento Root directory.

Run below command
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
```

###
Install with composer
```
composer require krishaweb/feedback
php bin/magento setup:upgrade
php bin/magento setup:di:compile
```

##Requirements
PHP >= 5.6
Magento >= 2.1



## Functionalities
When user select any size from layered navigation, the system saves value in browser cookie.

After this whenever user selects any other category it by default filter with that value.

User can cancel this filter value by remove filter button provided by Magento Default and with "Clean All" button.

As of now it has been developed only for "size" attribute.

As, the system stores size value in browser cache, it will remove when user clear browser data.

It is also working with varnish cache


##License
Remember Filter Magento 2 module is released under the Open Software License 3.0 (OSL-3.0).

##Support
If you have concerns or questions, please send an email to support@krishaweb.com with all relevant details that are needed to investigate or resolve an issue.










