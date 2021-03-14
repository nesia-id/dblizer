<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use \RedBeanPHP\R as R;
use Util\IO;
use Util\Helper;

class Test extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'test';

    protected function configure()
    {
        $this
            ->setDescription('Test code running')
            ->setHelp('This command allows you to test your code');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!R::testConnection()) {
            R::setup('mysql:host=' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . ';dbname=' . 'example' . '', $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        }

        $sql = 'SHOW COLUMNS FROM ' . 'table';
        $data = R::getAll($sql);
        $header = "";
        foreach ($data as $key => $item) {
            $header = $header . "'" . $item['Field'] . "'";
            end($data);
            if ($key !== key($data))
                $header = $header . ',' . PHP_EOL;
        }
        var_dump($header);

        return Command::SUCCESS;
    }
}
