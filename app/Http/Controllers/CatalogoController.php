<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;

class CatalogoController extends Controller
{
  public function index(Request $request)
  {
      $catalogos = Catalogo::all();
      return view('index', compact('catalogos'));
  }


  public function show($id)
  {
      $catalogo = Catalogo::findOrFail($id);
      return view('show', compact('catalogo'));
  }

  public function buscar(Request $request)
  {
      $q = $request->input('q');
      $categoria = $request->input('categoria');
  
      $catalogos = Catalogo::select('id', 'nombre', 'categoria','descripcion', 'archivopdf')
          ->where('nombre', 'LIKE', "%$q%");
  
      if ( !empty($categoria) ) {
          $catalogos->where('categoria', $categoria);
      }
  
      $catalogos = $catalogos->get();
  
      return view('show', compact('catalogos'));
  }
  
}
