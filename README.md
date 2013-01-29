# Yii boilerplate on Openshift

## How to use
1. Create the project

   `rhc app create YOURAPPNAME php-5.3`

2. Add the mysql cartridge

   `rhc cartridge add mysql-5.1 --app YOURAPPNAME`

3. Add git remote to this project

   `git remote add boilerplate https://github.com/AthenaLightened/Openshift-Yii-Boilerplate.git`

4. Pull the sources

   `git pull -X theirs boilerplate master`

5. Check & change the configs in misc/configs

## Changes made
1. Add [yii-environment](http://code.google.com/p/yii-environment/) extension
2. Move the framework into "libs"
3. Change the "protected" folder to "misc"
4. Use $_ENV['OPENSHIFT_APP_UUID'] to determine the Yii environment.
5. Use $_ENV['OPENSHIFT_MYSQL_DB_*'] to determine the production database
6. set the runtimePath to $_ENV['OPENSHIFT_PHP_LOG_DIR'] on production
7. Add hourly test command
