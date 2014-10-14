VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "new-emproyee-training"
  config.vm.box_url = "https://github.com/2creatives/vagrant-centos/releases/download/v0.1.0/centos64-x86_64-20131030.box"

  config.vm.network "forwarded_port", guest: 80, host: 8080

  config.vm.provider "virtualbox" do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

  config.vm.provision :shell, :inline => <<-SHELL
    echo "start provisioning....."

    # basic setting
    sudo echo "options single-request-reopen" >> /etc/resolv.conf
    sudo yum update -y
    sudo yum remove -y mysql-libs
    sudo yum install -y wget mlocate
    sudo /etc/init.d/iptables stop
    sudo chkconfig iptables off

    # import remi repository
    sudo rpm --import http://rpms.famillecollet.com/RPM-GPG-KEY-remi
    cd /tmp
    sudo wget http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
    sudo rpm -ivh remi-release-6.rpm

    # apache setting
    sudo yum install -y httpd-devel
    sudo echo "ServerName localhost:80" >> /etc/httpd/conf/httpd.conf
    sudo cp /vagrant/server-config/vhosts.conf /etc/httpd/conf.d/
    sudo mkdir -p /var/logs
    sudo chkconfig httpd on

    # mysql setting
    sudo yum install -y --enablerepo=remi mysql-devel mysql-server
    sudo cp -f /vagrant/server-config/my.cnf /etc/
    sudo /etc/init.d/mysqld start
    sudo chkconfig mysqld on

    # php setting
    sudo yum install -y --enablerepo=remi-php56 php php-devel php-pdo php-mbstring php-mcrypt php-mysqlnd
    sudo cp /vagrant/server-config/php.ini /etc/php.d/
    sudo cd /vagrant
    sudo php composer.phar install

    # start web server
    sudo /etc/init.d/httpd restart

    echo "setup successfuly!!"
  SHELL
end
