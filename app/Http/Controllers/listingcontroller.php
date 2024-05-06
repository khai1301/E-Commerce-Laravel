<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class listingcontroller extends Controller
{
    public function index(Request $request, $modelName)
    {
        $adminUser = Auth::guard('admin')->user();
        $model = '\App\Models\\' . ucfirst($modelName);
       
        $model = new $model;
        $configs = $model->listingConfigs();
        $categories = DB::table('categories')->select('*');
        $categories = $categories->get();
        $filterResult = $model->getFilter($request, $configs, $modelName);
        $orderBy = [
            'field' => 'id',
            'sort' => 'desc'
        ];
        if ($request->input('sort')) {
            $field = substr($request->input('sort'), 0, strrpos($request->input('sort'), "_"));
            $sort = substr($request->input('sort'), strrpos($request->input('sort'), "_") + 1);
            $orderBy = [
                'field' => $field,
                'sort' => $sort
            ];
        }
        $records = $model->getRecords($filterResult['conditions'], $orderBy);

        return view('admin.listing', [
            'user' => $adminUser,
            'records' => $records,
            'configs' => $filterResult['configs'],
            'modelName' => $modelName,
            'title' => $model->title,
            'orderBy' => $orderBy,

        ]);
    }

    public function edit(Request $request, $modelName, $id)
    {
        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $rcs = $model::find($id);
        $configs = $model->editingConfigs();
        $categories = DB::table('categories')->select('*');
        $categories = $categories->get();

        return view('admin.editListing', [
            'modelName' => $modelName,
            'rcs' => $rcs,
            'id' => $id,
            'configs' => $configs,
        ], compact('categories'));
    }

    public function update(Request $request, $modelName, $id)
    {
        $adminUser = Auth::guard('admin')->user();
        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $configs = $model->editingConfigs();
        $rcs = $model::find($id);
        $input = $request->all();
        $arrayValidateField = [];
        foreach ($configs as $config) {
            if (!empty($config['validate'])) {
                $arrayValidateField[$config['field']] = $config['validate'];
            }
        }
        $validated = $request->validate($arrayValidateField);

        $rcs->name = $input['name'];
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs(
                'public',
                $name
            );
            $rcs->image = '/' . str_replace("public", "storage", $path);
        }
        $rcs->price = $input['price'];
        $rcs->content = $input['content'];
        $rcs->category_id = $input['category_id'];
        $rcs->featured_product = $input['featured_product'];
        $rcs->save();
        return redirect()->route('listing.index', [$modelName, $id]);
    }
    public function destroy(Request $request, $modelName, $id)
    {
        $model = '\App\Models\\' . ucfirst($modelName);
        $model::find($id)->delete();
        return redirect()->route('listing.index', [$modelName, $id]);
    }
    public function show($id, $category_id){
       $categoiries= Category::get()->all();
        return view('admin.product_detail');
    }
}
