<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class WordController extends Controller
{
    public function createWordDocx($id)
    {
        $apartment = Apartment::find($id);
        $wordTest = new \PhpOffice\PhpWord\PhpWord();

        $newSection = $wordTest->addSection();

        $title = "Информация о квартире";

        $street = $apartment->street;
        $text = "Квартира расположена по адресу " . $street;

        $newSection->addText($title,array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black') ,array('align' => 'center'));
        $newSection->addText($text, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('TestWordFile.docx'));
    }
}
