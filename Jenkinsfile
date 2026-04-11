pipeline {
    agent {
        label 'LEROI_stage'
    }
    stages {
        stage('Deploy') {
            steps {
                dir('/home/sundew/public_html/sundew-ecomm') {
                    // Use rsync to copy and update only changed files
                    sh 'rsync -avu --chown=sundew:sundew --exclude=config/constants.php --exclude=.env --exclude=.git --exclude=sundew-ecomm@tmp /home/sundew/LEROI/workspace/sundew-ecomm/ ./'
                }
            }
        }
    }
    
    post {
        success {
            emailext (
                subject: 'sundew-ecomm stage deployment completed successfully.',
                body: "sundew-ecomm Staging deployment completed successfully.",
                to: 'rajib.barui@sundewsolutions.com, subhasis@sundewsolutions.com',
                attachLog: true
            )
        }
        failure {
            emailext (
                subject: 'sundew-ecomm deployment failed.',
                body: "sundew-ecomm deployment failed.",
                to: 'rajib.barui@sundewsolutions.com, subhasis@sundewsolutions.com',
                attachLog: true
            )
        }
    }
}

