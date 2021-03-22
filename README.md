I. Installation

1. Instal docker and docker-compose, on ubuntu `apt-get install docker docker-compose`
2. Instal git, on ubuntu `apt-get install git`
3. `git clone https://github.com/skrokbogumil/m-r-tree.git`
4. Enter project dir, go to docker directory `cd docker` run commands `docker-compose build` and `docker-compose up -d`
5. Return to main project directory, enter `cd ../` and run `bin/install.sh`
6.  `cd docker`. Run command `docker-compose exec php php bin/console parse-tree --output=screen`. If you want to use your own tree file copy this file to directory `/data/tree/{your-tree-file.json}` and run command `docker-compose exec php php bin/console parse-tree your-tree-file.json --output=screen`
7. Run test `docker-compose exec php ./vendor/bin/phpunit tests/`

II. Project structure
```
├── bin
│   ├── console
│   └── install.sh
├── composer.json
├── composer.lock
├── data
│   ├── list.json
│   ├── result
│   └── tree
│       └── example_tree.json
├── docker
│   ├── docker-compose.yml
│   └── php
│       └── Dockerfile
├── README.md
├── src
│   ├── Command
│   │   └── TreeCommand.php
│   └── Service
│       ├── Correlate.php
│       ├── ResultFileSaver.php
│       ├── TreeFileHandler.php
│       └── TreeParser.php
├── tests
│   ├── CorrelateTest.php
│   ├── TreeGenerator.php
│   └── TreeParserTest.php
└── vendor

```