<?php

declare(strict_types=1);

namespace Guave\FormSaveBundle\Controller;

use Contao\DC_Table;
use Contao\Image;
use Contao\Model\Collection;
use Contao\StringUtil;
use Guave\FormSaveBundle\Config\Config;
use Guave\FormSaveBundle\Model\FormSaveModel;
use League\Csv\CannotInsertRecord;
use League\Csv\Writer;
use SplTempFileObject;

class CsvExportController
{
    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param array<string> $row
     */
    public function checkVisibility(array $row, string|null $href, string $label, string $title, string|null $icon, string $attributes): string
    {
        if ($row['storeValues'] !== '1' || $row['targetTable'] !== FormSaveModel::getTable()) {
            return '';
        }

        if (FormSaveModel::findByPid($row['id'])) {
            return '<a href="contao?do=form&'.$href.'&amp;id='.$row['id'].'" title="'
                .StringUtil::specialchars($title).'"'.$attributes.'>'
                .Image::getHtml($icon, $label)
                .'</a>';
        }

        $icon = str_replace('.svg', '_.svg', $icon);

        return Image::getHtml($icon, $label);
    }

    public function exportCsv(DC_Table $dc): void
    {
        $records = FormSaveModel::findByPid($dc->id, ['order' => 'tstamp DESC']);

        try {
            $writer = Writer::createFromFileObject(new SplTempFileObject())
                ->setDelimiter($this->config->getSeparator())
                ->setEnclosure($this->config->getQuote())
                ->setEndOfLine("\r\n")
            ;

            $header = $this->getHeader($records);
            $writer->insertOne($header);

            foreach ($records as $record) {
                $writer->insertOne($this->prepareRow($record->row(), $header));
            }

            $writer->output('file.csv');
            die();
        } catch (CannotInsertRecord $e) {
            print_r($e->getRecord());
        }
    }

    /**
     * @param Collection<string> $records
     *
     * @return array<string>
     */
    private function getHeader(Collection $records): array
    {
        $header = [['submitted', 'alias']];

        /** @var FormSaveModel $record */
        foreach ($records as $record) {
            $header[] = array_keys(StringUtil::deserialize($record->form_data));
        }

        return array_unique(array_merge(...$header));
    }

    /**
     * @param array<?string, ?int> $row
     * @param array<string>        $header
     *
     * @return array<string>
     */
    private function prepareRow(array $row, array $header): array
    {
        $record = array_fill_keys($header, '');
        $record['submitted'] = date('d.m.y H:i', $row['tstamp']);
        $record['alias'] = $row['alias'];

        foreach (StringUtil::deserialize($row['form_data']) as $key => $field) {
            if (\is_array($field)) {
                $field = implode(', ', $field);
            }
            $record[$key] = $field;
        }

        return $record;
    }
}
