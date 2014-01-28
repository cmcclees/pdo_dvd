### To setup the vm:

```
cd into project
vagrant up
```

browse to http://localhost:3333/phpinfo.php

### To shut down the vm:

```
vagrant destroy
```

### To SSH into the vm:

```
vagrant ssh
```

run any commands you need to here like composer, php etc

### Windows Installation

Download and install [RubyInstaller __1.9.3__](http://rubyinstaller.org/downloads/) (not 2.0.0). When installing, make sure to check the option that says `Add Ruby executables to your PATH`.

Then install Vagrant and VirtualBox. Following the reboot after the installations, start the command prompt with Ruby and enter the following:

```
vagrant box add precise32 http://files.vagrantup.com/precise32.box
```

Vagrant is now ready to run!