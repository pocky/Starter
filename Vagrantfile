# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"
Vagrant.require_version ">= 1.6.5"

options = {
    :box         => 'black-project/base-box',
    :box_version => '~> 0.2.0',
    :name        => 'starter',
    :memory      => 1024,
    :cpu         => 1,
    :folders     => {
        '.' => '/var/www/starter'
    },
    :ansible     => 'ansible',
    :debug       => false
}

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # Box
  config.vm.box         = options[:box]
  config.vm.box_version = options[:box_version]
  config.vm.hostname    = options[:name] + '.dev'

  # Network
  config.vm.network "private_network", type: "dhcp"
  config.vm.network :forwarded_port, guest: 8001, host: 8001
  config.vm.network :forwarded_port, guest: 35729, host: 35729

  if Vagrant.has_plugin?('landrush')
    config.landrush.enabled            = true
    config.landrush.tld                = config.vm.hostname
    config.landrush.guest_redirect_dns = false
  elsif Vagrant.has_plugin?('vagrant-hostmanager')
    config.hostmanager.enabled     = true
    config.hostmanager.manage_host = true
    config.hostmanager.ip_resolver = proc do |vm, resolving_vm|
      if vm.id
        `VBoxManage guestproperty get #{vm.id} "/VirtualBox/GuestInfo/Net/1/V4/IP"`.split()[1]
      end
    end

    config.hostmanager.aliases = %w(
      config.vm.hostname
    )

  end

  # SSH
  config.ssh.forward_agent = true

  # Synced Folders
  config.vm.synced_folder ".", "/vagrant", disabled: true

  options[:folders].each do |host, guest|
    config.vm.synced_folder host, guest,
      type: 'nfs',
      mount_options: ['nolock', 'actimeo=1', 'fsc']
  end

  # Providers
  config.vm.provider "vmware_fusion" do |v, override|
    v.vmx["memsize"] = options[:memory]
    v.vmx["numvcpus"] = options[:cpu]
    v.vmx["displayName"] = config.vm.hostname
  end

  config.vm.provider "virtualbox" do |v, override|
    v.memory = options[:memory]
    v.cpus = options[:cpu]
    v.name = config.vm.hostname
  end

  # Git
  if File.exists?(File.join(Dir.home, '.gitconfig')) then
    config.vm.provision :file do |file|
      file.source      = '~/.gitconfig'
      file.destination = '/home/vagrant/.gitconfig'
    end
  end

  # Composer
  if File.exists?(File.join(Dir.home, '.composer/auth.json')) then
    config.vm.provision :file do |file|
      file.source      = '~/.composer/auth.json'
      file.destination = '/home/vagrant/.composer/auth.json'
    end
  end

  # Provisioniers
  config.vm.provision :ansible do |ansible|
    ansible.playbook   = options[:ansible] + '/playbook.yml'
    ansible.verbose    = options[:debug] ? 'vvvv' : false
    ansible.extra_vars = {
      project_name: options[:name],
      project_directory: options[:folders].first[1]
    }
  end
end
