<?php
namespace Composer\Installers;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class Installer extends LibraryInstaller
{
    /**
     * Install paths for supported types 
     *
     * @var array
     */
    private $installPaths = array(
        'swala-server' => 'server/'
    );

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $type = $package->getType();
        
        return $this->installPaths[$type];
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return in_array($packageType, array_keys($this->installPaths));
    }
}
