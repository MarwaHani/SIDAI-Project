<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use Illuminate\Support\Facades\Mail;
use App\Models\ENcontacto;
use App\Models\ARcontacto;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }
    public function enviarMensagem(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email',
            'assunto' => 'required|string|max:150',
            'mensagem' => 'required|string',
        ]);

        Contacto::create($request->only(['nome', 'email', 'assunto', 'mensagem']));

        return back()->with('sucesso', 'Mensagem enviada com sucesso!');
    }
    public function adminIndex()
    {
        $mensagens = Contacto::where('ativo', 1)->get();
        $total = $mensagens->count();
        $respondidas = $mensagens->where('respondido', true)->count();
        $naoRespondidas = $total - $respondidas;
        $novasMensagens = $mensagens->where('respondido', false)->count();

        return view('admin.gerirContacto', compact(
            'mensagens',
            'respondidas',
            'naoRespondidas',
            'novasMensagens'
        ));
    }
    public function responder(Request $request, $id)
    {
        $mensagem = Contacto::findOrFail($id);

        $request->validate([
            'resposta' => 'required|string',
        ]);

        $mensagem->respondido = true;
        $mensagem->save();

        $resposta = $request->input('resposta');

        Mail::send('emails.respostaMensagem', ['mensagem' => $mensagem, 'resposta' => $resposta], function ($mail) use ($mensagem) {
            $mail->to($mensagem->email, $mensagem->nome)
                ->subject($mensagem->assunto);
        });

        return redirect()->route('admin.gerirContacto')->with('sucesso', 'Resposta enviada com sucesso!');
    }
    public function mostrarFormularioResponder($id)
    {
        $mensagem = Contacto::findOrFail($id);
        return view('admin.responderMensagem', compact('mensagem'));
    }
    public function apagar($id)
    {
        Contacto::destroy($id);
        return back()->with('sucesso', 'Mensagem apagada com sucesso.');
    }
    public function ver($id)
    {
        $mensagem = Contacto::findOrFail($id);
        $novasMensagens = Contacto::where('respondido', false)->count();

        return view('admin.verMensagem', compact('mensagem', 'novasMensagens'));
    }

    // -------------------------------------English---------------------------------------------------------------
    public function indexEN()
    {
        return view('ENcontacto');
    }
    public function enviarMensagemEN(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:150',
            'message' => 'required|string',
        ]);

        ENcontacto::create($request->only(['name', 'email', 'subject', 'message']));

        return back()->with('success', 'Message sent successfully!');
    }
    public function ENadminIndex()
    {
        $mensagens = ENcontacto::where('ativo', 1)->get();
        $total = $mensagens->count();
        $respondidas = $mensagens->where('answered', true)->count();
        $naoRespondidas = $total - $respondidas;
        $novasMensagens = $mensagens->where('answered', false)->count();

        return view('admin.en.gerirContacto', compact(
            'mensagens',
            'respondidas',
            'naoRespondidas',
            'novasMensagens'
        ));
    }
    public function toggleAtivoEN($id)
    {
        $mensagem = ENcontacto::findOrFail($id);
        $mensagem->ativo = !$mensagem->ativo;
        $mensagem->save();

        return back()->with(
            'success',
            $mensagem->ativo ? 'Message activated.' : 'Message disabled.'
        );
    }
    public function ENresponder(Request $request, $id)
    {
        $mensagem = ENcontacto::findOrFail($id);

        $request->validate([
            'answer' => 'required|string',
        ]);

        $mensagem->answered = true;
        $mensagem->save();

        $resposta = $request->input('answer');

        Mail::send('emails.en.respostaMensagem', ['mensagem' => $mensagem, 'answer' => $resposta], function ($mail) use ($mensagem) {
            $mail->to($mensagem->email, $mensagem->name)
                ->subject($mensagem->subject);

        });

        return redirect()->route('admin.en.gerirContacto')->with('success', 'Answer sent successfully!');
    }
    public function ENmostrarFormularioResponder($id)
    {
        $mensagem = ENcontacto::findOrFail($id);
        return view('admin.en.responderMensagem', ['mensagem' => $mensagem]);
    }

    public function ENver($id)
    {
        $mensagem = ENcontacto::findOrFail($id);
        $novasMensagens = ENcontacto::where('answered', false)->count();

        return view('admin.en.verMensagem', compact('mensagem', 'novasMensagens'));
    }

    // -------------------------------------عربيييييي Arabic---------------------------------------------------------------
    public function indexAR()
    {
        return view('ARcontacto');
    }

    public function enviarMensagemAR(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:150',
            'message' => 'required|string',
        ]);

        ARcontacto::create($request->only(['name', 'email', 'subject', 'message']));

        return back()->with('tam', 'تم إرسال الرسالة بنجاح!');
    }
    public function ARadminIndex()
    {
        $mensagens = ARcontacto::where('active', 1)->get();
        $total = $mensagens->count();
        $respondidas = $mensagens->where('answered', true)->count();
        $naoRespondidas = $total - $respondidas;
        $novasMensagens = $mensagens->where('answered', false)->count();

        return view('admin.ar.gerirContacto', compact(
            'mensagens',
            'respondidas',
            'naoRespondidas',
            'novasMensagens'
        ));
    }
    public function ARresponder(Request $request, $id)
    {
        $mensagem = ARcontacto::findOrFail($id);

        $request->validate([
            'answer' => 'required|string',
        ]);

        $mensagem->answered = true;
        $mensagem->save();

        $resposta = $request->input('answer');

        Mail::send('emails.ar.respostaMensagem', ['mensagem' => $mensagem, 'answer' => $resposta], function ($mail) use ($mensagem) {
            $mail->to($mensagem->email, $mensagem->name)
                ->subject($mensagem->subject);

        });

        return redirect()->route('admin.ar.gerirContacto')->with('ejaba', 'تم إرسال الإجابة بنجاح!');

    }
    public function ARmostrarFormularioResponder($id)
    {
        $mensagem = ARcontacto::findOrFail($id);
        return view('admin.ar.responderMensagem', ['mensagem' => $mensagem]);
    }
    public function toggleAtivoAR($id)
    {
        $mensagem = ARcontacto::findOrFail($id);
        $mensagem->ativo = !$mensagem->ativo;
        $mensagem->save();

        return back()->with(
            'success',
            $mensagem->ativo ? 'تم تفعيل الرسالة.' : 'تم تعطيل الرسالة.'
        );
    }
    public function ARver($id)
    {
        $mensagem = ARcontacto::findOrFail($id);
        $novasMensagens = ARcontacto::where('answered', false)->count();

        return view('admin.ar.verMensagem', compact('mensagem', 'novasMensagens'));
    }

    public function toggleAtivo($id)
    {
        $mensagem = Contacto::findOrFail($id);
        $mensagem->ativo = !$mensagem->ativo;
        $mensagem->save();

        return back()->with(
            'success',
            $mensagem->ativo ? 'Mensagem ativada.' : 'Mensagem desativada.'
        );
    }


}


