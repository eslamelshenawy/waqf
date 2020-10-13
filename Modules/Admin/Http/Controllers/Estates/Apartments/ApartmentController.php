<?php

namespace Modules\Admin\Http\Controllers\Estates\Apartments;

use App\Repositories\Estate\Apartment\ApartmentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\Estates\EstateController;
use Modules\Admin\Http\Requests\StoreApartment;
use Modules\Admin\Http\Requests\UpdateApartment;
use App\EstateOrder;
use App\MaintenanceOrder;
class ApartmentController extends EstateController
{

    protected $apartment;

    public function __construct(ApartmentRepositoryInterface $apartment)
    {
        $this->apartment = $apartment;
    }

    public function index()
    {
        bread_crumb('Estates | Apartments');
        return view('admin::estates.apartments.index', ['apartments' => $this->apartment->all()]);
    }

    public function show($id)
    {
        bread_crumb('Estates | Apartments | ' . $this->apartment->getById($id)->apartment_number);
        return view('admin::estates.apartments.show', ['apartment' => $this->apartment->getById($id)]);
    }

    public function create()
    {
        bread_crumb('Estates | Apartments | New');
        return view('admin::estates.apartments.create');
    }

    public function store(StoreApartment $request)
    {
        $this->apartment->create($request->except(['_token']));
        session()->flash('success');
        return redirect()->route('Admin::apartments.index');
    }

    public function edit($id)
    {
        return view('admin::estates.apartments.edit', ['apartment' => $this->apartment->getById($id)]);
    }

    public function update($id, UpdateApartment $request)
    {
        if($request->hasFile('images')){
            $request->validated();
            $this->apartment->update($id, $request->except(['_token']));
        }elseif(! $request->hasFile('images')){
            $request->validated();
            $this->apartment->update($id, $request->except(['_token', 'images']));
        }

        session()->flash('success');
        return redirect(route('Admin::apartments.index'));
    }

    public function destroy($id)
    {
        
          $orderst=EstateOrder::where("estate_id",$id)->first();
        $orderMain=MaintenanceOrder::where("estate_id",$id)->first();
        // dd($orderMain,$orderst);
        if($orderst == null && $orderMain == null){
              $this->apartment->trashing($id);
             return redirect()->back()->with('success', 'تم الحذف بالنجاح'); 
        }elseif($orderMain != null && $orderst != null){
             return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز صيانه و حجز عقار ');
        }elseif($orderMain != null){
                return redirect()->back()->with('errors', 'لم يتم الحذف هناك طلب صيانه');
        }elseif($orderst == null){
                return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز ');
        }elseif($orderMain == null){
                return redirect()->back()->with('errors', 'لم يتم الحذف هناك طلب صيانه');
        }
        else{
             return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز '); 
        }
       

    }



}
