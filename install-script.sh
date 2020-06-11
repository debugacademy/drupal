echo "Erasing modifications to files in this repository" && sleep 25 &&
cd /var/www/html &&
git reset HEAD --hard && 
echo "Removing build artifacts" && sleep 10 && 
rm -rf vendor/ && 
rm -rf web/* &&
echo "Fetching the latest from origin" && sleep 10 && 
git remote remove origin &&
git remote add origin https://github.com/debugacademy/drupal.git &&
git fetch origin && 
echo "Match origin's develop branch" && sleep 10 && 
git reset origin/develop --hard && 
echo "Retreive committed build artifacts for Drupal 9" && sleep 10 && 
git checkout origin/master-build && 
git reset f138947586f76371307f7fa76af8347047a64b99 &&
echo "Returning to develop branch" && sleep 25 && 
git branch -D develop;
git checkout -t origin/develop &&
git reset HEAD --hard &&
echo "Installing Drupal w/Umami profile"
drush site-install demo_umami -y &&
echo 'Setting username & pwd as "admin"';
drush user:password admin admin -y
echo 'Find your site here: http://drupal.debugacademy.test:89'

