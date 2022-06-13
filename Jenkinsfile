pipeline {
  environment {
    PATH = "$PATH:/usr/bin/docker-compose"
  }
  
  agent any
  
  stages {
    stage('Build') {
      steps {
        sh 'php --version'
        sh 'composer install'
        sh 'composer update'
        sh 'cp .env.example .env'
        sh 'php artisan key:generate'
      }
    }
    
    stage('Test') {
      steps {
        sh 'php artisan test'
      }
    }
    
    stage('Deploy') {
      steps {
        echo 'Successs... \n'
      }
    }
  }
}
