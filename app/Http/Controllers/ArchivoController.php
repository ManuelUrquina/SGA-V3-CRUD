<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class ArchivoController extends Controller
{
    public function index() {
        $archivos = Archivo::get();

       return view('subirarchivos.guardar-archivo', ['archivos' => $archivos]);
    }
    public function guardar(Request $request)
    {
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $ruta = $archivo->store('archivos', 'public');

            $nuevoArchivo = new Archivo([
                'arc_nombre_archivo' => $archivo->getClientOriginalName(),
                'arc_descripcion' => $request->input('arc_descripcion'),
                'arc_url_descarga' => $ruta,
                'usuario_id' => auth()->user()->id,
            ]);

            $nuevoArchivo->save();
            return redirect()->back()->with('success', 'Archivo subido exitosamente.');
        }
        return redirect()->back()->with('error', 'No se seleccionó ningún archivo.');
    }

    //     public function descargar($id)
    // {
    //     $archivo = Archivo::findOrFail($id);

    //     // $rutaArchivo = $archivo->arc_url_descarga;
    //     $rutaArchivo = storage_path('app/public/' . $archivo->arc_url_descarga);
        
    //     if (file_exists($rutaArchivo)) {
    //         return response()->download($rutaArchivo);
    //         // return response()->file($rutaArchivo, ['Content-Disposition' => 'attachment']);
    //     } else {
    //         return redirect()->back()->with('error', 'No se encontró ningún archivo.');
    //     }
    // }

    public function descargar($archivoId){
        $archivo = Archivo::findOrFail($archivoId);
        $rutaArchivo = storage_path('app/public/' . $archivo->arc_url_descarga);

        if (file_exists($rutaArchivo)) {
            return response()->download($rutaArchivo, $archivo->arc_nombre_archivo);
        }else{
            return redirect()->back()->with('error', 'No se encontró ningún archivo.');
        }
    }

    public function destroy(string $id)
    {
        $archivo = Archivo::find($id);
        // dd($archivo);

        // Eliminar el archivo de la carpeta del servidor
        if (Storage::disk('public')->exists($archivo->arc_url_descarga)) {
            Storage::disk('public')->delete($archivo->arc_url_descarga);
        }

        $archivo->delete();
        return redirect()->back();
    }


}
