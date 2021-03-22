<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Service\Correlate;
use App\Service\ResultFileSaver;
use Symfony\Component\Console\Input\InputOption;

class TreeCommand extends Command
{
    const TREE_FILE_NAME = 'tree-file-name';
    const OUTPUT = 'output';
    const OUTPUT_FILE = 'file';
    const OUTPUT_SCREEN = 'screen';

    protected static $defaultName = 'parse-tree';

    private Correlate $correlate;
    private ResultFileSaver $resultFileSaver;

    public function __construct(Correlate $correlate, ResultFileSaver $resultFileSaver)
    {
        $this->correlate = $correlate;
        $this->resultFileSaver = $resultFileSaver;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription(
                'Tree colerator. Move tree file to /data/tree/your_file_name.json. Put file name as first argument of command
                If you add --output option,  you can choose where presents results in a file ex. /data/result/result.json or on the screen
                '
            )
            ->setDefinition([
                new InputArgument(
                    self::TREE_FILE_NAME,
                    InputArgument::OPTIONAL,
                    'Name of tree file'
                ),
                new InputOption(self::OUTPUT, null, InputOption::VALUE_OPTIONAL, 'Specify where you want send data. There are two options "screen" and "file"', self::OUTPUT_SCREEN)
            ]);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption(self::OUTPUT) === self::OUTPUT_FILE) {
            $this->resultFileSaver->saveResult(json_encode($this->correlate->correlate($input->getArgument(self::TREE_FILE_NAME))));
            return Command::SUCCESS;
        }

        $output->writeln(
            json_encode($this->correlate->correlate($input->getArgument(self::TREE_FILE_NAME)))
        );
        return Command::SUCCESS;
    }
}
