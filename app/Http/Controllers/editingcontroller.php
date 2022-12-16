<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class editingcontroller extends Controller
{
    public function create(Request $request, $modelName)
    {
        $adminUser = Auth::guard('admin')->user();
        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $configs = $model->editingConfigs();
        
        $categories = DB::table('categories')->select('*');
        $categories = $categories->get();
        

        return view('admin.editing', [
            'user' => $adminUser,
            'modelName' => $modelName,
            'configs' => $configs,
        ],compact('categories'));

    }
    public function store(Request $request, $modelName)
    {
        $adminUser = Auth::guard('admin')->user();
        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $configs = $model->editingConfigs();
        $arrayValidateField = [];
        foreach ($configs as $config) {
            if (!empty($config['validate'])) {
                $arrayValidateField[$config['field']] = $config['validate'];
            }
        }

        
       
       $validated = $request->validate($arrayValidateField);



        foreach ($configs as $config) {
            if (!empty($config['editing']) && $config['editing'] == true) {
                switch ($config['type']) {
                    case 'image';
                        if ($request->hasFile($config['field'])) {
                            $name = $request->file($config['field'])->getClientOriginalName();
                            $path = $request->file($config['field'])->storeAs(
                                'public',
                                $name
                            );
                            $model->{$config['field']} = '/' . str_replace("public", "storage", $path);
                        }
                        break;
                    default:
                        $model->{$config['field']} = $request->input($config['field']);
                }
            }
        }
        
        return view('admin.editing', [
            'success'=> $model->save(),
            'user' => $adminUser,
            'modelName' => $modelName,
            'configs' => $configs,
        ]);
    }
}
