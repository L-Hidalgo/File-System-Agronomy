<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Auth;
use App\Documento;
use App\Tempimage;
use App\Archivo;
use App\Acapite;
use App\User;
use Carbon\Carbon;
use PDF;
use App\Correo;
use App\Shared;
use App\Seguimiento;
use Artisan;
use App\Backup;
use Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Lang;
use App\Exports\Rpt1;
use App\Exports\Rpt2;
use App\Exports\Rpt3;
use Maatwebsite\Excel\Facades\Excel;
class MainController extends Controller
{
    use RedirectsUsers, ThrottlesLogins;
    protected function guard()
    {
        return Auth::guard();
    }  
    public function category(){
        $data=Categoria::get();
        return view('server.categorias.index',compact('data'));
    }
    public function addcategory(){
        $title="crear categoria";
        return view('renders.forms.categoria',compact('title'));
    }
    public function categoriasave(Request $resquest){
        try{
            $new=new Categoria();
            $new->nombre=$resquest->nombre;
            $new->descripcion=$resquest->descripcion;
            $new->user_id=Auth::user()->id;
            $new->save();
            $msg='La Categoria fue almacenada exitosamente';
            return response()->json($msg);
        }
        catch(Exception $e){
            $msg='tiene errores';
            return response()->json($msg);
        }
    }
    public function documentos(){
        $user_iod=Auth::user()->id;
        $data=Documento::where(['seguimiento'=>'redactado','user_id'=>$user_iod])->get();
        $response=Categoria::all();
        return view('server.documentos.index',compact('data','response'));
    }
    public function addtemp(Request $resquest){
        $nombre =  time()."_".'sistemab64';

        $base64_image = $resquest->img; // your base64 encoded     
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data); 
        $imageName = $nombre.'.'.'png';   
        \Storage::disk('local')->put($imageName, base64_decode($file_data));

