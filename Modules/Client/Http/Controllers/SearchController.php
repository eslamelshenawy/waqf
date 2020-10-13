<?php

namespace Modules\Client\Http\Controllers;

use App\Agency;
use App\Estate;
use App\Repositories\User\Agency\AgencyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
    protected $agency;

    public function __construct(AgencyRepositoryInterface $agency)
    {
        $this->agency = $agency;
    }

    public function __invoke(Request $request)
    {

        $agencies = Agency::query();

        if($request->get('q') != null || $request->get('q') != '' && $request->get('service') == 'all'){
            $agencies = $agencies->where('name', 'LIKE', '%' . $request->get('q') . '%');
        }

        if($request->has('service') && $request->get('service') != 'all'){
            $agencies = $agencies
                ->whereRaw('FIND_IN_SET(?,services)', [$request->get('service')]);
        }


        back()->withInput();

        return View::make('client::maintenance.index',
            ['agencies' => $agencies->paginate(10)]
        );
    }


    public function search_home(Request $request)
    {
        $estates = Estate::query();

        if($request->get('q') != null || $request->get('q') != '' && $request->get('type_estate') != 'all' && $request->get('type_rent') != 'all' ){
            $estates = $estates->where('name', 'LIKE', '%' . $request->get('q') . '%')->orWhere('extra_details', 'LIKE', '%' . $request->get('q') . '%');
        }
        if($request->get('type_estate') && $request->get('type_estate') != 'all'){
            $estates = $estates
                ->where('estate_type', $request->get('type_estate'));
        }
        if($request->get('type_rent') && $request->get('type_rent') != 'all'){
            $estates = $estates
                ->where('rent_type', $request->get('type_rent'));
        }
        if($request->get('num_room') ){
            $estates = $estates
                ->where('number_of_rooms', $request->get('num_room'));
        }
        if($request->get('toilets') ){
            $estates = $estates
                ->where('number_of_toilets', $request->get('toilets'));
        }
        if($request->get('floors') ){
            $estates = $estates
                ->where('number_of_floors', $request->get('floors'));
        }


        back()->withInput();
        return View::make('client::estates.index',
            ['estates' => $estates->paginate(10)]
        );
//        return view('client::estates.index', ['estates' => $this->estate->all()]);

    }


//
//    public function __invoke(Request $request)
//    {
//
//        if($request->get('service') == 'all'){
//            back()->withInput();
//            $agencies = $this->agency->advancedSearch($service = 'all', $q = $request->get('q'), 2);
//            $paginator = new Paginator($agencies->count(), 10, $request->get('page'), '/agencies/');
//            return view('client::maintenance.index',
//
//                ['agencies' => $agencies]);
//        }
//
//        if($request->get('_') == 'x90132' && $request->get('service') != null){
//            back()->withInput();
//
//            $agencies = $this->agency->advancedSearch($request->get('service'),
//                $request->get('q'), 2);
//            $paginator = new Paginator(10, 1, $request->get('page'));
//
//            return view('client::maintenance.index', ['agencies' => $agencies, 'paginator' => $paginator]);
//       }
//
//
//        return back()->withInput();
//    }

    private function getMaintenanceAgencies()
    {

    }
    private function getRealEstates()
    {

    }
}
