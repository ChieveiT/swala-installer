<?php
namespace Swala\Installer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class Installer extends LibraryInstaller
{
    /**
     * Base paths for supported types 
     *
     * @var array
     */
    private $basePaths = array(
        'swala-server' => 'server/',
        'swala-library' => true
    );

    /**
     * {@inheritDoc}
     */
    protected function getPackageBasePath(PackageInterface $package)
    {
        $type = $package->getType();
        
        if ($this->basePaths[$type] === true) {
            //默认为library类型的路径
            return parent::getPackageBasePath($package);
        } else {
            return $this->basePaths[$type];
        }
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return in_array($packageType, array_keys($this->basePaths));
    }
}