        $new =new Tempimage();
        $new->user_id=$resquest->user;
        $new->archivo=$resquest->img;
        $new->path=$imageName;
        $new->save();
        return response()->json($new, 200);
    }
    public function deletefindtempfile(Request $resquest){
        $dato=Tempimage::find($resquest->tempfind);
        $dato->delete();
    }
    public function addfilesdata (){
        $categori=Categoria::get();
        if($categori){
            return view('server.documentos.forms.documentofile',compact('categori'));
        }else{
            return redirect()->route('admin.category');
        }
       
    }
    public function savefiles(Request $resquest){
        //dd($resquest->all());
        if($resquest->id_cliente_ci){
            $find=User::find($resquest->id_cliente_ci);
            //dd($find->nombres);
            $files=$resquest->archivos;
            //dd($files);
            if($files){
                $new =new Documento();
                $new->titulo=$resquest->titulo;
                $new->categoria_id=$resquest->categoria_id;
                $new->estado=$resquest->exampleRadios;
                $new->user_id=$resquest->id_cliente_ci;
                $new->subido_por=Auth::user()->id;
                $new->estudiante=$find->nombres;
                $new->dirigido=$resquest->dirigido;
                //dd($new);
                $new->save();
                $ruta=public_path('archivos/');
                foreach($files as $fi)
                {
                    //obtenemos el nombre del archivo
                    $nombre =  time()."_".$fi->getClientOriginalName();
                    //indicamos que queremos guardar un nuevo archivo en el disco local
                    \Storage::disk('local')->put($nombre,  \File::get($fi));
                    $archivo = new Archivo();
                    $archivo->documento_id =$new->id;
                    $archivo->path = $nombre;
                    $archivo->tipo = $fi->getClientOriginalExtension();
                    $archivo->save();
                }
                $ac = new Acapite();
                $ac->comentario=$resquest->acapite;
                $ac->documento_id=$new->id;
                $ac->user_id=$resquest->id_cliente_ci;
                $ac->save();
                $msg="se guardo exitosamente";
                return response()->json($msg);
            }else{
                $msg="revise su archivo, que este seleccionado correctamente";
                //dd($msg);
                return response()->json($msg);
            }
        }else{
            $files=$resquest->archivos;
            //dd($files);
            if($files){
                $new =new Documento();
                $new->titulo=$resquest->titulo;
                $new->categoria_id=$resquest->categoria_id;
                $new->estado=$resquest->exampleRadios;
                $new->user_id=Auth::user()->id;
                $new->subido_por=Auth::user()->id;
                $new->estudiante=Auth::user()->nombres;
                $new->dirigido='redactado por el estudiante';
                $new->save();
                //dd($files);
                $ruta=public_path('archivos/');
                foreach($files as $fi)
                {
                    //obtenemos el nombre del archivo
                    $nombre =  time()."_".$fi->getClientOriginalName();
                    //indicamos que queremos guardar un nuevo archivo en el disco local
                    \Storage::disk('local')->put($nombre,  \File::get($fi));
                    $archivo = new Archivo();
                    $archivo->documento_id =$new->id;
                    $archivo->path = $nombre;
                    $archivo->tipo = $fi->getClientOriginalExtension();
                    $archivo->save();
                }
                $ac = new Acapite();
                $ac->comentario=$resquest->acapite;
                $ac->documento_id=$new->id;
                $ac->user_id=Auth::user()->id;
                $ac->save();
                $msg="se guardo exitosamente";
                return response()->json($msg);
            }else{
                $msg="revise su archivo, que este seleccionado correctamente";
                //dd($msg);
                return response()->json($msg);
            }
        }        
    }
    public function addfilesdatacam(){
        $categori=Categoria::get();
        $tempImg=Tempimage::where('user_id',Auth::user()->id)->get();
        return view('server.documentos.forms.camfile',compact('tempImg','categori'));
    }
    public function savefilescam(Request $resquest){
        //dd($resquest->all());
        if($resquest->id_cliente_ci){
            $find=User::find($resquest->id_cliente_ci);
            //dd($find->nombres);
            $files=$resquest->archivos;
            //dd($files);
            $new =new Documento();
            $new->titulo=$resquest->titulo;
            $new->categoria_id=$resquest->categoria_id;
            $new->estado=$resquest->exampleRadios;
            $new->user_id=Auth::user()->id;
            $new->subido_por=$resquest->id_cliente_ci;
            $new->estudiante=Auth::user()->nombres;
            $new->dirigido=$resquest->dirigido;
            //dd($new);
            $new->save();

            $files=Tempimage::where('user_id',Auth::user()->id)->get();;
            //dd(count($files));
            $ruta=public_path('archivos/');
            foreach($files as $fi)
            {
                $archivo = new Archivo();
                $archivo->documento_id =$new->id;
                $archivo->path = $fi->path;
                $archivo->tipo = 'png';
                $archivo->save();
                $fi->delete();
            }
            $ac = new Acapite();
            $ac->comentario=$resquest->acapite;
            $ac->documento_id=$new->id;
            $ac->user_id=Auth::user()->id;
            $ac->save();
            return redirect()->Route('admin.documento');
        }else{
            $new =new Documento();
            $new->titulo=$resquest->titulo;
            $new->categoria_id=$resquest->categoria_id;
            $new->estado=$resquest->exampleRadios;
            $new->user_id=Auth::user()->id;
            $new->subido_por=Auth::user()->id;
            $new->estudiante=Auth::user()->nombres;
            $new->dirigido='redactado por el estudiante';
            $new->save();
            $files=Tempimage::where('user_id',Auth::user()->id)->get();;
            //dd(count($files));
            $ruta=public_path('archivos/');
            foreach($files as $fi)
            {
                $archivo = new Archivo();
                $archivo->documento_id =$new->id;
                $archivo->path = $fi->path;
                $archivo->tipo = 'png';
                $archivo->save();
                $fi->delete();
            }
            $ac = new Acapite();
            $ac->comentario=$resquest->acapite;
            $ac->documento_id=$new->id;
            $ac->user_id=Auth::user()->id;
            $ac->save();
            return redirect()->Route('admin.documento');
        }   

    }
    public function userlist(){
        $data=User::get();
        return view('server.user.index',compact('data'));
    }
    public function adduserform(){
        $title="Crear Usuario";
        return view('renders.forms.user',compact('title'));
    }
    public function saveuser(Request $resquest){
        //dd($resquest->all());
        if(!$resquest->ci ){
            $msg="el ci son datos requeridos";
        }else{
            if(!$resquest->descripcion){
                $msg="el email son datos requeridos";
            }else{
                //dd($resquest->all());
                $can=User::where('ci',$resquest->ci)->get();
                $can1=User::where('email',$resquest->descripcion)->get();
                //dd($can1);
                //dd(count($can1),count($can));
                if(!$can){
                    $msg="el ci ya existe";
                }else{
                    if(!$can1){
                        $msg="el email ya existe";
                    }else{
                        $user=new User();
                        $user->name=$resquest->nombre;
                        $user->lastname=$resquest->lastname;
                        $user->secondname=$resquest->secondname;
                        $user->ci=$resquest->ci;
                        $user->email=$resquest->descripcion;
                        $user->tipo=$resquest->rol;
                        $user->password= bcrypt($resquest->ci);
                        $user->save();
                        $msg="usuario almacenado correctammente";
                    }
                }
            }
        }
        return response()->json($msg, 200);
    }
    public function viewdataDoc(Request $resquest,$id)
    {
        $data=Archivo::where('documento_id',$id)->get();
        $title='ver archivos';
        $view= view('renders.views.documento',compact('data','title'))->render();
        return response()->json($view, 200);
    }
    public function viewarchivo(Request $resquest){
        //dd($resquest->all());
        $data=Archivo::find($resquest->documento);
        $ruta=public_path('archivos/');
        $tgn=$data->path;
        //dd($tgn);
        return response()->json($tgn);
    }
    public function viewarchivopng(Request $resquest){
        $data=Archivo::find($resquest->documento);
        $path = public_path('archivos');
        $nombre_archivo="pdf-ad-".$data->nombre;
        $pdf = \PDF::loadView("renders.views.pdfdoc",compact('data'));
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->save($path . '/' . $nombre_archivo);
        //dd($pdf);
        $trg=$nombre_archivo;
        return response()->json($trg);
    }
    public function bandejaentrada(){
        $data=Documento::where('seguimiento','redactado')->get();
        return view('server.bandeja.bandejaentrada',compact('data'));
    }
    public function shareddoc($id)
    {   
        $doc=Documento::find($id);
        $data=Archivo::where('documento_id',$id)->get();
        $aca=Acapite::where('documento_id',$id)->get();
        $correos=Correo::get();
        $title='compartir archivos';
        $view= view('renders.views.shareddoc',compact('doc','data','title','aca','correos'))->render();
        return response()->json($view, 200);
    }
    public function senddatos(Request $resquest){
        //dd($resquest->all());
        $mails=$resquest->mail;
        $document=Documento::find($resquest->document);
        foreach($mails as $mail){
            $rfid=Correo::where('email',$mail)->get()->last();
            //dd($rfid);
            if(!$rfid){
               $newc = new Correo();
               $newc->name='send';
               $newc->email=$mail;
               $newc->save();
            }
        }
        foreach($mails as $ma){
            $rfid=Correo::where('email',$mail)->get()->last();
            $newsahred = new Shared();
            $newsahred->documento_id=$resquest->document;
            $newsahred->user_id=Auth::user()->id;
            $newsahred->correo_id=$rfid->id;
            $newsahred->save();
        }
        $document->seguimiento='atendido';
        $document->save();
        return redirect()->route('bandeja.entrada');
    }
    public function bandejasalida(){
        $user_id=\Auth::user()->tipo;
        if($user_id==='estudiante'){
            $data=Documento::where('seguimiento','<>','redactado')->where('user_id',\Auth::user()->id)->get();
        }else{
            $data=Documento::where('seguimiento','<>','redactado')->get();
        }
        return view('server.bandeja.bandejasalida',compact('data'));
    }
    public function infodocu($id){
        $doc=Documento::find($id);
        $data=Archivo::where('documento_id',$id)->get();
        $aca=Acapite::where('documento_id',$id)->get();
        $shared=Shared::where('documento_id',$id)->get();
        $title='Informacion Del Documento';
        $view= view('renders.views.infodoc',compact('doc','data','title','aca','shared'))->render();
        return response()->json($view, 200);
    }
    public function addseg($id){
        $dato=Seguimiento::where('documento_id',$id)->get()->last();
        $title='Registro de Seguimiento Del Documento';
        if($dato==null){
            $view= view('renders.views.inicial',compact('title','id'))->render();
        }else{
            $view= view('renders.views.seguimiento',compact('title','dato','id'))->render();
        }
        return response()->json($view, 200);
    }
    public function addseguimiento(Request $resquest){
        $new=new Seguimiento();
        $new->documento_id=$resquest->iddoc;
        $new->de_donde=$resquest->ddonde;
        $new->a_donde=$resquest->adonde;
        $new->save();

        $data=Documento::find($resquest->iddoc);
        $data->seguimiento='atendido';
        $data->save();
        return response()->json($new, 200);
    }
    public function seguimiento(){
        $tipo=\Auth::user()->tipo;
        if($tipo=='estudiante'){
            $data=Documento::where('seguimiento','<>','redactado')->where('user_id',\Auth::user()->id)->get();
        }else{
            $data=Documento::where('seguimiento','<>','redactado')->get();
        }
        $response=Categoria::get();
        return view('server.bandeja.segumiento',compact('data','response'));
    }
    public function showseg($id){
        $data=Seguimiento::where('documento_id',$id)->get();
        $title='Seguimiento de Documentos';
        $view= view('renders.views.viewdocseg',compact('data','title'))->render();
        return response()->json($view, 200);
    }
    public function viewbackup(){
        $data=Backup::get();
        return view('server.copia.backup',compact('data'));
    }
    public function dowloadsever($id){
        $dato=Backup::find($id);
        return Response::download($dato->nombre);
    }
    public function rport1(Request $request){
        
        if($request->has("fecha_inicial")){
            $fi=$request->fecha_inicial;
            $ff=$request->fecha_final;
        }else{
            $fi=Carbon::now()->toDateString();
            $ff=Carbon::now()->toDateString();
        }
        $select=Categoria::get();
        //dd($select);
        $ruser=User::get();
        $data=Documento::whereBetween('created_at',[$fi , $ff])->where(['categoria_id'=>$request->rol,'user_id'=>$request->user])->get();
        return view('server.reports.rpt1',compact('fi','ff','data','select','ruser'));
    }
    public function rport2(Request $request){
        //dd($request->all());
        if($request->has("fecha_inicial")){
            $fi=$request->fecha_inicial;
            $ff=$request->fecha_final;
        }else{
            $fi=Carbon::now()->toDateString();
            $ff=Carbon::now()->toDateString();
        }
        $data=User::whereBetween('created_at',[$fi , $ff])->where('tipo',$request->rol)->get();
        return view('server.reports.rpt2',compact('fi','ff','data'));
    }
    public function rport3(Request $request){
        if($request->has("fecha_inicial")){
            $fi=$request->fecha_inicial;
            $ff=$request->fecha_final;
        }else{
            $fi=Carbon::now()->toDateString();
            $ff=Carbon::now()->toDateString();
        }
        $data=Archivo::whereBetween('created_at',[$fi , $ff])->get();
        return view('server.reports.rpt3',compact('fi','ff','data'));
    }
    public function editcat($id){
        $data=Categoria::find($id);
        $title="editar categoria";
        return view('renders.forms.editcategoria',compact('title','data'));
    }
    public function profile(){
        return view('server.user.profile');
    }
    public function categoriaedit(Request $request){
        $dato=Categoria::find($request->idcat);
        $dato->nombre=$request->nombre;
        $dato->descripcion=$request->descripcion;
        $dato->save();
        return response()->json($dato, 200);
    } 
    public function editusr($id){
        $data=User::find($id);
        $title="editar usuario ";
        return view('renders.forms.edituser',compact('title','data'));
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
    public function edithdatauser(Request $resquest){
        $user=User::find($resquest->id);
        $user->name=$resquest->nombre;
        $user->lastname=$resquest->lastname;
        $user->secondname=$resquest->secondname;
        $user->ci=$resquest->ci;
        $user->email=$resquest->descripcion;
        $user->save();
        return response()->json($user, 200);
    }
    public function userrol($id){
        $data=User::find($id);
        $title="editar usuario ";
        return view('renders.forms.editrol',compact('title','data'));
    }
    public function editrolus(Request $request){
        $data=User::find($request->id);
        $data->tipo=$request->rol;
        $data->save();
        return response()->json($data,200);
    }
    public function destroy(Request $request,$us){
        $data=User::find($us);
        if($data->estado==='alta'){
            //dd($data);
            $data->estado='baja';
            $data->save();
        }else{
            $data->estado='alta';
            $data->save();
        }
        return redirect()->back();
    }
    public function updateprofile(Request $request){
        //dd($request->all());
        $up_user = User::find($request->id);
        //dd($up_user);
        $pa = $request->password1;
        if (\Hash::check($pa, \Auth::user()->password)) {
          $up_user->password = bcrypt($request->password2);
        } else {
          $notify = [
            'type' => 'error',
            'message' => 'la contraseña colacada esta mal',
          ];
          return response()->json($notify, 500);
        }

        $up_user->save();
        $notify = [
          'type' => 'success',
          'message' => 'se edito sus datos',
        ];
        return response()->json($notify, 200);
    }
    public function rpt1pdf($fi,$ff,$tipo,$us){
        if($fi){
            $fi=$fi;
            $ff=$ff;
        }else{
            $fi=Carbon::now()->toDateString();
            $ff=Carbon::now()->toDateString();
        }
        $data=Documento::whereBetween('created_at',[$fi , $ff])->where(['categoria_id'=>$tipo,'user_id'=>$us])->get();
        //dd($data);
        $name="report de Documentos";
        return PDF::loadView('server.reports.pdf.rpt1',compact('data','fi','ff'))->setPaper('letter', 'portrait')->stream($name);
    }
    public function rpt2pdf($fi,$ff,$rol){
        //dd($rol);
        if($fi){
            $fi=$fi;
            $ff=$ff;
        }else{
            $fi=Carbon::now()->toDateString();
            $ff=Carbon::now()->toDateString();
        }
        $data=User::whereBetween('created_at',[$fi , $ff])->where('tipo',$rol)->get();
        //dd($data);
        $name="report de Documentos";
        return PDF::loadView('server.reports.pdf.rpt2',compact('data','fi','ff'))->setPaper('letter', 'portrait')->stream($name);
    }
    public function rpt3pdf($fi,$ff){
        if($fi){
            $fi=$fi;
            $ff=$ff;
        }else{
            $fi=Carbon::now()->toDateString();
            $ff=Carbon::now()->toDateString();
        }
        $data=Archivo::whereBetween('created_at',[$fi , $ff])->get();
        $name="report de Documentos";
        return PDF::loadView('server.reports.pdf.rpt3',compact('data','fi','ff'))->setPaper('letter', 'portrait')->stream($name);
    }    
    public function rpt1excel($fi,$ff,$tipo,$us){
        $name="reports.xlsx";
        return Excel::download(new Rpt1($fi,$ff,$tipo,$us), $name);
    }
    public function rpt2excel($fi,$ff,$rol){
        $name="reports.xlsx";
        return Excel::download(new Rpt2($fi,$ff,$rol), $name);
    }
    public function rpt3excel($fi,$ff){
        $name="reports.xlsx";
        return Excel::download(new Rpt3($fi,$ff), $name);
    }
    public function search(Request $request){
        $word=$request->input;
        $response=Documento::where('titulo','LIKE','%'. $word.'%')->where('categoria_id',$request->select)->orderby('id','ASC')->get();
        $view=view('server.documentos.search.documento',compact('response'))->render();
        return response()->json($view, 200);
    }
    public function searchdatainputseg(Request $request){
        $word=$request->input;
        $response=Documento::where('titulo','LIKE','%'. $word.'%')->where('categoria_id',$request->select)->orderby('id','ASC')->get();
        $view=view('server.documentos.search.documentoseg',compact('response'))->render();
        return response()->json($view, 200);
    }
    public function asistido(Request $request){
        $title="Registro Asistido  Del Usuario";
        return view('renders.forms.asistido',compact('title'));
    }
    public function documentshow(Request $request){
        $categori=Categoria::get();
        $user=User::where('tipo','estudiante')->get();
        if($categori){
            return view('server.documentos.forms.asistido',compact('categori','user'));
        }else{
            return redirect()->route('admin.category');
        }
    }
    public function Apiselectestudent(Request $request){
        $response=User::where('ci',$request->id)->get()->last();
        //dd($response);
        if($response ===null){
            $xtt="<div class='row'><label class='col-sm-2 col-form-label'>nombre completo</label><div class='col-sm-4'><div class='form-group bmd-form-group'><input type='text' name='nombre_cliente' id='buscar'class='buscar form-control'  placeholder='ricardo rojas cruz'></div></div></div>";
            return response()->json($xtt);
        }else{
            $xtt="<div class='row'><label class='col-sm-2 col-form-label'>nombre completo</label><div class='col-sm-4'><div class='form-group bmd-form-group'><input type='hidden' name='id_cliente_ci' value='".$response->id."'><label for=''>".$response->name." ".$response->lastname." ".$response->secondname."</label></div></div></div>";
            return response()->json($xtt);
        }
    }
    public function documentshowfile(){
        $categori=Categoria::get();
        $user=User::where('tipo','estudiante')->get();
        $tempImg=Tempimage::where('user_id',Auth::user()->id)->get();
        if($categori){
            return view('server.documentos.forms.asistidofile',compact('categori','user','tempImg'));
        }else{
            return redirect()->route('admin.category');
        }  
    }
    public function reportedocexclude(Request $request){
        $response=Categoria::get();
        $title="Reporte De Documentos Publicos";
        $data=Documento::where('estado','publico')->get();
        $tipo="publico";
        return view('server.reports.rpt4',compact('response','data','title','tipo'));
    }
    public function reportedocexcludeprivate(Request $request){
        $title="Reporte De Documentos Privados";
        $response=Categoria::get();
        $data=Documento::where('estado','privado')->get();
        $tipo="privado";
        return view('server.reports.rpt4',compact('response','data','title','tipo'));
    }
    public function searchdatainputreport(Request $request){
        $word=$request->input;
        $data=Documento::where('titulo','LIKE','%'. $word.'%')->where('categoria_id',$request->select)->where('estado',$request->tipod)->orderby('id','ASC')->get();
        $view=view('server.documentos.search.rptuno',compact('data'))->render();
        return response()->json($view, 200);
    }
}
