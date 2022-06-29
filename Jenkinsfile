pipeline {
  environment {
    PATH = "$PATH:/usr/bin/docker-compose/"
  }
  
  agent any
  
  stages {
    stage('Build') {
        environment {
            DB_PORT = 3306
            DB_DATABASE = 'heroku_e5e807a7cdb6c59'
            DB_HOST = 'us-cdbr-east-05.cleardb.net'
            DB_PASSWORD = 'fa1cdeb1'
            DB_USERNAME = 'b621dc8f7006a5'
        }
      steps {
        sh 'cp .env.example .env'
        sh 'cp composer.json composer.phar'
        sh 'php composer.phar install'
        sh 'echo DB_HOST=${DB_HOST} >> .env'
        sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
        sh 'echo DB_PORT=${DB_PORT} >> .env'
        sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
        sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
        sh 'php artisan key:generate'
        sh 'echo web: heroku-php-apache2 public/ > Procfile'
        sh 'php artisan migrate'
      }
    }
    
    stage('Test') {
      steps {
        sh 'php artisan test'
      }
    }
    
    stage('Deploy') {
      steps {
        sh 'echo succes'
      }
    }
  }
}
