#!/bin/bash

#Variabili testo Script

testoDefaulAppScss="
@import \"variables\";\n@import \"common\";\n/*@import \"partials/\";*/\n"

devMode="\"dev\": \"NODE_ENV=development node_modules/webpack/bin/webpack.js -\-progress -\-hide-modules -\-config=node_modules/laravel-mix/setup/webpack.config.js\","
watchMode="\"watch\": \"NODE_ENV=development node_modules/webpack/bin/webpack.js -\-watch -\-progress -\-hide-modules -\-config=node_modules/laravel-mix/setup/webpack.config.js\","
hotMode="\"hot\": \"NODE_ENV=development webpack-dev-server -\-inline -\-hot -\-config=node_modules/laravel-mix/setup/webpack.config.js\","
prodMode="\"production\": \"NODE_ENV=production node_modules/webpack/bin/webpack.js -\-progress -\-hide-modules -\-config=node_modules/laravel-mix/setup/webpack.config.js\","

#Installo(npm + laravel-mix)
git init
echo -e "\n--------------->Repo Locale git ok, faccio npm init -y\n"
npm init --silent -y &>/dev/null
echo -e "\n---------------->npm init ok, installo laravel mix\n"
npm install --silent laravel-mix --save-dev
echo -e "\n---------------->laravel mix ok, installo pacchetti aggiuntivi\n"
cp node_modules/laravel-mix/setup/webpack.mix.js ./
npm install --silent vue-template-compiler --save-dev --production=false
npm install --silent sass-loader@7.* sass resolve-url-loader@2.3.1 --save-dev --production=false
echo -e "\n---------------->installati pacchetti aggiuntivi\n"

#Gestisco cartelle e file
echo -e "\n---------------->Gestisco file e cartelle\n"
echo "node_modules" > .gitignore
mkdir src dist src/partials
mv assets dist/
mv style.css src/common.scss
mv main.js src/app.js
touch  src/variables.scss

#modifico il testo di package.json e app.scss
echo -e $testoDefaulAppScss  > src/app.scss
sed -i "7i$devMode \n $watchMode \n $hotMode \n $prodMode" package.json

echo -e "\n---------------->Avvio Atom\n"

atom .

echo -e "\n---------------->fatto\n"
