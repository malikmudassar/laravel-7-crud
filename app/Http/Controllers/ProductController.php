<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $products;
    
    public function index()
    {
        $this->products=file_get_contents(public_path().'\products.json');
        $prod=json_decode($this->products);
        // echo '<pre>';print_r($prod) ;exit;
        return view('product.index', compact('prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=file_get_contents(public_path().'\products.json');
        $data=(array)json_decode($file);
        unset($file);
        $filePath=public_path().'\products.json';
        $post[0]=array(
            'id'    => $_REQUEST['id'],
            'type'    => $_REQUEST['type'],
            'title'    => $_REQUEST['title'],
            'firstname'    => $_REQUEST['firstname'],
            'mainname'    => $_REQUEST['mainname'],
            'price'    => $_REQUEST['price'],
            'numpages'    => $_REQUEST['numpages']
        );
        $newData=array_merge($data, $post);
        file_put_contents($filePath, json_encode($newData));
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('product.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file=file_get_contents(public_path().'\products.json');
        $data=(array)json_decode($file);
        $found_key = array_search($id, array_column($data, 'id'));
        $product=$data[$found_key];
        return view('product.edit', compact('product'));
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
        $file=file_get_contents(public_path().'\products.json');
        $data=(array)json_decode($file);
        unset($file);
        $filePath=public_path().'\products.json';
        $found_key = array_search($id, array_column($data, 'id'));
        $data[$found_key]->type=$_REQUEST['type'];
        $data[$found_key]->title=$_REQUEST['title'];
        $data[$found_key]->firstname=$_REQUEST['firstname'];
        $data[$found_key]->mainname=$_REQUEST['mainname'];
        $data[$found_key]->price=$_REQUEST['price'];
        $data[$found_key]->numpages=$_REQUEST['numpages'];
        file_put_contents($filePath, json_encode($data));
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file=file_get_contents(public_path().'\products.json');
        $data=(array)json_decode($file);
        unset($file);
        $filePath=public_path().'\products.json';
        foreach ($data as $index => $d) {
            if ($d->id==$id ) {
                unset($data[$index]);
            }
        }
        file_put_contents($filePath, json_encode($data));
        return redirect('product');
    }
}
