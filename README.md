great-notes
===========

A PHP site that should allow to store school / university notes. 

Installation
============

Firstly you will need to install the apache server. If you are using Ubuntu, just run:
	sudo apt-get install apache2

Then you need the PHP5 interpreter to execute the php code of *.php files, so execute:
	sudo apt-get install php5

The great-notes application has been written to work together with a PostgreSQL database,
so you will need to install the postgres database and the php module necessary to interface
with the PostgreSQL DBMS. So the commands you have to execute are:
	sudo apt-get install postgresql
	sudo apt-get install php5-pgsql

An another step to do is to enable the apache2 rewrite module, used by .htaccess to rewrite
the urls, in order to have a kind of MVC application routing.