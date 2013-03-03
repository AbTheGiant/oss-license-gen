<?php

namespace Keep\OssGen\Generator;

/**
 * Generate An Oss Licenses
 */
class Generator
{
    /**
     * dir for source lookup
     *
     * @var string
     **/
    protected $sources_dir;

    /**
     * configure the sources dir
     */
    public function __construct($dir)
    {
        $this->sources_dir = $dir;
    }

    /**
     * generate the license
     *
     * @param string $source_name boilerplate for the license
     * @param string $licenser The licenser "giver" name
     * @param string $year
     */
    public function generate($source_name, $licenser, $year)
    {
        $content = $this->getLicenseFile($source_name);

        return sprintf($content, $year, $licenser);
    }

    /**
     * Look for the source file
     *
     * @param string $source_name source file name
     */
    protected function getLicenseFile($source_name)
    {
        $sources = scandir($this->sources_dir);

        if (($source_id = array_search($source_name . '.oss-source', $sources)) !== false) {
            return file_get_contents(sprintf('%s/%s', $this->sources_dir, $sources[$source_id]));
        }

        throw new Error(sprintf('source %s not found', $source_name));
    }
}