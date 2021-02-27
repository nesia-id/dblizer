<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Util\IO;

class Export extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'export:excel';

    protected function configure()
    {
        $this
            ->setDescription('Export data to Excel files')
            ->setHelp('This command allows you to export data from database to excel')
            ->addArgument('export', InputArgument::OPTIONAL, 'Your export name?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getArgument('export')) {
            $output->writeln($input->getArgument('export'));
            if (is_file(dirname(__DIR__) . '/export/' . $input->getArgument('export') . '.php')) {
                $namespace = 'Export\\' . $input->getArgument('export');
                $export = new $namespace($output, 'excel');
                $export->export();
            } else {
                $output->writeln('Export of "' . $input->getArgument('export') . '" not exists');
                return Command::FAILURE;
            }
        } else {
            // $output->writeln(json_encode(scandir(dirname(__DIR__) . '/export')));
            foreach (scandir(dirname(__DIR__) . '/export') as $filename) {
                $path = dirname(__DIR__) . '/export/' . $filename;
                if (is_file($path)) {
                    //Load and export everything
                    $namespace = 'Export\\' . IO::pathinfo_enhanced($path)['filename'];
                    $export = new $namespace($output, 'excel');
                    $export->export();
                }
            }
        }
        return Command::SUCCESS;
    }
}
