# Initial Setup
sudo apt-get update -y
sudo apt-get upgrade -y
sudo apt-get install ntfs-3g -y
sudo apt install apache2 -y
sudo apt-get install samba samba-common-bin -y


# Gives user file permissions
sudo chmod a+rw /var/www

# Adding api to webserver folder
cd /var/www/html
git clone https://github.com/lclarke98/Pi-NAS