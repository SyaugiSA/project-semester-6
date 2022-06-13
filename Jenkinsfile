pipeline {
  environment {
    PATH = "$PATH:/usr/bin/docker-compose"
  }
  
  agent any
  
  stages {
    stage('Build') {
        environment {
            DB_PORT = 3306
            DB_DATABASE = credentials('project-semester-6-db')
            DB_HOST = '0.0.0.0'
            DB_PASSWORD = ''
            DB_USERNAME = 'root'
        }
      steps {
        sh 'php --version'
        sh 'composer i'
        sh 'cp .env.example .env'
        sh 'echo DB_HOST=${DB_HOST} >> .env'
        sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
        sh 'echo DB_PORT=${DB_PORT} >> .env'
        sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
        sh 'php artisan key:generate'
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
        echo 'Successs... \n'
      }
    }
  }
}
