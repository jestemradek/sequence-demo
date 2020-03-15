<?php
namespace App\Command;

use App\Utils\Sequence;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
 
class SequenceCommand extends Command
{
    protected static $defaultName = 'app:sequence';

    protected function configure()
    {
        $this->setName('sequence')
            ->setDescription('Sequence demo command')
            ->setHelp('Enter the numbers separated with a space')
            ->addArgument('numbers', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'Enter the number(s), separate multiple numbers with a space');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sequence = new Sequence();
        $rows = [];

        foreach ($input->getArgument('numbers') as $value)
        {
                $value = (int)$value;
                $rows[] = [$value, $sequence->getHighestValue($value)];
        }

        $table = new Table($output);
        $table 
            ->setHeaders(['Input', 'Output'])
            ->setRows($rows);
        $table->render();
    }
}