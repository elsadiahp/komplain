<?php

namespace Modules\Komplain\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\TbKategori;
use App\Models\Waroeng;
use App\Models\Komplain;
use App\Models\KomplainDetail;
use Session;
use Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KomplainController extends Controller
{
    public function index()
    {
        $data = new \stdClass();

        $data->komplain = Komplain::with(['waroeng','komplain_details'])->orderby('komplain_id','asc')->paginate(10);
        $data->waroeng = Waroeng::All()->count();
        $data->detail_komplain = KomplainDetail::with(['tb_kategori','komplain'])->get();
        $data->kategori = TbKategori::All();


        $data->komplain = Komplain::with(['waroeng', 'komplain_details'])->get();

//        $data->chartwaroeng = Komplain::groupBy('waroeng_id')
//            ->select('waroeng_id', DB::raw('count(waroeng_id) as total'))
//            ->with(['waroeng'])->get();

//        $data->chartarea = Komplain::groupBy('area_id')
//            ->select('area_id' , DB::raw('count(area_id) as total'))
//            ->with(['waroeng'])->get();

        $no = 1;


        $data->waroeng = Waroeng::All()->count();

        return view('komplain::index', compact('data', 'no'));

    }

    public function chart(Request $request)
    {
        if ($request->p) {
//            return $data = DB::table('komplain as k')
//                ->join('waroeng as w','w.waroeng_id','=','k.waroeng_id')
//                ->select('k.waroeng_id',DB::raw('count(k.'.$request->p.') as value'))
//                ->groupBy('k.waroeng_id')
//                ->get();

//                ->join('area as a','a.area_id','=','w.area_id')
//                ->groupBy('k.'.$request->p)
//                ->select('k.'.$request->p,(DB::raw('count(k.'.$request->p.') as value')))

            if ($request->m) {

                $data = Komplain::where('tanggal_komplain', 'like', '%%' . $request->m . '%%')->groupBy($request->p);
            } else {
                $data = Komplain::groupBy($request->p);
            }
            $data->with(['waroeng'])
                 ->select($request->p, DB::raw('count(' . $request->p . ') as value'));

            if ($request->a){
                $data = Komplain::where('area_id', 'like', '%%' .$request->a.'%%')->groupBy($request->p);
            } else {
                $data = Komplain::groupBy($request->p);
            }
            $data->with(['waroeng'])
                ->select($request->p, DB::raw('count(' . $request->p . ') as value'));
            return $data->get();
        }
        return 500;


        return view('komplain::index', compact(['data','no']));
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        $data = new \stdClass();
        $data->komplain = Komplain::all();
        $data->waroeng = Waroeng::all();
        $data->kategori = TbKategori::all();
        $data->detail_komplain = KomplainDetail::all();
        return view('komplain::create', compact('data'));
    }

    public function store(Request $request)
    {
        $komplain = new Komplain();



        // $komplain->id_kategori = $request->id_kategori;


        

        $komplain->waroeng_id = $request->waroeng_id;
        $komplain->media_koplain = $request->media_komplain;
        $komplain->isi_komplain = $request->isi_komplain;
        $komplain->tanggal_komplain = $request->tanggal_komplain;
        $komplain->waktu_komplain = $request->waktu_komplain;
        // dd($komplain);
        $komplain->save();


        Session::flash('success', ' Komplain added successfully');

            $tag = $request->id_kategori;
            foreach($tag as $tags){
                $detail_komplain = new KomplainDetail();
                $detail_komplain->komplain_id = $komplain->komplain_id;
                $detail_komplain->id_kategori =$tags;
                // dd($detail_komplain);
                $detail_komplain->save();
            }
        


        Session::flash('success',' Komplain added successfully');

        return Redirect::route('komplain.index');
    }

    public function show()
    {
        return view('komplain::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data = new \stdClass();
        $data->komplain = Komplain::find($id);
        $data->waroeng = Waroeng::all();



        // $data->kategori = TbKategori::all();
        $data->detail_komplain = KomplainDetail::all();


        $data->kategori = TbKategori::all();
        $data->detail_komplain = KomplainDetail::where('komplain_id', $id)->get();

        return view('komplain::edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $komplain = Komplain::find($id);



        // $komplain->id_kategori = $request->id_kategori;


        $komplain->waroeng_id = $request->waroeng_id;
        $komplain->media_koplain = $request->media_komplain;
        $komplain->isi_komplain = $request->isi_komplain;
        $komplain->tanggal_komplain = $request->tanggal_komplain;
        $komplain->waktu_komplain = $request->waktu_komplain;
        $komplain->save();
        KomplainDetail::where([
            ['komplain_id',$id]
        ])->delete();
        if ($request->id_kategori){
            foreach ($request->id_kategori as $k) {
                $detail = KomplainDetail::where([
                    ['komplain_id',$id],
                ['id_kategori',$k]
                ])->get();
                
                if ($detail){
                    $d = new KomplainDetail;
                    $d->id_kategori = $k;
                    $d->komplain_id = $id;
                    $d->save();
                }
            }
        }
        return redirect()->route('komplain.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $detail = KomplainDetail::where('komplain_id',$id);
        if ($detail->delete()){
            $komplain = Komplain::find($id);
            $komplain->delete();
        }
        return redirect()->route('komplain.index');
    }

}
