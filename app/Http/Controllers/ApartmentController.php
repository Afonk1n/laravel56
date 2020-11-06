<?php

namespace App\Http\Controllers;
use App\Apartment;
use App\Bathroom;
use App\District;
use App\Layout;
use App\Renovation;
use App\Room;
use App\Storeynumber;
use App\Street;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('editor/apartment/index',compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $streets = Street::all();
        $storeynumbers = Storeynumber::all();
        $layouts = Layout::all();
        $renovations = Renovation::all();
        $bathrooms = Bathroom::all();
        $districts = District::all();
        return view('editor/apartment/create',compact('rooms','streets','storeynumbers','layouts','renovations','bathrooms','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required|integer|min:10|max:1000',
            'number' => 'required|integer|min:1|max:1000',
            'storey' => 'required|integer|min:1|max:100',
            'specification' => 'required|max:1000',
            'additional' => 'required|max:1000',
        ]);

        $apartment = new Apartment();
        if($request->image){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));
            $apartment->image = $image->getFilename().'.'.$extension;
        }
        $apartment->area = $request->get('area');
        $apartment->number = $request->get('number');
        $apartment->storey = $request->get('storey');
        $apartment->specification = $request->get('specification');
        $apartment->additional = $request->get('additional');
        $apartment->sold = $request->get('sold');
        $apartment->room_id = $request->get('room_id');
        $apartment->street_id = $request->get('street_id');
        $apartment->storeynumber_id = $request->get('storeynumber_id');
        $apartment->layout_id = $request->get('layout_id');
        $apartment->renovation_id = $request->get('renovation_id');
        $apartment->bathroom_id = $request->get('bathroom_id');
        $apartment->district_id = $request->get('district_id');
        $apartment->save();

        return redirect('apartments')->with('Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::find($id);
        $wordTest = new \PhpOffice\PhpWord\PhpWord();

        $newSection = $wordTest->addSection();

        $title = "Информация о квартире";

        $street = json_decode( json_encode($apartment->street->name), true);
        $number = json_decode( json_encode($apartment->number), true);
        $storey = json_decode( json_encode($apartment->storey), true);
        $area = json_decode( json_encode($apartment->area), true);
        $room = json_decode( json_encode($apartment->room->name), true);
        $storeynumber = json_decode( json_encode($apartment->storeynumber->name), true);
        $layout = json_decode( json_encode($apartment->layout->name), true);
        $renovation = json_decode( json_encode($apartment->renovation->name), true);
        $bathroom = json_decode( json_encode($apartment->bathroom->name), true);
        $district = json_decode( json_encode($apartment->district->name), true);
        $specification = json_decode( json_encode($apartment->specification), true);
        $additional = json_decode( json_encode($apartment->additional), true);

        $text1 = "Адрес: " . $street . " " . $number . ".";
        $text2 = "Этаж: " . $storey . ".";
        $text3 = "Плодащь: " . $area . " квадратных метров.";
        $text4 = "Комнатность: " . $room . ".";
        $text5 = "Этажность: " . $storeynumber . ".";
        $text6 = "Планировка: " . $layout . ".";
        $text7 = "Ремонт: " . $renovation . ".";
        $text8 = "Санитарный узел: " . $bathroom . ".";
        $text9 = "Район: " . $district . ".";
        $text10 = "Спецификация квартиры: " . $specification . ".";
        $text11 = "Дополнительная информация: " . $additional . ".";

        $newSection->addText($title,array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black') ,array('align' => 'center'));
        $newSection->addText($text1, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text2, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text3, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text4, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text5, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text6, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text7, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text8, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text9, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text10, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));
        $newSection->addText($text11, array('name' => 'Times New Roman', 'size' => 14, 'color' => 'black'));

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('ApartmentInfo.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('ApartmentInfo.docx'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = Room::all();
        $streets = Street::all();
        $storeynumbers = Storeynumber::all();
        $layouts = Layout::all();
        $renovations = Renovation::all();
        $bathrooms = Bathroom::all();
        $districts = District::all();
        $apartment = Apartment::find($id);
        return view('editor/apartment/edit',compact('apartment','id','rooms','streets','storeynumbers','layouts','renovations','bathrooms','districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'area' => 'required|integer|min:10|max:1000',
            'number' => 'required|integer|min:1|max:1000',
            'storey' => 'required|integer|min:1|max:100',
            'specification' => 'required|max:1000',
            'additional' => 'required|max:1000',
        ]);
        $apartment= Apartment::find($id);
        if($request->image){
            Storage::disk('public')->delete($apartment->image);
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));
            $apartment->image = $image->getFilename().'.'.$extension;
        }
        $apartment->area = $request->get('area');
        $apartment->number = $request->get('number');
        $apartment->storey = $request->get('storey');
        $apartment->specification = $request->get('specification');
        $apartment->additional = $request->get('additional');
        $apartment->sold = $request->get('sold');
        $apartment->room_id = $request->get('room_id');
        $apartment->street_id = $request->get('street_id');
        $apartment->storeynumber_id = $request->get('storeynumber_id');
        $apartment->layout_id = $request->get('layout_id');
        $apartment->renovation_id = $request->get('renovation_id');
        $apartment->bathroom_id = $request->get('bathroom_id');
        $apartment->district_id = $request->get('district_id');
        $apartment->save();
        return redirect('apartments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        $apartment->delete();
        return redirect('apartments')->with('Запись удалена');
    }

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
