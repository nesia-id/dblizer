<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use \RedBeanPHP\R as R;
use Util\Inflector;

class MakeCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'make:export';

    protected function configure()
    {
        $this
            ->setDescription('Generate export class')
            ->setHelp('This command allows you to generate export command')
            ->addArgument('table', InputArgument::REQUIRED, 'Your table name?')
            ->addArgument('alias', InputArgument::OPTIONAL, 'Replace your table name in export method');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $alias = $input->hasArgument('alias') ? $input->getArgument('alias') : $input->getArgument('table');

        R::setup('mysql:host=' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_DATABASE'] . '', $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

        $data = $this->build($input, $alias);
        $content = file_get_contents(dirname(__DIR__) . '/stub/class.php.stub');
        //replace string
        foreach ($data as $key => $item) {
            $content = str_replace($key, $item, $content);
        }
        file_put_contents(dirname(__DIR__) . '/export/' . Inflector::classify($alias) . '.php', $content);
        if (file_exists(dirname(__DIR__) . '/export/' . Inflector::classify($alias) . '.php')) {
            return Command::SUCCESS;
        }
        return Command::FAILURE;
    }

    function build(InputInterface $input, $alias)
    {
        return [
            '{{ table }}' => $input->getArgument('table'),
            '{{ alias }}' => $alias,
            '{{ model }}' => Inflector::classify($alias),
            '{{ pluralAlias }}' => Inflector::pluralize($alias),
            '{{ header }}' => $this->buildHeader($input->getArgument('table')),
            '{{ content }}' =>  $this->buildContent($input->getArgument('table'), $alias),
        ];
    }

    function buildHeader($table)
    {
        $sql = 'SHOW COLUMNS FROM ' . $table;
        $data = R::getAll($sql);
        $header = "";
        foreach ($data as $key => $item) {
            $header = $header . "\t\t\t'" . $item['Field'] . "'";
            end($data);
            if ($key !== key($data))
                $header = $header . ',' . PHP_EOL;
        }
        return $header;
    }

    function buildContent($table, $alias)
    {
        $sql = 'SHOW COLUMNS FROM ' . $table;
        $data = R::getAll($sql);
        $content = "";
        foreach ($data as $key => $item) {
            $content = $content . "\t\t\t\t$" . $alias . "['" . $item['Field'] . "']";
            end($data);
            if ($key !== key($data))
                $content = $content . ',' . PHP_EOL;
        }
        return $content;
    }
}
