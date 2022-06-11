<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;

use App\Models\bill;
use App\Http\Requests\StorebillRequest;
use App\Http\Requests\UpdatebillRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->ajax()){
            $data = bill::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $search = $request->input('search') ?? "";
        if (!empty($search)) {
            // dd($search);
            // $lstBill = bill::where('id_user', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%")->paginate();
            $lstBill = bill::join('users', 'users.id', '=', 'bills.id_user')
                ->join('addresses', 'addresses.id', '=', 'bills.id_address')
                ->where('users.full_name', 'LIKE', "%$search%")
                ->orWhere('addresses.phone', 'LIKE', "%$search%")
                ->select('bills.*')
                ->paginate(5);
        } else
            $lstBill = bill::paginate(5);
        $lstBill->appends($request->all());

        return view('Admin.bill.index', ['lstBill' => $lstBill]);
        // if ($request->ajax() && $request->status != null) {
        //     return view('bill.child', [
        //         'lstBill' => $bill->where('status', $request->status)->simplePaginate(5)
        //     ])->render();
        // }

        // if ($request->ajax()) {
        //     return view('bill.child', [
        //         'lstBill' => $bill->simplePaginate(5)
        //     ])->render();
        // }

        // return view('bill.index', [
        //     'lstBill' => $bill->simplePaginate(5)
        // ]);
    }

    public function filter($id)
    {
        // echo "pre";
        if ($id == 0) {
            $bill = bill::paginate(5);
        } else {
            $bill = bill::where('status', $id)->orderBy('id', 'DESC')->paginate(5);
        }

        echo "pre";
        $stt = 1;
        foreach ($bill as $b) {
?>
            <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $b->user->full_name ?></td>
                <td><?php echo $b->address->phone ?></td>
                <td><?php echo $b->total_amount ?></td>
                <td><?php echo $b->ship ?></td>
                <td> <?php if ($b->id_discount) {  ?>
                        <?php echo  $b->id_discount  ?>
                    <?php } else {  ?>
                        Không có
                    <?php }   ?>
                </td>


                <td><?php echo $b->total ?></td>
                <td> <?php echo Carbon::parse($b->date)->format('d-m-Y ') ?></td>
                <td> <?php if ($b->status == 1) {  ?>
                        Chờ xác nhận
                    <?php }
                        if ($b->status == 2) { ?>
                        Đang giao
                    <?php }
                        if ($b->status == 3) { ?>
                        Hoàn thành
                    <?php }
                        if ($b->status == 4) { ?>
                        Đã hủy
                    <?php } ?>
                </td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="<?php echo route('bill.show', $b) ?>  ">
                            <button type="submit" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                <i class="mdi mdi-eye"></i>
                            </button>
                        </a>
                        <?php if ($b->status == 1) { ?>
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo route('admin.bill.confirm', $b->id) ?>">
                                    <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Xác nhận">
                                        <i class="mdi mdi-checkbox-marked"></i>
                                    </button>
                                </a>
                            </div>
                        <?php }
                        if ($b->status == 2) {  ?>
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo route('admin.bill.finished', $b->id) ?>">
                                    <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Xác nhận">
                                        <i class="mdi mdi-checkbox-marked "></i>
                                    </button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </td>
            </tr>
<?php $stt++;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebillRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(bill $bill)
    {
        return view('Admin.bill.show', ['bill' => $bill]);
    }
    // public function confirming(Request $request)
    // {
    //     $search = $request->input('search') ?? "";
    //     if (!empty($search))
    //         $lstBill = bill::where('status', 1)->where('id_user', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%")->paginate();
    //     else
    //         $lstBill = bill::where('status', 1)->paginate(5);
    //     $lstBill->appends($request->all());

    //     return view('Admin.bill.confirming', ['lstBill' => $lstBill]);
    // }
    public function confirm($id)
    {

        $hd = bill::where('id', $id)->first();
        $hd->fill([
            'status' => 2
        ]);
        $hd->save();
        $lstBill = bill::paginate(5);
        // $lstBill->appends($request->all());
        return view('Admin.bill.index', ['lstBill' => $lstBill]);
        // return Redirect::route('admin/bill')->with('update', 'ok');
    }
    // public function delivering(Request $request)
    // {
    //     $search = $request->input('search') ?? "";
    //     if (!empty($search))
    //         $lstBill = bill::where('status', 2)->where('id_user', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%")->paginate();
    //     else
    //         $lstBill = bill::where('status', 2)->paginate(5);
    //     $lstBill->appends($request->all());

    //     return view('Admin.bill.delivering', ['lstBill' => $lstBill]);
    // }
    // public function complete(Request $request)
    // {
    //     $search = $request->input('search') ?? "";
    //     if (!empty($search))
    //         $lstBill = bill::where('status', 3)->where('id_user', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%")->paginate();
    //     else
    //         $lstBill = bill::where('status', 3)->paginate(5);
    //     $lstBill->appends($request->all());

    //     return view('Admin.bill.complete', ['lstBill' => $lstBill]);
    // }
    // public function cancel(Request $request)
    // {
    //     $search = $request->input('search') ?? "";
    //     if (!empty($search))
    //         $lstBill = bill::where('status', 4)->where('id_user', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%")->paginate();
    //     else
    //         $lstBill = bill::where('status', 4)->paginate(5);
    //     $lstBill->appends($request->all());

    //     return view('Admin.bill.cancelled', ['lstBill' => $lstBill]);
    // }
    public function finished($id)
    {
        // dd($id);
        $hd = bill::where('id', $id)->first();
        $hd->fill([
            'status' => 3
        ]);
        $hd->save();
        $lstBill = bill::paginate(5);
        //   return Redirect::route('admin.bill.delivering')->with('update', 'ok');
        return view('Admin.bill.index', ['lstBill' => $lstBill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebillRequest  $request
     * @param  \App\Models\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebillRequest $request, bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(bill $bill)
    {
        //
    }
}
