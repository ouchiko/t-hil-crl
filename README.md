# t-hil-crl

Installation

Spin up a new *LAMP* instance, currently via DigOc.

Run the installatio script to install php-curl and retart the web server.

```bash
./install.sh
```

Next, just setup the config file with the proxy information, replacing the **** elements with the correct details.

```
cp config.example.php config.php
```

Hope along to the IP/domain, whatever you created

You can try with

```
http://host/test.php
http://host/test.php?user_agent=<string>
http://host/test.php?use_proxy=1
```

The service will not respond via AWS or Digital Ocean in my tests and will only respond via a different Proxying service.
